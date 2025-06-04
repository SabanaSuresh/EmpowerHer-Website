<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=empowerher_db;charset=utf8', 'root', '');

if (!isset($_GET['id'])) {
    header('Location: forum.php');
    exit();
}

$id_sujet = (int) $_GET['id'];

// Récupérer le sujet
$stmt = $pdo->prepare("SELECT * FROM forum_sujets WHERE id = ?");
$stmt->execute([$id_sujet]);
$sujet = $stmt->fetch();

if (!$sujet) {
    echo "Sujet introuvable.";
    exit();
}

// Poster un message
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["contenu"])) {
    if (!isset($_SESSION["username"])) {
        header('Location: connexion.html');
        exit();
    }
    $contenu = htmlspecialchars($_POST["contenu"]);
    $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE username = ?");
    $stmt->execute([$_SESSION["username"]]);
    $user = $stmt->fetch();
    $userId = $user['id'];
    
    $insert = $pdo->prepare("INSERT INTO forum_messages (id_sujet, user_id, contenu) VALUES (?, ?, ?)");
    $insert->execute([$id_sujet, $userId, $contenu]);    
    header("Location: discussion.php?id=$id_sujet");
    exit();
}

// Récupérer les messages
$stmt_messages = $pdo->prepare("SELECT fm.*, u.username FROM forum_messages fm JOIN utilisateurs u ON fm.user_id = u.id WHERE fm.id_sujet = ? ORDER BY fm.date_message ASC");
$stmt_messages->execute([$id_sujet]);
$messages = $stmt_messages->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($sujet['titre']); ?> - Forum - EmpowHer</title>
    <style>
        body { font-family: 'Times New Roman', serif; margin: 0; padding: 0; background-color: #fbfcfc; display: flex; flex-direction: column; min-height: 100vh; }
        header { display: flex; justify-content: space-between; align-items: center; padding: 20px; background-color: #ca83f7; }
        header h1 { margin: 0; text-align: center; flex-grow: 1; }
        .banner { width: 100%; height: 200px; background-image: url('banner.png'); background-size: cover; background-position: center; }
        .container { flex-grow: 1; padding: 20px; }
        .message { background: #fff; border: 1px solid #ccc; margin-bottom: 10px; padding: 10px; }
        .message strong { color: #ca83f7; }
        .post-form { margin-top: 20px; }
        .post-form textarea { width: 100%; height: 100px; padding: 10px; }
        .post-form button { margin-top: 10px; padding: 5px 15px; }
        .footer { text-align: center; padding: 10px; background-color: #ca83f7; margin-top: auto; }
        .footer-links { display: flex; justify-content: space-between; width: 100%; max-width: 800px; margin: 0 auto; }
    </style>
</head>
<body>

<header>
    <a href="site.php" style="display: flex; align-items: center; text-decoration: none; color: inherit; flex-grow: 1; justify-content: center;">
        <img src="logo.png" alt="Logo" width="50">
        <h1 style="margin-left: 10px;">EmpowHer</h1>
    </a>
    <nav>
    <?php if (isset($_SESSION["username"])): ?>
        <a href="profil.php" style="text-decoration: none; color: inherit;">
            <button><?php echo htmlspecialchars($_SESSION["username"]); ?></button>
        </a>
    <?php else: ?>
        <a href="connexion.html" style="text-decoration: none; color: inherit;">
            <button>Créer compte / Connexion</button>
        </a>
    <?php endif; ?>
    </nav>
</header>

<div class="banner"></div>

<div class="container">
    <h2><?php echo htmlspecialchars($sujet['titre']); ?></h2>

    <?php foreach ($messages as $message): ?>
        <div class="message">
            <strong><?php echo htmlspecialchars($message['username']); ?></strong> - <?php echo date('d/m/Y H:i', strtotime($message['date_message'])); ?><br>
            <?php echo nl2br(htmlspecialchars($message['contenu'])); ?>
        </div>
    <?php endforeach; ?>

    <?php if (isset($_SESSION["username"])): ?>
    <div class="post-form">
        <form method="POST">
            <textarea name="contenu" placeholder="Votre message..." required></textarea><br>
            <button type="submit">Envoyer</button>
        </form>
    </div>
    <?php else: ?>
        <p><a href="connexion.html">Connectez-vous</a> pour poster un message.</p>
    <?php endif; ?>
</div>

<footer class="footer">
    <div class="footer-links">
        <a href="liens_utiles.php">Liens utiles</a>
        <span>|</span>
        <a href="contact.php">Contact</a>
        <span>|</span>
        <a href="politique.php">Politique de confidentialité</a>
    </div>
</footer>

</body>
</html>
