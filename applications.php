<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowHer - Page Ressources</title>
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
    <h2>Articles</h2>
    <input type="text" placeholder="Barre de recherche"> 
</div>
<div style="padding: 10px 20px;">
    <a href="ressources.php" style="text-decoration: none; font-weight: bold; color: #000;">← Retour à toutes les ressources</a>
</div>

<div class="main-content">
    <?php
    $articles = [
        "For Women in Science Community" => "https://play.google.com/store/apps/details?id=com.fwiscommunity.myapp&hl=fr",
        "Femme Clientes" => "https://play.google.com/store/apps/details?id=br.com.mtmtecnologia.mobilex.femme.pacientes&hl=fr",
        "Nabla" => "https://www.nabla.com/fr/",
        "Flo" => "https://flo.health/fr",
        "Clue" => "https://helloclue.com/fr",
        "Keep a Breast" => "https://keepabreast.fr/keepabreast-app",
        "Omena" => "https://www.omena.app/",
        "Femmes Qui Ont Changé le Monde" => "https://play.google.com/store/apps/details?id=com.learnyland.women&hl=fr",
        "Women on the map : une application qui géolocalise les femmes célèbres" => "https://womanns-world.com/women-on-the-map-application-geolocalisation-femmes-histoire/",
        "Toutes Connectées" => "https://play.google.com/store/apps/details?id=com.toutesconnectees&hl=fr",
        "Leadership pour elles" => "https://www.francetvinfo.fr/decouverte/gadgets/que-vaut-leadership-pour-elles-l-application-du-gouvernement-pour-les-femmes-au-travail_570999.html",
        "Femme actuelle, le magazine" => "https://play.google.com/store/apps/details?id=com.milibris.standalone.app.fac&hl=fr",
        "Journal des Femmes" => "https://play.google.com/store/apps/details?id=com.journaldesfemmes.journaldesfemmes&hl=fr",
        "Yuka" => "https://yuka.io/",
        "Buy Or Not" => "https://buyornot.org/",
        "Psychology of men and women" => "https://play.google.com/store/apps/details?id=app.psycho.newworld&hl=fr",
        "Feminine health" => "https://play.google.com/store/apps/details?id=com.eurofarmacontigo&hl=fr",
        "Un Texte Une Femme" => "https://play.google.com/store/apps/details?id=com.itssauquet.untexteunefemme&hl=fr",
        "Fitness Femme - Entraînement" => "https://play.google.com/store/apps/details?id=women.workout.female.fitness&hl=fr",
        "Lady Sports Soest" => "https://play.google.com/store/apps/details?id=com.mylogifit.ladysportssoest&hl=fr",
        "Idawo" => "https://www.radiofrance.fr/francebleu/podcasts/la-nouvelle-eco-de-france-bleu-paris/la-nouvelle-eco-idawo-l-appli-pour-aider-les-femmes-a-faire-des-sports-collectifs-1611309",
    ];

    
    ksort($articles, SORT_FLAG_CASE | SORT_STRING);

    $parPage = 15;
    $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $debut = ($page - 1) * $parPage;
    $totalPages = ceil(count($articles) / $parPage);
    $affichage = array_slice($articles, $debut, $parPage);

    echo "<ul style='list-style-type: disc; padding-left: 40px;'>";
    foreach ($affichage as $titre => $url) {
        echo "<li style='margin-bottom: 10px;'><a href='{$url}' target='_blank'>{$titre}</a></li>";
    }
    echo "</ul>";

    echo "<div style='margin-top: 20px;'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $page) {
            echo "<strong>$i</strong> ";
        } else {
            echo "<a href='?page=$i' style='margin-right: 5px;'>$i</a> ";
        }
    }
    echo "</div>";
    ?>
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