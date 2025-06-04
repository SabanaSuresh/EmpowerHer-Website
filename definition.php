<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=empowerher_db;charset=utf8', 'root', '');


$definitions = include('definitions.php');
$mot = isset($_GET['mot']) ? urldecode($_GET['mot']) : null;

if (!$mot || !isset($definitions[$mot])) {
    echo "<p>Mot non trouvé.</p>";
    exit;
}

$definition = $definitions[$mot]["definition"];
$exemple = $definitions[$mot]["exemple"];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ajouter_favori"]) && isset($_SESSION["username"])) {
    $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE username = ?");
    $stmt->execute([$_SESSION["username"]]);
    $user = $stmt->fetch();

    if ($user) {
        $stmt = $pdo->prepare("INSERT INTO favoris (utilisateur_id, type_favori, id_favori) VALUES (?, 'definition', ?)");
        $stmt->execute([$user['id'], $mot]);

        header("Location: definition.php?mot=" . urlencode($mot));
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowHer - Page Test et Quizz</title>
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
        .search-container {
            display: flex;
            justify-content: space-between; 
            align-items: center;
            padding: 10px 20px;
            width: 100%; 
            box-sizing: border-box; 
            margin-top: 10px; 
        }
        .search-container h2 {
            flex-grow: 1; 
            text-align: center; 
            margin: 0; 
            font-weight: bold; 
        }
        .search-container input {
            width: 200px; 
            padding: 5px;
            margin-left: 20px; 
        }
        .main-content {
            text-align: center; 
            padding: 20px;
            flex-grow: 1; 
        }
        .share-button {
            text-align: right;
            padding: 10px 20px;
            margin-top: 20px; 
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
<div class="search-container">
    <h2><?php echo htmlspecialchars($mot); ?></h2>
</div>

<div style="padding: 10px 20px;">
    <a href="dictionnaire.php" style="text-decoration: none; color: #000; font-weight: bold;">← Retour au dictionnaire</a>
</div>

<div class="main-content">
    <p><strong>Définition :</strong> <?php echo htmlspecialchars($definition); ?></p>
    <p><strong>Phrase illustrative :</strong> "<?php echo htmlspecialchars($exemple); ?>"</p>

    <div class="share-button">
        <p><strong>  </strong></p>
        <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode($mot . ' : ' . $definition); ?>&url=<?php echo urlencode("https://tonsite.com/definition.php?mot=" . urlencode($mot)); ?>" target="_blank">Partager sur X (Twitter)</a>
        <br>
        <?php if (isset($_SESSION["username"])): ?>
            <form method="POST" style="display:inline;">
                <input type="hidden" name="ajouter_favori" value="1">
                <button type="submit" style="background:none; border:none; color:inherit; cursor:pointer;">⭐ Ajouter aux favoris</button>
            </form>
        <?php else: ?>
            <a href="connexion.html" style="color: inherit;">⭐ Connectez-vous pour ajouter en favori</a>
        <?php endif; ?>

    </div>
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