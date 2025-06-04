<?php
session_start();
$host = 'localhost';
$dbname = 'empowerher_db';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

$username = $_SESSION["username"];
$stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE username = ?");
$stmt->execute([$username]);
$userData = $stmt->fetch();
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
<div class="main-content" style="display: flex; justify-content: space-between; align-items: flex-start; padding: 40px;">
    <div style="flex-grow: 1; text-align: center;">
        <h2>👤 Mes informations personnelles</h2>
        <p><strong>Nom :</strong> <?php echo htmlspecialchars($userData['nom']); ?></p>
        <p><strong>Prénom :</strong> <?php echo htmlspecialchars($userData['prenom']); ?></p>
        <p><strong>Nom d'utilisateur :</strong> <?php echo htmlspecialchars($userData['username']); ?></p>
        <?php if ($_SESSION["username"] === "SabanaSuresh"): ?>
            <form action="admin.php" method="get" style="margin-top: 20px;">
                <button type="submit" style="padding: 10px 20px; background-color: #7d3c98; color: white; border: none; border-radius: 5px;">
                    Accéder au panneau d'administration
                </button>
            </form>
        <?php endif; ?>
    </div>

    <div style="display: flex; flex-direction: column; align-items: flex-end; gap: 15px;">
        <form action="modifier_infos.php" method="get">
            <button type="submit" style="padding: 10px 20px; background-color: #ca83f7; color: white; border: none; border-radius: 5px;">Modifier mes infos</button>
        </form>

        <form action="messages.php" method="get">
            <button type="submit" style="padding: 10px 20px; background-color: #ca83f7; color: white; border: none; border-radius: 5px;">Voir mes messages</button>
        </form>

        <form action="favoris.php" method="get">
            <button type="submit" style="padding: 10px 20px; background-color: #ca83f7; color: white; border: none; border-radius: 5px;">Voir mes favoris</button>
        </form>

        <form action="deconnexion.php" method="post">
            <button type="submit" style="padding: 10px 20px; background-color: #f76565; color: white; border: none; border-radius: 5px;">Se déconnecter</button>
        </form>
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