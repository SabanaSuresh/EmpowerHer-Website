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
        .container {
            display: flex;
            flex-grow: 1;
            width: 100%; 
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
        .search-container {
            display: flex;
            justify-content: space-between; 
            align-items: center;
            padding: 10px 20px;
            width: 100%; 
            box-sizing: border-box; 
        }
        .search-container h2 {
            flex-grow: 1; /* Prend tout l'espace disponible */
            text-align: center; /* Centre le titre */
            margin: 0; /* Enlève l'espacement */
        }
        .search-container input {
            width: 200px; 
            padding: 5px;
            margin-left: 20px; /* Espacement à gauche du champ de recherche */
        }
        .resources-nav {
            padding: 10px 20px;
            width: 100%; 
        }
        .resources-nav a {
            margin-right: 10px;
            text-decoration: none;
            color: #000;
        }
        .resources-list {
            padding: 20px;
            width: 100%; 
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
        .suggest-resource {
            padding: 10px;
            text-align: center;
            width: 100%; 
            margin-top: 50px; 
            margin-bottom: 20px; 
        }
        .suggest-resource input {
            width: 100%; 
            padding: 5px;
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
        <h2>Recherche par thématique</h2>
        <ul>
            <li><a href="sciences.php">Sciences</a></li>
            <li><a href="medecine.php">Médecine</a></li>
            <li><a href="histoire.php">Histoire</a></li>
            <li><a href="travail.php">Travail et Économie</a></li>
            <li><a href="culture.php">Culture et Médias</a></li>
            <li><a href="ecologie.php">Environnement et Écologie</a></li>
            <li><a href="lapolitique.php">Politique</a></li>
            <li><a href="psycho.php">Psychologie et Bien-être</a></li>
            <li><a href="tech.php">Technologie et Numérique</a></li>
            <li><a href="art.php">Art et Littérature</a></li>
            <li><a href="sports.php">Sports</a></li>
        </ul>
    </aside>

    <main class="main" style="flex-grow: 1;">
        <div class="search-container">
            <h2>Histoire</h2> 
            <input type="text" id="searchInput" placeholder="Barre de recherche">
        </div>
        <div style="padding: 10px 20px;">
            <a href="ressources.php" style="text-decoration: none; font-weight: bold; color: #000;">← Retour à toutes les ressources</a>
        </div>
        <div class="resources-list">
            <h3>Articles</h3>
            <?php
            $articles = [
                "L'évolution des droits des femmes : chronologie" => "https://www.vie-publique.fr/eclairage/19590-chronologie-des-droits-des-femmes",
                "Être femme au Moyen-Âge : les chemins discrets de la liberté" => "https://www.nationalgeographic.fr/histoire/etre-femme-au-moyen-age-les-chemins-discrets-de-la-liberte-droits-emancipation-epoque-medievale",
                "Les femmes dans l’histoire mondiale" => "https://journals.openedition.org/clio/9894",
                "Il paraît que les femmes ont une histoire (mais pas depuis longtemps)" => "https://www.radiofrance.fr/franceculture/il-parait-que-les-femmes-ont-une-histoire-mais-pas-depuis-longtemps-6348151",
                "Les femmes pendant la Révolution française" => "https://www.lhistoire.fr/mondes-sociaux/les-femmes-pendant-la-r%C3%A9volution-fran%C3%A7aise",
                "Des femmes écrivent l’histoire des femmes au milieu du XIXe siècle : représentations, interprétations" => "https://journals.openedition.org/genrehistoire/742?lang=en",
            ];

            echo "<ul>";
            foreach ($articles as $titre => $lien) {
                echo "<li><a href='$lien' target='_blank'>$titre</a></li>";
            }
            echo "</ul>";
            ?>

            <h3>Vidéos</h3>
            <?php
            $videos = [
                "Comment les femmes ont-elles été effacées de l'Histoire ? Entretien avec Titiou Lecoq" => "https://www.ouest-france.fr/societe/egalite-hommes-femmes/video-comment-les-femmes-ont-elles-ete-effacees-de-l-histoire-entretien-avec-titiou-lecoq-dcba0ccc-8ae2-45e3-9779-c697797d11c1",
                "Toute l'Histoire des femmes en France" => "https://www.youtube.com/watch?v=S3Zf8NzPIDA",
                "“Pourquoi l’Histoire a effacé les femmes ?” | SPEECH de Titiou Lecoq" => "https://www.dailymotion.com/video/x84tv5y",
                "Les femmes guerrières dans l'histoire : pourquoi elles n'existaient (presque) pas ?" => "https://www.youtube.com/watch?v=p8et5SjxZSs",
                "La petite histoire du travail des femmes" => "https://www.youtube.com/watch?v=0oir8OR6T5I",
            ];

            echo "<ul>";
            foreach ($videos as $titre => $lien) {
                echo "<li><a href='$lien' target='_blank'>$titre</a></li>";
            }
            echo "</ul>";
            ?>

            <h3>Podcasts</h3>
            <?php
            $podcasts = [
                "Les femmes au XVIIIe siècle (avec Cécile Berly) - Grasse summer podcast festival" => "https://www.youtube.com/watch?v=sJ1Q6KC3FDs",
                "Les femmes dans l'Histoire - Simone Veil" => "https://www.youtube.com/watch?v=1PYbaV2LyPc",
                "Grossesses et avortements sous l’Ancien régime" => "https://www.youtube.com/watch?v=kwBprImfB1g",
                "L'ORIGINE du PATRIARCAT - Ft. Alex Ramirès" => "https://www.youtube.com/watch?v=ebQQEL6G7PE",
                "Podcast “L’histoire des droits des femmes à travers les époques”" => "https://www.youtube.com/watch?v=YpCekIu598c",
            ];

            echo "<ul>";
            foreach ($podcasts as $titre => $lien) {
                echo "<li><a href='$lien' target='_blank'>$titre</a></li>";
            }
            echo "</ul>";
            ?>

            <h3>Applications</h3>
            <?php
            $apps = [
                "Femmes Qui Ont Changé le Monde" => "https://play.google.com/store/apps/details?id=com.learnyland.women&hl=fr",
                "Women on the map : une application qui géolocalise les femmes célèbres" => "https://womanns-world.com/women-on-the-map-application-geolocalisation-femmes-histoire/",
            ];

            echo "<ul>";
            foreach ($apps as $titre => $lien) {
                echo "<li><a href='$lien' target='_blank'>$titre</a></li>";
            }
            echo "</ul>";
            ?>

            <h3>Autres</h3>
            <?php
            $autres = [
                "Livre : Une histoire des femmes en Europe (des grottes aux Lumières) de Sophie Lalanne (dir.), Didier Lett, Dominique Picco" => "https://www.anhima.fr/publications/une-histoire-des-femmes-en-europe-des-grottes-aux-lumieres",
                "Extrait d'un livre : Les Femmes à travers l’Histoire de Isabelle Grégor et André Larané" => "https://www.herodote.net/Textes/Femmes_extraits.pdf",
                "Jeu  ''Qui est-ce ?'' : Who's she ?" => "https://www.comprendrepouragir.org/produit/whos-she/",
                "Jeu Time's up : Bad Bitches Only" => "https://www.comprendrepouragir.org/produit/jeu-de-cartes-feministe-bad-bitches-only/",
                "Film : Les Suffragettes" => "https://fr.wikipedia.org/wiki/Les_Suffragettes",
                "Film : Les Femmes de l'ombre" => "https://fr.wikipedia.org/wiki/Les_Femmes_de_l%27ombre",
            ];

            echo "<ul>";
            foreach ($autres as $titre => $lien) {
                echo "<li><a href='$lien' target='_blank'>$titre</a></li>";
            }
            echo "</ul>";
            ?>
        </div>


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
const searchInput = document.getElementById('searchInput');

// recup les liens
const links = document.querySelectorAll('.resources-list a');

searchInput.addEventListener('input', function () {
    const query = this.value.trim().toLowerCase();

    links.forEach(link => {
        const text = link.innerText.toLowerCase();
        if (text.includes(query)) {
            link.parentElement.style.display = "list-item"; 
        } else {
            link.parentElement.style.display = "none";
        }
    });

    // si barre de recherche vide
    if (query === '') {
        links.forEach(link => link.parentElement.style.display = "list-item");
    }
});
</script>

</body>
</html>
