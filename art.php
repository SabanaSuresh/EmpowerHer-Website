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
            <h2>Art et Littérature</h2> 
            <input type="text" id="searchInput" placeholder="Barre de recherche">
        </div>
        <div style="padding: 10px 20px;">
            <a href="ressources.php" style="text-decoration: none; font-weight: bold; color: #000;">← Retour à toutes les ressources</a>
        </div>
        <div class="resources-list">
            <h3>Articles</h3>
            <?php
            $articles = [
                "L’invisibilisation des femmes dans l’art et la culture, tentatives de compréhension" => "https://www.onufemmes.fr/nos-actualites/2021/7/9/linvisibilisation-des-femmes-dans-lart-et-la-culture-tentatives-de-comprehension",
                "Les femmes dans l’histoire de l’art (et la littérature jeunesse)" => "https://filledalbum.wordpress.com/2021/05/25/les-femmes-dans-lhistoire-de-lart-et-la-litterature-jeunesse/",
                "«La littérature et l’art, vecteurs essentiels» face aux violences faites aux femmes" => "https://www.culture.gouv.fr/regions/drac-ile-de-france/actualites/actualite-a-la-une/la-litterature-et-l-art-vecteurs-essentiels-face-aux-violences-faites-aux-femmes",
                "Des femmes qui lisent et de l'art" => "https://lasuperbenewsletter.substack.com/p/des-femmes-qui-lisent-et-de-lart",
                "Artistes femmes ni muses, ni soumises" => "https://www.connaissancedesarts.com/arts-expositions/artistes-femmes-ni-muses-ni-soumises-2-11133980/",
                "La place des femmes dans l’art" => "https://euradio.fr/emission/KYQz-la-cause-des-femmes-en-europe-jade-champetier/oQQl-la-place-des-femmes-dans-lart",
                "Littérature : un art encore largement dominé par les hommes" => "https://theconversation.com/litterature-un-art-encore-largement-domine-par-les-hommes-126561",
                "Femme dans l’art : toute une histoire" => "https://culturetvous.fr/informations-transversales/actualites/femme-dans-lart-toute-une-histoire-4194",
                "Déclaration des droits de la femme et de la citoyenne de Olympe de Gouges" => "https://gallica.bnf.fr/essentiels/anthologie/declaration-droits-femme-citoyenne-0",
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
                "« Une femme qui écrit » : quelques observations sur les femmes en littérature" => "https://www.youtube.com/watch?v=DxH4bWh1-CY",
                "« Il y a toujours eu des artistes femmes mais l'histoire les a mises de côté »" => "https://www.youtube.com/watch?v=Ht8tr_fBkAI",
                "Martine Reid - Femmes et littérature : une histoire culturelle" => "https://www.youtube.com/watch?v=dZBolVRtmQ8",
                "Femmes, féminisme, genre. Que faire de ces concepts en critique littéraire?" => "https://www.youtube.com/watch?v=ClXjB9U0an8",
                "Le travestissement féminin dans l'Histoire de l'art et la Littérature ft. Professeur Klotho" => "https://www.youtube.com/watch?v=XBYhl99O-5g",
                "Quelle place pour les femmes dans l’art ? • FRANCE 24" => "https://www.youtube.com/watch?v=RpyMc0LH0hc",
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
                "#20 - Aurore Évain présente Catherine Bernard et Mary Sidney | Art et Littérature | Podcast" => "https://www.youtube.com/watch?v=wqPyM2QXr9E",
                "Une histoire des littératures féministes : de Christine de Pisan à Monique Wittig" => "https://www.youtube.com/watch?v=_vFV--npHyU",
                "Femmes, féminité, féminisme [1/2] | Histoire des arts, objectif Bac !" => "https://www.youtube.com/watch?app=desktop&v=J-hPHchGqj4",
                "Femmes, féminité, féminisme [2/2] | Histoire des arts, objectif Bac !" => "https://www.youtube.com/watch?v=uCUrg-i67NM",
                "Mécanismes d'(in)visibilisation: où sont les femmes artistes ?" => "https://www.youtube.com/watch?v=a38KFJUXU1o",
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
                "Un Texte Une Femme" => "https://play.google.com/store/apps/details?id=com.itssauquet.untexteunefemme&hl=fr",
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
                "Un Texte Une Femme" => "https://play.google.com/store/apps/details?id=com.itssauquet.untexteunefemme&hl=fr",
                "Livre : Les impatientes de Djaïli Amadou Amal" => "https://www.lireka.com/fr/pp/9782290252949-les-impatientes",
                "Livre : La servante écarlate. The handmaid's tale de Margaret Atwood" => "https://www.lireka.com/fr/pp/9782221249949-la-servante-ecarlate-nouvelle-traduction",
                "Livre : L'événement de Annie Ernaux" => "https://www.lireka.com/fr/pp/9782070419234-levenement",
                "Livre : Une farouche liberté de Gisèle Halimi" => "https://www.lireka.com/fr/pp/9782253078401-une-farouche-liberte",
                "Livre : Sorcières : la puissance invaincue des femmes de Mona Chollet" => "https://www.lireka.com/fr/pp/9782355221224-sorcieres-la-puissance-invaincue-des-femmes",
                "Livre : Fille de Camille Laurens" => "https://www.lireka.com/fr/pp/9782072976025-fille",
                "Livre : Le consentement de Vanessa Springora" => "https://www.lireka.com/fr/pp/9782253101567-le-consentement",
                "Livre : Un féminisme décolonial de Françoise Vergès" => "https://www.lireka.com/fr/pp/9782358721745-un-feminisme-decolonial",
                "Livre : Une femme de Annie Ernaux" => "https://www.babelio.com/livres/Ernaux-Une-Femme/16846",
                "Livre : Une chambre à soi de Virginia Woolf" => "https://www.babelio.com/livres/Woolf-Une-chambre-a-soi-Un-lieu-a-soi/973291",
                "Livre : Le deuxième sexe de Simone de Beauvoir" => "https://www.gallimard.fr/catalogue/le-deuxieme-sexe-2-l-experience-vecue/9782070205141",
                "Livre : Parole de femme de Annie Leclerc" => "https://www.grasset.fr/livre/parole-de-femme-9782246000778/",
                "Jeu : Jeu de mémoire - 20 femmes dans l'art" => "https://www.todayisartday.com/fr/products/memory-game-20-women-in-art?srsltid=AfmBOookYh1ehA5t8_wDKgcscJiJqT6Z-28pzVtULe3iWA5qRHl8BkwK",
                "Jeu : Iconic Women in art" => "https://www.lesconfettis.com/iconic-women-art-jeu-cinqpoints/?srsltid=AfmBOoqnPLh-x-XJaiZEt_cx_oiDxhbtBuv535FY20DWvT4BOjxab51s",
                "Film : Frida de Julie Taymor" => "https://fr.wikipedia.org/wiki/Frida_(film)",
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
