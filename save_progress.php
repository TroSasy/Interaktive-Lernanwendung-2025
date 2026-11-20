<?php
require_once 'db_connect.php';
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

$input = json_decode(file_get_contents("php://input"), true);
$lesson   = $input['lesson']   ?? null;
$poi      = $input['poi_id']   ?? null;
$link     = $input['link']     ?? null;
$anon_id  = $_COOKIE['anon_id'] ?? $_SESSION['anon_id'] ?? null;

if (!$lesson || !$poi || !$link || !$anon_id) {
    http_response_code(400);
    echo json_encode(["error" => "Fehlende oder ungültige Daten"]);
    exit;
}

// Manuell gepflegte POI-Datenstruktur
$poiLinkCount = [
    "clab" => [
        "feuermelder"    => 4,
        "arbeitsplatz"   => 2,
        "drucker"        => 1,
        "schneidegeraet" => 1,
        "elektronik"     => 1,
    ],
    "tonstudio" => [
        "feuerloescher"  => 4,
        "keyboard"       => 1,
        "mischpult"      => 1,
        "tonkabine"      => 1
    ],
    "pool" => [
        "pool_feuerloescher"  => 4,
        "pool_notausschalter" => 1,
        "pool_raumsteuerung"  => 1,
        "pool_notausschalter_tisch" => 1,
        "pool_pult" => 1
    ],
    "sraum" => [
        "sraum_feuerloescher" => 4,
        "sraum_raumsteuerung" => 1,
        "sraum_pult" => 1
    ]

];

try {
    // Fortschritt speichern (wenn noch nicht vorhanden)
    $stmt = $pdo->prepare("INSERT IGNORE INTO progress (anon_id, lesson, poi, link) VALUES (?, ?, ?, ?)");
    $stmt->execute([$anon_id, $lesson, $poi, $link]);

    // Anzahl der benötigten und angesehenen Links für diesen POI
    $required = $poiLinkCount[$lesson][$poi] ?? 0;

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM progress WHERE anon_id = ? AND lesson = ? AND poi = ?");
    $stmt->execute([$anon_id, $lesson, $poi]);
    $viewed = (int)$stmt->fetchColumn();

    $completed = $required > 0 && $viewed >= $required;

    // Gesamten Fortschritt berechnen
    $allPois = $poiLinkCount[$lesson] ?? [];
    $completedCount = 0;

    foreach ($allPois as $poiKey => $needed) {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM progress WHERE anon_id = ? AND lesson = ? AND poi = ?");
        $stmt->execute([$anon_id, $lesson, $poiKey]);
        $seen = (int)$stmt->fetchColumn();
        if ($seen >= $needed) {
            $completedCount++;
        }
    }

    $percent = count($allPois) > 0 ? round(($completedCount / count($allPois)) * 100) : 0;

    echo json_encode([
        "completed" => $completed,
        "percent"   => $percent
    ]);

} catch (Exception $e) {
    http_response_code(500);
    error_log($e->getMessage());
    echo json_encode(["error" => "Serverfehler", "details" => $e->getMessage()]);
}
