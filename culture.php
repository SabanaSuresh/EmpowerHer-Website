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
            <h2>Culture et Médias</h2> 
            <input type="text" id="searchInput" placeholder="Barre de recherche">
        </div>
        <div style="padding: 10px 20px;">
            <a href="ressources.php" style="text-decoration: none; font-weight: bold; color: #000;">← Retour à toutes les ressources</a>
        </div>
        <div class="resources-list">
            <h3>Articles</h3>
            <?php
            $articles = [
                "Place des femmes dans les médias, la culture, le sport" => "https://www.egalite-femmes-hommes.gouv.fr/place-des-femmes-dans-les-medias-la-culture-le-sport",
                "Culture et médias : les femmes sont plus touchées par la discrimination" => "https://www.cbnews.fr/etudes/image-culture-medias-femmes-sont-plus-touchees-discrimination-80811",
                "Egalité femmes-hommes dans les médias : « pour que les femmes comptent, il faut les compter »" => "https://www.culture.gouv.fr/fr/actualites/egalite-femmes-hommes-dans-les-medias-pour-que-les-femmes-comptent-il-faut-les-compter",
                "Femmes et medias" => "https://shs.cairn.info/revue-reseaux1-2003-4-page-23?lang=fr&contenu=article",
                "La place des femmes dans les médias est en hausse depuis le début de l’année, mais…" => "https://www.ouest-france.fr/societe/egalite-hommes-femmes/la-place-des-personnalites-feminines-dans-les-medias-est-en-hausse-mais-d5baada6-dbf4-11ee-a79f-2312009be08f",
                "Les femmes plus visibles dans la culture mais toujours des inégalités" => "https://www.culture.gouv.fr/fr/actualites/les-femmes-plus-visibles-dans-la-culture-mais-toujours-des-inegalites",
                "La représentation des femmes dans les médias" => "https://www.egalab.org/representation_des_femmes_medias.php",
                "Égalité femmes-hommes : les médias ne montrent toujours pas l’exemple" => "https://www.radiofrance.fr/franceculture/egalite-femmes-hommes-les-medias-ne-montrent-toujours-pas-l-exemple-3907353",
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
                "La représentation des femmes dans les médias - Léa Salamé/Paul Lapierre - La collab' de l'info" => "https://www.youtube.com/watch?v=ieivmfJhD-0",
                "Les femmes et la culture : l’art du combat féminin" => "https://www.arte.tv/fr/videos/118080-083-A/les-femmes-et-la-culture-l-art-du-combat-feminin/",
                "Violences commises dans le cinéma, la culture, la mode et la publicité : audition de Me Too Médias" => "https://www.youtube.com/watch?v=A09poSYyxck",
                "TV5MONDE : Les femmes dans les médias" => "https://www.youtube.com/watch?v=h_z8QmFAfQg",
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
                "Comment développer la visibilité des femmes dans les médias ? 1/2 [Spécial PODCASTHON]" => "https://www.youtube.com/watch?v=zP3AevhuqQ0",
                "Comment développer la visibilité des femmes dans les médias ? 2/2 [Spécial PODCASTHON]" => "https://www.youtube.com/watch?v=5PqTo54AZGk",
                "Femmes et médias : les rencontres de l’Égalité : En direct" => "https://www.youtube.com/watch?v=e5yI89m3Iec",
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
                "Femme actuelle, le magazine" => "https://play.google.com/store/apps/details?id=com.milibris.standalone.app.fac&hl=fr",
                "Journal des Femmes" => "https://play.google.com/store/apps/details?id=com.journaldesfemmes.journaldesfemmes&hl=fr",
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
                "Aides pour les photographes" => "https://ellesfontla.culture.gouv.fr/aides",
                "Exposition de Pharrell Williams" => "https://www.sortiraparis.com/arts-culture/exposition/articles/324469-femmes-l-exposition-collective-et-gratuite-de-pharrell-williams-a-la-galerie-perrotin#:~:text=Avis%20aux%20accros%20de%20l,40%20artistes%20aux%20univers%20vari%C3%A9s.",
                "Musée : Le Paris des femmes" => "https://www.carnavalet.paris.fr/visiter/offre-culturelle/le-paris-des-femmes",
                "Musées: 11 femmes pour 11 institutions" => "https://www.parismusees.paris.fr/fr/actualite/11-femmes-pour-11-institutions",
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

// recup ts les liens
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
