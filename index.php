<?php
session_start();
if (!isset($_SESSION['anon_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta
        name="apple-mobile-web-app-status-bar-style"
        content="black-translucent"
    />
    <title>E-Learning Startseite</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&family=Roboto:wght@400&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="style.css" />

</head>
<body>
<!-- Header-Bereich -->
<header class="header">
    <h1>Sicherheitsunterweisung</h1>
    <p>
        Willkommen zur allgemeinen Sicherheitsunterweisung, Ihr Fortschritt gehört zur ID:
        <strong><?= $_SESSION['anon_id'] ?></strong> <br>
        In den folgenden Lektionen möchten wir Ihnen wichtige Hinweise und
        Verhaltensregeln vorstellen, die dazu beitragen, Unfälle und Gefahren zu
        vermeiden.

    </p>
</header>

<!-- Navbar -->
<nav class="navbar">
    <ul>
        <li><a href="floorplan/floorplan0.html">Allgemeine Sicherheits- <br> unterweisung</a></li>
        <li><a href="clab/clab_index.html">C-Lab</a></li>
        <li><a href="tonstudio/tonstudio_index.html">Tonstudio</a></li>
        <li><a href="mac-pool/mac_pool_index.html">Mac/Windows-Pool</a></li>
        <li><a href="seminarraum/seminarraum_index.html">Seminarraum</a></li>

        <li><a href="logout.php" class = "back-button" id="abmelden-btn">Abmelden</a></li>
    </ul>
</nav>

<!-- Hase Platzhalter -->
<!--<div class="hase-placeholder"></div>-->

<!-- Lektionen -->
<main class="lektionen-container">
    <a class="lektion" href="floorplan/floorplan0.html">
        <div class="text">
            <h2>1 - Allgemeine Sicherheitsunterweisung</h2>
            <p>
                In dieser Lektion lernen Sie die wichtigsten Punkte kennen, die es
                im Allgemeinen zu beachten gibt. Darunter fällt das Verhalten im
                Brandfall oder Unfall, die Flucht- und Rettungswege sowie die
                Standorte der Feuerlöscher.
            </p>
        </div>
        <div class="bild">
            <img src="floorplan/floorplan1.svg" alt="Lektion 1 - Allgemeine Sicherheitsunterweisung"/>
        </div>
    </a>

    <a class="lektion" href="clab/clab_index.html">
        <div class="text">
            <h2>2 - C-Lab</h2>
            <p>
                Das Creative Lab ist eines der Labore speziell für die Studierenden
                des Studiengangs Digital Media. Speziell für dieses Labor gibt es
                einige spezifische Sicherheitshinweise zu beachten, die in dieser
                Lektion behandelt werden.
            </p>

        </div>
        <div class="bild">
            <img src="Bilder/01_clab_01.jpg" alt="Lektion 2" />
        </div>
    </a>

    <a class="lektion" href="tonstudio/tonstudio_index.html">
        <div class="text">
            <h2>Tonstudio</h2>
            <p>
                Das modern ausgestattete Tonstudio im W-Gebäude existiert, damit
                Studierende professionelle Audioaufnahmen für Musik-, Film- und
                Medienprojekte umsetzen können. Es verfügt über schallisolierte
                Aufnahmekabinen, hochwertige Mikrofone, ein digitales Mischpult
                sowie spezialisierte Software für Tonbearbeitung und Sounddesign.
            </p>
        </div>
        <div class="bild">
            <img src="Bilder/03_tonstudio_01.jpg" alt="Lektion 3" />
        </div>
    </a>

    <a class="lektion" href="mac-pool/mac_pool_index.html">
        <div class="text">
            <h2>Mac/Windows-Pool</h2>
            <p>
                Der Mac/Windows-Pool ist ein zentraler Arbeitsraum mit
                leistungsstarken Rechnern beider Betriebssysteme, der Studierenden
                für Grafikdesign, 3D-Modelling, Videoschnitt und Programmierung zur
                Verfügung steht. Ausgestattet mit aktueller Software wie Adobe
                Creative Cloud, Blender und Visual Studio bietet er eine
                professionelle Umgebung für praxisorientierte Projektarbeit.
            </p>
        </div>
        <div class="bild">
            <img src="Bilder/04_mac_01.jpg" alt="Lektion 4" />
        </div>
    </a>

    <a class="lektion" href="seminarraum/seminarraum_index.html">
        <div class="text">
            <h2>Seminarraum</h2>
            <p>
                Der Seminarraum ist ein multifunktionaler Raum, der für
                Gruppenarbeiten, Präsentationen und Workshops genutzt werden kann.
                Er ist mit moderner Präsentationstechnik ausgestattet und bietet
                Platz für kreative Zusammenarbeit und interaktive Lernformate.
            </p>
        </div>
        <div class="bild">
            <img src="Bilder/06_seminar_01.jpg" alt="Lektion 5" />
        </div>
    </a>
</main>
<!--
<script>
    window.addEventListener("DOMContentLoaded", () => {
        fetch("mascot/hasen.html")
            .then(response => response.text())
            .then(html => {
                document.querySelector(".hase-placeholder").innerHTML = html;
            });
    });
</script>
 -->
<script src="script.js"></script>
</body>
</html>

