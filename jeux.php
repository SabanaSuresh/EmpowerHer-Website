<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowHer - Test et Quizz</title>
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
        }

        .sidebar {
            width: 200px;
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

        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            width: 100%;
            box-sizing: border-box;
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

        .main p {
            text-align: center;
            font-size: 16px;
            line-height: 1.6;
            margin-top: 30px;
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

<div class="container">
    <aside class="sidebar">
        <h2>Recherche par jeu</h2>
        <ul>
            <li><a href="devine.php">Devine le mot</a></li>
            <li><a href="qui_est_ce.php">Qui-est-ce ?</a></li>
            <li><a href="quelle_héroïne.php">Quelle héroïne te ressemble ?</a></li>
            <li><a href="timeline.php">Timeline</a></li>
            <li><a href="vrai_faux.php">Vrai ou Faux</a></li>
        </ul>
    </aside>

    <main class="main">
        <div class="search-container">
            <h2>Test et Quizz</h2>
        </div>

        <p>
            Bienvenue sur l’espace interactif d’EmpowHer !<br>
            Explore les jeux disponibles dans le sommaire à gauche pour tester tes connaissances, t’amuser et en apprendre davantage sur l’histoire, les lois et les héroïnes du féminisme. 💜
        </p>
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

</body>
</html>
