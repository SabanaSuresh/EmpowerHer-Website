<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=empowerher_db;charset=utf8', 'root', '');

// si bien connecté
if (!isset($_SESSION["username"])) {
    header("Location: connexion.html");
    exit;
}

// utilisateur
$stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE username = ?");
$stmt->execute([$_SESSION["username"]]);
$userData = $stmt->fetch();
if (!$userData) {
    die("Utilisateur introuvable.");
}

$evenements = include('evenements.php');
$heroines = include('heroines.php');

// messages
$stmt = $pdo->prepare("SELECT fm.*, fs.titre FROM forum_messages fm JOIN forum_sujets fs ON fm.id_sujet = fs.id WHERE fm.user_id = ? ORDER BY fm.date_message DESC");
$stmt->execute([$userData['id']]);
$messagesForum = $stmt->fetchAll();

// commentaires événements
$stmt = $pdo->prepare(" SELECT c.*, u.username FROM commentaires_evenements c JOIN utilisateurs u ON c.user_id = u.id WHERE c.user_id = ? ORDER BY c.date_creation DESC ");
$stmt->execute([$userData['id']]);
$commentairesEvenements = $stmt->fetchAll();

// commentaires héroïnes
$stmt = $pdo->prepare(" SELECT c.*, u.username FROM heroine_commentaires c JOIN utilisateurs u ON c.user_id = u.id WHERE c.user_id = ? ORDER BY c.date_commentaire DESC ");
$stmt->execute([$userData['id']]);
$commentairesHeroines = $stmt->fetchAll();

// commentaires lois
$stmt = $pdo->prepare(" SELECT c.*, u.username FROM loi_commentaires c JOIN utilisateurs u ON c.user_id = u.id WHERE c.user_id = ? ORDER BY c.date_commentaire DESC ");
$stmt->execute([$userData['id']]);
$commentairesLois = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowHer - Mes Messages</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            margin: 0;
            padding: 0;
            background-color: #fbfcfc; 
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #ca83f7; 
        }
        header h1 {
            margin: 0;
            text-align: center;
            flex-grow: 1;
        }
        nav {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
        nav button {
            margin-bottom: 10px;
        }
        .banner {
            width: 100%;
            height: 200px; 
            background-image: url('banner.png'); 
            background-size: cover;
            background-position: center;
        }
        .main-content {
            padding: 20px;
            flex-grow: 1;
            max-width: 900px;
            margin: auto;
        }
        .message-block {
            background-color: #eee;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: left;
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #ca83f7;
            margin-top: auto;
        }
        .footer-links {
            display: flex;
            justify-content: space-between;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
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

<div class="main-content">

    <h2 style="text-align:center;">Mes Messages et Commentaires</h2>

    <h3>🗨️ Messages dans le forum</h3>
    <?php if (count($messagesForum) > 0): ?>
        <?php foreach ($messagesForum as $message): ?>
            <div class="message-block">
                <div><strong>Date :</strong> <?php echo date('d/m/Y H:i', strtotime($message['date_message'])); ?></div>
                <div><strong>Message :</strong> <?php echo nl2br(htmlspecialchars($message['contenu'])); ?></div>
                <div><em>
                    <?php 
                    // recup le titre du forum
                    $stmtSujet = $pdo->prepare("SELECT titre FROM forum_sujets WHERE id = ?");
                    $stmtSujet->execute([$message['id_sujet']]);
                    $sujet = $stmtSujet->fetch();
                    echo 'Dans le forum : ' . htmlspecialchars($sujet['titre'] ?? 'Sujet inconnu');
                    ?>
                </em></div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align:center;">Aucun message dans le forum.</p>
    <?php endif; ?>

    <h3>🗨️ Commentaires sous les événements</h3>
    <?php if (count($commentairesEvenements) > 0): ?>
        <?php foreach ($commentairesEvenements as $com): ?>
            <div class="message-block">
                <div><strong>Date :</strong> <?php echo date('d/m/Y H:i', strtotime($com['date_creation'])); ?></div>
                <div><strong>Commentaire :</strong> <?php echo nl2br(htmlspecialchars($com['contenu'])); ?></div>
                <div><em>Sous l'événement : <?php echo htmlspecialchars($evenements[$com['id_evenement']]['titre'] ?? 'Événement inconnu'); ?></em></div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align:center;">Aucun commentaire sous un événement.</p>
    <?php endif; ?>

    <h3>🗨️ Commentaires sous les héroïnes</h3>
    <?php if (count($commentairesHeroines) > 0): ?>
        <?php foreach ($commentairesHeroines as $com): ?>
            <div class="message-block">
                <div><strong>Date :</strong> <?php echo date('d/m/Y H:i', strtotime($com['date_commentaire'])); ?></div>
                <div><strong>Commentaire :</strong> <?php echo nl2br(htmlspecialchars($com['contenu'])); ?></div>
                <div><em>Sous l'héroïne : <?php echo htmlspecialchars($heroines[$com['id_heroine']]['nom'] ?? 'Héroïne inconnue'); ?></em></div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align:center;">Aucun commentaire sous une héroïne.</p>
    <?php endif; ?>

    <h3>🗨️ Commentaires sous les lois</h3>
    <?php if (count($commentairesLois) > 0): ?>
        <?php foreach ($commentairesLois as $com): ?>
            <div class="message-block">
                <div><strong>Date :</strong> <?php echo date('d/m/Y H:i', strtotime($com['date_commentaire'])); ?></div>
                <div><strong>Commentaire :</strong> <?php echo nl2br(htmlspecialchars($com['contenu'])); ?></div>
                <div><em>Sous la loi : <?php echo htmlspecialchars($com['titre_loi']); ?></em></div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align:center;">Aucun commentaire sous une loi.</p>
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
