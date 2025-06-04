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
            <h2>Environnement et Écologie</h2> 
            <input type="text" id="searchInput" placeholder="Barre de recherche">
        </div>
        <div style="padding: 10px 20px;">
            <a href="ressources.php" style="text-decoration: none; font-weight: bold; color: #000;">← Retour à toutes les ressources</a>
        </div>
        <div class="resources-list">
            <h3>Articles</h3>
            <?php
            $articles = [
                "Droits des femmes : un enjeu environnemental" => "https://fne.asso.fr/dossiers/droits-des-femmes-un-enjeu-environnemental#:~:text=Les%20in%C3%A9galit%C3%A9s%20de%20genre%20renforcent,es%20environnementaux%20sont%20des%20femmes.",
                "Les femmes et l’environnement" => "http://www.adequations.org/spip.php?article648#:~:text=Les%20femmes%20ont%20souvent%20jou%C3%A9,les%20modes%20de%20consommation%20viables.",
                "L'écologie serait-elle une affaire de femmes ?" => "https://www.radiofrance.fr/franceculture/l-ecologie-serait-elle-une-affaire-de-femmes-1196252",
                "Quels liens entre les questions de genre et les enjeux climatiques ?" => "https://millenaire3.grandlyon.com/dossiers/2024/attenuation-du-changement-climatique-quelles-empreintes-carbone-selon-les-csp-ages-genres-et-territoires/quels-liens-entre-les-questions-de-genre-et-les-enjeux-climatiques#:~:text=Les%20femmes%20sont%20plus%20vertueuses,16%20%25%20de%20CO%E2%82%82%20en%20moins.",
                "Pourquoi les femmes sont essentielles à l'action climatique" => "https://www.un.org/fr/climatechange/science/climate-issues/women#:~:text=Les%20femmes%20sont%20des%20agents%20du%20changement&text=Les%20femmes%20sont%20plus%20susceptibles,l'%C3%A9nergie%20dans%20le%20m%C3%A9nage.",
                "Le rôle crucial des femmes dans la protection de l’environnement en Afrique" => "https://eco-pledgeafrica.com/echo-vert/le-role-crucial-des-femmes-dans-la-protection-de-lenvironnement-en-afrique/#:~:text=Collecte%20et%20recyclage%20des%20d%C3%A9chets,renouvelables%20comme%20les%20foyers%20solaires.",
                "Les femmes et le changement climatique" => "https://tnova.fr/ecologie/climat/les-femmes-et-le-changement-climatique/",
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
                "Le féminisme, un outil puissant dans la lutte contre le changement climatique" => "https://information.tv5monde.com/terriennes/femmes-actrices-de-la-lutte-pour-lenvironnement",
                "C’est quoi l’écoféminisme ? " => "https://www.arte.tv/fr/videos/116341-008-A/c-est-quoi-l-ecofeminisme/",
                "Les hommes moins écolo que les femmes ? - Y a Pas de Planète B" => "https://www.youtube.com/watch?v=KQ0nXb8ZO_k",
                "Le féminisme, un outil puissant dans la lutte contre le changement climatique" => "https://www.youtube.com/watch?v=SxGYwHmzvCM",
                "[VIRAGO] Écoféminisme : Vertes de rage ? Qui sont vraiment les écoféministes ?" => "https://www.youtube.com/watch?app=desktop&v=-vYfBgjpOmw",
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
                "L’écoféminisme pour changer le monde ? Lauren Bastide" => "https://www.youtube.com/watch?v=V413p8QywNI",
                "Ecoféminisme #1 : Défendre nos territoires | Un podcast à soi (21) - ARTE Radio Podcast" => "https://www.youtube.com/watch?v=oFGQq_p3O2s",
                "Ecoféminisme #2 : Retrouver la terre | Un podcast à soi (22) - ARTE Radio Podcast" => "https://www.youtube.com/watch?app=desktop&v=TJh3UXj55wY&t=1s",
                "#77 - Véganisme, écoféminisme... des trucs de Blanc·hes ?" => "https://www.youtube.com/watch?v=ghWU1CaSpe8",
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
                "Yuka" => "https://yuka.io/",
                "Buy Or Not" => "https://buyornot.org/",
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
                "Livre : Être écoféministe de Jeanne Burgart Goutal" => "https://www.babelio.com/livres/Burgart-Goutal-tre-ecofeministe/1220109",
                "Livre : L'écoféminisme dans la géopolitique: Femmes et développement durable de Rokhaya Samb" => "https://www.babelio.com/livres/Samb-Lecofeminisme-dans-la-geopolitique-Femmes-et-dev/1217903",
                "Livre : Soeurs en écologie : Des femmes, de la nature et du réenchantement du monde de Pascale d'Erm" => "https://www.babelio.com/livres/Erm-Soeurs-en-ecologie--Des-femmes-de-la-nature-et-du/1203377",
                "Jeu de cartes : Héros et héroïnes de l’écologie" => "https://www.editionslibre.org/wp-content/uploads/2022/12/Heros-de-lecologie-volume-carre-1.png",
                "Film : Woman at war" => "https://1001heroines.fr/heroines/women-at-war/",
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
