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
    <h2>Vidéos</h2>
    <input type="text" placeholder="Barre de recherche"> 
</div>
<div style="padding: 10px 20px;">
    <a href="ressources.php" style="text-decoration: none; font-weight: bold; color: #000;">← Retour à toutes les ressources</a>
</div>

<div class="main-content">
    <?php
    $articles = [
        "LES FEMMES DANS L'HISTOIRE DES SCIENCES : L'effet Matilda #CMH9" => "https://www.youtube.com/watch?v=H08PEppfabM",
        "Science : où sont les femmes ? - Science En Questions " => "https://www.youtube.com/watch?v=K3qyivNWAF4",
        "Portraits de femmes scientifiques" => "https://www.youtube.com/watch?v=uKlTMzYqcOA",
        "Marie Curie: Une femme pionnière aux deux Prix Nobel" => "https://www.youtube.com/watch?v=PNccWwHCw4M",
        "Les droits des femmes et la chimie : une histoire commune" => "https://www.youtube.com/watch?v=rrmGZnrQ9JQ",
        "Cecilia Payne - L'astrophysique au début du 20e siècle | Cherchez la femme ! | ARTE" => "https://www.youtube.com/watch?v=lwOdSqsxa90",
        "Les filles et les mathématiques" => "https://www.youtube.com/watch?v=CkmrNtB3L8o",
        "La place des femmes dans l'histoire de la médecine" => "https://www.youtube.com/watch?v=Iv-ddA0SbhY",
        "Femmes de Santé 2024" => "https://www.youtube.com/watch?app=desktop&v=4amwgJesDxQ",
        "Les femmes, victimes de discrimination médicale" => "https://www.youtube.com/watch?v=6fieZcN546A",
        "LA MÉDECINE EST-ELLE SEXISTE ?" => "https://www.youtube.com/watch?v=cb3Ov5r4pME",
        "Comment les femmes ont-elles été effacées de l'Histoire ? Entretien avec Titiou Lecoq" => "https://www.ouest-france.fr/societe/egalite-hommes-femmes/video-comment-les-femmes-ont-elles-ete-effacees-de-l-histoire-entretien-avec-titiou-lecoq-dcba0ccc-8ae2-45e3-9779-c697797d11c1",
        "Toute l'Histoire des femmes en France" => "https://www.youtube.com/watch?v=S3Zf8NzPIDA",
        "“Pourquoi l’Histoire a effacé les femmes ?” | SPEECH de Titiou Lecoq" => "https://www.dailymotion.com/video/x84tv5y",
        "Les femmes guerrières dans l'histoire : pourquoi elles n'existaient (presque) pas ?" => "https://www.youtube.com/watch?v=p8et5SjxZSs",
        "La petite histoire du travail des femmes" => "https://www.youtube.com/watch?v=0oir8OR6T5I",
        "Qu’est-ce qu’une économie féministe?" => "https://www.foei.org/fr/video/quest-ce-quune-economie-feministe-video/",
        "Inégalités hommes et femmes sur le marché du travail, une vidéo Sciences Echo" => "https://www.echosciences-paca.fr/articles/inegalites-hommes-et-femmes-sur-le-marche-du-travail-une-video-sciences-echo",
        "Les femmes travaillent gratuitement à partir de ce vendredi : les inégalités salariales pers... " => "https://www.youtube.com/watch?v=IilD2MzdiDE",
        "Une brève histoire de l'arrivée des femmes dans le monde du travail" => "https://www.dailymotion.com/video/x6fb24x",
        "La représentation des femmes dans les médias - Léa Salamé/Paul Lapierre - La collab' de l'info" => "https://www.youtube.com/watch?v=ieivmfJhD-0",
        "Les femmes et la culture : l’art du combat féminin" => "https://www.arte.tv/fr/videos/118080-083-A/les-femmes-et-la-culture-l-art-du-combat-feminin/",
        "Violences commises dans le cinéma, la culture, la mode et la publicité : audition de Me Too Médias" => "https://www.youtube.com/watch?v=A09poSYyxck",
        "TV5MONDE : Les femmes dans les médias" => "https://www.youtube.com/watch?v=h_z8QmFAfQg",
        "Le féminisme, un outil puissant dans la lutte contre le changement climatique" => "https://information.tv5monde.com/terriennes/femmes-actrices-de-la-lutte-pour-lenvironnement",
        "C’est quoi l’écoféminisme ? " => "https://www.arte.tv/fr/videos/116341-008-A/c-est-quoi-l-ecofeminisme/",
        "Les hommes moins écolo que les femmes ? - Y a Pas de Planète B" => "https://www.youtube.com/watch?v=KQ0nXb8ZO_k",
        "Le féminisme, un outil puissant dans la lutte contre le changement climatique" => "https://www.youtube.com/watch?v=SxGYwHmzvCM",
        "[VIRAGO] Écoféminisme : Vertes de rage ? Qui sont vraiment les écoféministes ?" => "https://www.youtube.com/watch?app=desktop&v=-vYfBgjpOmw",
        "Être une femme politique, ça veut dire quoi ?" => "https://www.dailymotion.com/video/x89h4rh",
        "Politique : les femmes au pouvoir, l'oppression au placard ? • FRANCE 24" => "https://www.youtube.com/watch?v=VycjXZ9iBiY",
        "France : quelle place pour les femmes en politique ?" => "https://information.tv5monde.com/terriennes/france-quelle-place-pour-les-femmes-en-politique-16275",
        "Le Combat des Femmes en Politique !" => "https://www.youtube.com/watch?v=iYvy6F0d52o",
        "Bien-être et droits des femmes : parole d’une croyante" => "https://www.ktotv.com/video/00404024/bien-etre-et-droits-des-femmes-parole-dune-croyante",
        "Dépression : les femmes sont les plus touchées" => "https://www.tf1info.fr/sante/video-depression-les-femmes-sont-les-plus-touchees-selon-une-etude-2101715.html",
        "Santé mentale et féminisme | Contre Soirée avec Louisadonna" => "https://www.youtube.com/watch?v=htgDaCqBuOA",
        "Parcours inspirants : être une femme dans le secteur de la tech" => "https://www.youtube.com/watch?v=TyT2mh3Jios",
        "Le discours d’inspiration: Les femmes qui inspirent dans le secteur de la technologie" => "https://www.youtube.com/watch?v=qmGCZcTuxxA",
        "Femmes et numérique : pratiques égalitaires, dispositifs inclusifs" => "https://www.youtube.com/watch?v=AE54o0QgFJo",
        "Les oubliées du numérique | Épisode 2 | Les femmes dans la Tech | ETNA" => "https://www.youtube.com/watch?v=4DQo4hy5wMg",
        "Les femmes et le numérique : reformatons la société | Zinnya Del Villar | TEDxRennes" => "https://www.youtube.com/watch?v=x7ozO9vZJdw",
        "Quelle place pour les femmes dans la tech ?" => "https://www.youtube.com/watch?v=UWziHcuM4rM",
        "La place de la femme dans le numérique - Interview Ldigital" => "https://www.youtube.com/watch?v=-4MiL61YMOo",
        "SMART IMPACT - L’IA encore trop fermée aux femmes ?" => "https://www.youtube.com/watch?v=xeTtlhSxR_s",
        "Femmes, emploi et intelligence artificielle : les grands enjeux à venir - Le numérique pour tous" => "https://www.youtube.com/watch?v=iq5cHtS74Sk",
        "« Une femme qui écrit » : quelques observations sur les femmes en littérature" => "https://www.youtube.com/watch?v=DxH4bWh1-CY",
        "« Il y a toujours eu des artistes femmes mais l'histoire les a mises de côté »" => "https://www.youtube.com/watch?v=Ht8tr_fBkAI",
        "Martine Reid - Femmes et littérature : une histoire culturelle" => "https://www.youtube.com/watch?v=dZBolVRtmQ8",
        "Femmes, féminisme, genre. Que faire de ces concepts en critique littéraire?" => "https://www.youtube.com/watch?v=ClXjB9U0an8",
        "Le travestissement féminin dans l'Histoire de l'art et la Littérature ft. Professeur Klotho" => "https://www.youtube.com/watch?v=XBYhl99O-5g",
        "Quelle place pour les femmes dans l’art ? • FRANCE 24" => "https://www.youtube.com/watch?v=RpyMc0LH0hc",
        "Ces femmes ont changé le monde du sport" => "https://www.facebook.com/watch/?v=932614845258571",
        "La place des femmes dans le milieu sportif | Opinion" => "https://www.youtube.com/watch?v=TZHK9wndGLY",
        "Le sport féminin, histoire d’un combat" => "https://www.youtube.com/watch?v=vDwMXnixfAk",
        "« On attend qu'on soit musclées mais aussi hyper-féminines. »" => "https://www.youtube.com/watch?v=vvXhWy9pczk",
        "Le sport au prisme du genre. Une longue marche pour l’égalité" => "https://www.youtube.com/watch?v=PM5qoIW0dkc",                    
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

    // pagination
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