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
            <h2>Sports</h2> 
            <input type="text" id="searchInput" placeholder="Barre de recherche">
        </div>
        <div style="padding: 10px 20px;">
            <a href="ressources.php" style="text-decoration: none; font-weight: bold; color: #000;">← Retour à toutes les ressources</a>
        </div>
        <div class="resources-list">
            <h3>Articles</h3>
            <?php
            $articles = [
                "Histoire du sport féminin - 1000 ans d’évolution (pas toujours)" => "https://conseilsport.decathlon.fr/histoire-du-sport-feminin-1000-ans-devolution-enfin-pas-toujours-avec-le-portrait-de-wilma-rudolph-en-bonus",
                "Sport féminin : les inégalités persistent !" => "https://www.oxfamfrance.org/inegalites-femmes-hommes/inegalites-femmes-sport/",
                "Cinq choses à savoir sur les femmes et le sport" => "https://www.unwomen.org/fr/nouvelles/article-explicatif/2024/07/cinq-choses-a-savoir-sur-les-femmes-et-le-sport",
                "Le sport féminin gagne du terrain" => "https://www.sports.gouv.fr/le-sport-feminin-gagne-du-terrain-3262",
                "Place des femmes dans le sport : on en est où ?" => "https://asptt.com/blog/article/place-des-femmes-dans-le-sport/ ",
                "Faits et chiffres : les femmes dans le sport" => "https://www.unwomen.org/fr/jeux-olympiques-de-paris-2024-une-nouvelle-ere-pour-les-femmes-dans-le-monde-du-sport/faits-et-chiffres-les-femmes-dans-le-sport",
                "Où en est l'égalité femmes hommes dans le sport ?" => "https://www.vie-publique.fr/parole-dexpert/290150-ou-en-est-legalite-femmes-hommes-dans-le-sport",
                "Femmes et sport : « J’ai dû me battre et me justifier deux fois plus car j’étais une femme »" => "https://www.lemonde.fr/sport/article/2023/03/06/femmes-et-sport-j-ai-du-me-battre-et-me-justifier-deux-fois-plus-car-j-etais-une-femme_6164284_3242.html",
                "Une lutte pour la visibilité du sport féminin" => "https://www.espace-sciences.org/sciences-ouest/420/dossier/une-lutte-pour-la-visibilite-du-sport-feminin",
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
                "Ces femmes ont changé le monde du sport" => "https://www.facebook.com/watch/?v=932614845258571",
                "La place des femmes dans le milieu sportif | Opinion" => "https://www.youtube.com/watch?v=TZHK9wndGLY",
                "Le sport féminin, histoire d’un combat" => "https://www.youtube.com/watch?v=vDwMXnixfAk",
                "« On attend qu'on soit musclées mais aussi hyper-féminines. »" => "https://www.youtube.com/watch?v=vvXhWy9pczk",
                "Le sport au prisme du genre. Une longue marche pour l’égalité" => "https://www.youtube.com/watch?v=PM5qoIW0dkc",
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
                "Les combattantes du sport et du genre | Un podcast à soi (2) - ARTE Radio Podcast" => "https://www.youtube.com/watch?v=45jNv0XptsU",
                "Florence-Agathe Dubé-Moreau et Annie Larouche : Le féminisme dans le sport | Sportives, point final" => "https://www.youtube.com/watch?v=fcLF38nzfYA",
                "Sports olympiques, médaille d’or du sexisme" => "https://www.youtube.com/watch?v=8G9Ypo2z_JM",
                "Florence-Agathe Dubé-Moreau - La place des femmes dans le sport | Le Podcast de Niry" => "https://www.youtube.com/watch?v=l5Obtj2W-_0",
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
                "Fitness Femme - Entraînement" => "https://play.google.com/store/apps/details?id=women.workout.female.fitness&hl=fr",
                "Lady Sports Soest" => "https://play.google.com/store/apps/details?id=com.mylogifit.ladysportssoest&hl=fr",
                "Idawo" => "https://www.radiofrance.fr/francebleu/podcasts/la-nouvelle-eco-de-france-bleu-paris/la-nouvelle-eco-idawo-l-appli-pour-aider-les-femmes-a-faire-des-sports-collectifs-1611309",
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
                "Livre : Du sexisme dans le sport de Béatrice Barbusse" => "https://anamosa.fr/livre/du-sexisme-dans-le-sport-nouvelle-edition/",
                "Livre : Le Sport Contre Les Femmes de Ronan David" => "https://www.editionsbdl.com/produit/le-sport-contre-les-femmes/",
                "Association : Femix’Sports"  => "https://www.femixsports.fr/"
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
