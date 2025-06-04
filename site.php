<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowHer - Page d'accueil</title>
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
        .container {
            display: flex;
            flex-grow: 1;
            min-height: 0;
        }
        .sidebar {
            flex: 0 0 200px;
            padding: 20px;
            background-color: #fae4fc; 
            border-right: 1px solid #ccc;
            display: flex;
            flex-direction: column;
            align-items: flex-start; 
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 10px; 
        }
        .menu-title {
            text-align: center; 
            margin-top: 0px; 
        }
        .sidebar ul {
            list-style-type: none; 
            padding: 0; 
            margin: 0; 
            width: 100%; 
        }
        .sidebar li {
            width: 100%;
        }
        .sidebar li a {
            display: block; 
            padding: 10px; 
            text-align: left; 
            text-decoration: none;
            color: inherit; 
        }
        .sidebar li a:hover {
            background-color: #e0c1f7;
        }
        .main {
            flex-grow: 1;
            padding: 20px;
        }
        .resources {
            margin-left: 20px; 
            margin-bottom: 10px; 
            font-weight: normal; 
        }
        footer {
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

<div class="container">
    <aside class="sidebar">
        <h2 class="menu-title">Menu de Navigation</h2>
        <ul>
            <li><a href="ressources.php">Ressources</a></li>
            <li><a href="dictionnaire.php">Dictionnaire du féminisme</a></li>
            <li><a href="frise.php">Frise Chronologique</a></li>
            <li><a href="mur_heroines.php">Mur d’héroïnes</a></li>
            <li><a href="lois.php">Page des lois</a></li>
            <li><a href="jeux.php">Test et Quizz</a></li>
            <li><a href="forum.php">Forum</a></li>
        </ul>
    </aside>

    <main class="main">
        <section style="text-align: center;">
            <h2 style="margin-bottom: 40px;">Bienvenue sur EmpowHer !</h2>
            <p style="max-width: 800px; margin: 0 auto;">
                EmpowHer est une plateforme d'information, d'inspiration et d'engagement pour les droits des femmes et l'égalité des genres.
                <br><br>
                Vous y trouverez un espace riche en ressources, en lois historiques et en initiatives marquantes pour mieux comprendre les avancées du féminisme à travers le monde.
            </p>
        </section>
    </main>
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
<script>
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get("message") === "success") {
        alert("Compte créé avec succès !");
    }
</script>
</body>
</html>
