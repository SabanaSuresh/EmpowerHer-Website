<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=empowerher_db;charset=utf8', 'root', '');

if (!isset($_SESSION["username"])) {
    header('Location: connexion.html');
    exit();
}

// poster un nouveau sujet
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["titre"]) && !empty($_POST["forum"])) {
    $titre = htmlspecialchars($_POST["titre"]);
    $forum = htmlspecialchars($_POST["forum"]);

    $insert = $pdo->prepare("INSERT INTO forum_sujets (titre, forum) VALUES (?, ?)");
    $insert->execute([$titre, $forum]);

    // retour
    header("Location: forum.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un sujet - Forum - EmpowHer</title>
    <style>
        body { font-family: 'Times New Roman', serif; margin: 0; padding: 0; background-color: #fbfcfc; display: flex; flex-direction: column; min-height: 100vh; }
        header { display: flex; justify-content: space-between; align-items: center; padding: 20px; background-color: #ca83f7; }
        header h1 { margin: 0; text-align: center; flex-grow: 1; }
        .banner { width: 100%; height: 200px; background-image: url('banner.png'); background-size: cover; background-position: center; }
        .container { flex-grow: 1; padding: 20px; }
        .form { background: #fff; border: 1px solid #ccc; padding: 20px; max-width: 500px; margin: 30px auto; }
        .form input, .form select { width: 100%; padding: 10px; margin-bottom: 15px; }
        .form button { padding: 10px 15px; background: #ca83f7; border: none; color: white; cursor: pointer; }
        .footer { text-align: center; padding: 10px; background-color: #ca83f7; margin-top: auto; }
        .footer-links { display: flex; justify-content: space-between; width: 100%; max-width: 800px; margin: 0 auto; }
        .container h2 {text-align: center;}
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
    <h2>Créer un nouveau sujet</h2>

    <form method="POST" class="form">
        <label for="titre">Titre du sujet :</label>
        <input type="text" name="titre" id="titre" required>

        <label for="forum">Choisir le forum :</label>
        <select name="forum" id="forum" required>
            <option value="Général">Général</option>
            <option value="Santé">Santé</option>
            <option value="Carrière">Carrière</option>
            <option value="Éducation">Éducation</option>
            <option value="Activisme">Activisme</option>
        </select>

        <button type="submit">Créer</button>
    </form>
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
