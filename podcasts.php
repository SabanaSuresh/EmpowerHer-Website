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
    <h2>Podcasts</h2>
    <input type="text" placeholder="Barre de recherche"> 
</div>
<div style="padding: 10px 20px;">
    <a href="ressources.php" style="text-decoration: none; font-weight: bold; color: #000;">← Retour à toutes les ressources</a>
</div>

<div class="main-content">
    <?php
    $articles = [
        "Le plafond de verre des femmes scientifiques" => "https://www.youtube.com/watch?v=px08mHpDqaM",
        "Podcast Sous la blouse, S3 #1 Lucie Leboulleux" => "https://www.youtube.com/watch?v=px08mHpDqaM",
        "Femmes et Sciences - À vous le sup'" => "https://www.youtube.com/watch?v=J_0v8QHz-c8",   
        "Nathalie Gheeta Babouraj : Devenir sa propre médecine" => "https://www.youtube.com/watch?v=wcIC5rBSWQ0",
        "L'histoire de Caroline, femme, mère, médecin..." => "https://www.youtube.com/watch?v=W6muNYkFlVs",
        "PASSAGE DE TÉMOIN x PODEX - De Sage-Femme à Médecin avec Lorène ROCHARD" => "https://www.youtube.com/watch?v=bikePek-_7E",
        "Les femmes au XVIIIe siècle (avec Cécile Berly) - Grasse summer podcast festival" => "https://www.youtube.com/watch?v=sJ1Q6KC3FDs",
        "Les femmes dans l'Histoire - Simone Veil" => "https://www.youtube.com/watch?v=1PYbaV2LyPc",
        "Grossesses et avortements sous l’Ancien régime" => "https://www.youtube.com/watch?v=kwBprImfB1g",
        "L'ORIGINE du PATRIARCAT - Ft. Alex Ramirès" => "https://www.youtube.com/watch?v=ebQQEL6G7PE",
        "Podcast “L’histoire des droits des femmes à travers les époques”" => "https://www.youtube.com/watch?v=YpCekIu598c",
        "Justice Économique - Podcast Ep 9 - Autonomisation Economique des Femmes et travail rémunéré" => "https://www.youtube.com/watch?v=f6HYn7LjDAs",
        "Justice Économique - Podcast Ep 8 - Résilience économique et sécurité des revenus des femmes" => "https://www.youtube.com/watch?v=FGInhN1PrnA",
        "Justice Économique - Podcast Ep 15 - Travail décent et développement économique pour les femmes" => "https://www.youtube.com/watch?v=SC5h0poDrOc",
        "#87 Pourquoi les femmes sont majoritairement sous-payées? | Conversation avec Laëtitia Vitaud" => "https://www.youtube.com/watch?v=WXh23LHJ9BM",
        "Comment les femmes réinventent les codes de la réussite professionnelle ?" => "https://www.youtube.com/watch?v=aDNpjERopDY",
        "Comment développer la visibilité des femmes dans les médias ? 1/2 [Spécial PODCASTHON]" => "https://www.youtube.com/watch?v=zP3AevhuqQ0",
        "Comment développer la visibilité des femmes dans les médias ? 2/2 [Spécial PODCASTHON]" => "https://www.youtube.com/watch?v=5PqTo54AZGk",
        "Femmes et médias : les rencontres de l’Égalité : En direct" => "https://www.youtube.com/watch?v=e5yI89m3Iec",
        "L’écoféminisme pour changer le monde ? Lauren Bastide" => "https://www.youtube.com/watch?v=V413p8QywNI",
        "Ecoféminisme #1 : Défendre nos territoires | Un podcast à soi (21) - ARTE Radio Podcast" => "https://www.youtube.com/watch?v=oFGQq_p3O2s",
        "Ecoféminisme #2 : Retrouver la terre | Un podcast à soi (22) - ARTE Radio Podcast" => "https://www.youtube.com/watch?app=desktop&v=TJh3UXj55wY&t=1s",
        "#77 - Véganisme, écoféminisme... des trucs de Blanc·hes ?" => "https://www.youtube.com/watch?v=ghWU1CaSpe8",
        "Vote et genre ; les femmes votent-elles différemment ?" => "https://www.youtube.com/watch?v=yiFeRUHMtuA",
        "Les femmes sont-elles des hommes politiques comme les autres ?" => "https://www.youtube.com/watch?v=_utyakM_mhY",
        "1996 - Simone Veil et la place des femmes en politique" => "https://www.youtube.com/watch?v=XgYSQpvUCX8",
        "Elles - Politique au féminin et dénonciations avec Catherine Fournier" => "https://www.youtube.com/watch?v=W42GUml3JCQ",
        "Inventer une thérapie féministe | Un podcast à soi (52) - ARTE Radio Podcast" => "https://www.youtube.com/watch?v=_DC6fuWt6Uc",
        "Apprendre à prendre soin de soi : Féminisme et santé mentale avec Lauren Bastide" => "https://www.youtube.com/watch?v=oocjR0i91hg",
        "Au procès des folles | Un podcast à soi (51) - ARTE Radio Podcast" => "https://www.youtube.com/watch?app=desktop&v=BmLa5NhvS7M",
        "Technoféminisme : Comment se réapproprier l'espace et les technologies numériques ?" => "https://www.youtube.com/watch?v=f2i8M1QRogc",
        "[Podcast OK:SII] : les femmes dans la tech : comment devenir speakeuse ?" => "https://www.youtube.com/watch?v=td8htphPc2g",
        "[Inside Esker #12] La tech au féminin" => "https://www.youtube.com/watch?v=qopxT0ctHGY",
        "#20 - Aurore Évain présente Catherine Bernard et Mary Sidney | Art et Littérature | Podcast" => "https://www.youtube.com/watch?v=wqPyM2QXr9E",
        "Une histoire des littératures féministes : de Christine de Pisan à Monique Wittig" => "https://www.youtube.com/watch?v=_vFV--npHyU",
        "Femmes, féminité, féminisme [1/2] | Histoire des arts, objectif Bac !" => "https://www.youtube.com/watch?app=desktop&v=J-hPHchGqj4",
        "Femmes, féminité, féminisme [2/2] | Histoire des arts, objectif Bac !" => "https://www.youtube.com/watch?v=uCUrg-i67NM",
        "Mécanismes d'(in)visibilisation: où sont les femmes artistes ?" => "https://www.youtube.com/watch?v=a38KFJUXU1o",
        "Les combattantes du sport et du genre | Un podcast à soi (2) - ARTE Radio Podcast" => "https://www.youtube.com/watch?v=45jNv0XptsU",
        "Florence-Agathe Dubé-Moreau et Annie Larouche : Le féminisme dans le sport | Sportives, point final" => "https://www.youtube.com/watch?v=fcLF38nzfYA",
        "Sports olympiques, médaille d’or du sexisme" => "https://www.youtube.com/watch?v=8G9Ypo2z_JM",
        "Florence-Agathe Dubé-Moreau - La place des femmes dans le sport | Le Podcast de Niry" => "https://www.youtube.com/watch?v=l5Obtj2W-_0",
    ];

    
    ksort($articles, SORT_FLAG_CASE | SORT_STRING);

    $parPage = 20;
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