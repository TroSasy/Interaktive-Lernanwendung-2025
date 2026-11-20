<?php
session_start();
require_once "db_connect.php"; // <-- falls du $pdo in externer Datei definiert hast

$message = '';

// Wenn ID eingeloggt wird
if (isset($_POST['login'])) {
    $anonId = $_POST['anon_id'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE anon_id = ?");
    $stmt->execute([$anonId]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['anon_id'] = $anonId;
        setcookie("anon_id", $anonId, time() + (86400 * 30), "/"); // ✅ Cookie setzen
        header("Location: index.php");
        exit;
    } else {
        $message = "❌ Unbekannte ID. Bitte prüfen oder neu registrieren.";
    }
}

// Wenn neue ID erstellt wird
if (isset($_POST['register'])) {
    function generateRandomId($length = 16) {
        return strtoupper(substr(bin2hex(random_bytes($length)), 0, 16));
    }

    $newId = generateRandomId();

    $stmt = $pdo->prepare("INSERT INTO users (anon_id) VALUES (?)");
    $stmt->execute([$newId]);

    $_SESSION['anon_id'] = $newId;
    setcookie("anon_id", $newId, time() + (86400 * 30), "/"); // ✅ Cookie setzen
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login mit anonymer ID</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: white;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 1em 0;
            font-family: 'Josefin Sans', sans-serif;
            font-size: 1rem;
            font-weight: bold;
            text-decoration: none;
            border: 0.1rem solid grey;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }
        input[type="text"]:focus {
            outline: none;
            border-color: #bbaaff;
            box-shadow: 0 0 5px #bbaaff;
        }

        button {
            padding: 0.75rem 1.5rem;
            margin: 0.5rem;
            cursor: pointer;
            background-color: #3B305C;
            color: white;
            font-family: 'Josefin Sans', sans-serif;
            font-size: 1rem;
            font-weight: bold;
            text-decoration: none;
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }
        .msg { color: red; margin-top: 10px; }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Anonymer Zugang</h2>
    <form method="post">
        <label for="anon_id">ID eingeben:</label>
        <input type="text" name="anon_id" id="anon_id" placeholder="z.B. AB3F9D1C4E" required>
        <button type="submit" name="login">Fortschritt fortsetzen</button>
    </form>
    <form method="post">
        <button type="submit" name="register">Neue ID generieren</button>
    </form>
    <?php if ($message): ?>
        <div class="msg"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
</div>
</body>
</html>
