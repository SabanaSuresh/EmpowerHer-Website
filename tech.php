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
            <h2>Technologie et Numérique</h2> 
            <input type="text" id="searchInput" placeholder="Barre de recherche">
        </div>
        <div style="padding: 10px 20px;">
            <a href="ressources.php" style="text-decoration: none; font-weight: bold; color: #000;">← Retour à toutes les ressources</a>
        </div>
        <div class="resources-list">
            <h3>Articles</h3>
            <?php
            $articles = [
                "Les chiffres clés sur les femmes et la tech" => "https://www.grandeecolenumerique.fr/le-numerique-et-les-femmes/les-chiffres-cles-sur-les-femmes-et-la-tech",
                "Femmes dans la tech : où en est-on aujourd’hui ?" => "https://www.valtus.fr/2024/06/07/femmes-dans-la-tech-ou-en-est-on-aujourdhui/",
                "Nouvelles technologies : outils indispensables à la mise en réseau et l'émancipation des filles et des femmes" => "https://www.w4.org/fr/nouvelles-technologies-pour-emancipation-des-femmes/",
                "17 avril : Journée de la femme digitale" => "https://www.egalite-femmes-hommes.gouv.fr/17-avril-journee-de-la-femme-digitale",
                "La place des femmes dans la Tech" => "https://shape-it.io/la-place-des-femmes-dans-la-tech-defis-opportunites-et-pistes-de-progression",
                "Les Femmes dans les métiers du numérique" => "https://institutnr.org/femmes-metiers-numerique",
                "Féminiser le secteur de la tech" => "https://pactemondial.org/2023/04/27/feminiser-le-secteur-de-la-tech-un-defi-majeur-et-des-opportunites-pour-tous/",
                "Les femmes sont l’avenir du numérique !" => "https://www.grouperandstad.fr/publication/futur-du-travail/les-femmes-sont-lavenir-du-numerique/",
                "Comment manœuvrer vers un avenir numérique équitable" => "https://www.unwomen.org/fr/nouvelles/article-explicatif/2023/02/comment-manoeuvrer-vers-un-avenir-numerique-equitable",
                "Femmes du numérique : défis et opportunités pour un monde digital et inclusif" => "https://www.sherpany.com/fr/ressources/transformation-digitale/transformation-entreprise/femmes-du-numerique/",
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
                "Parcours inspirants : être une femme dans le secteur de la tech" => "https://www.youtube.com/watch?v=TyT2mh3Jios",
                "Le discours d’inspiration: Les femmes qui inspirent dans le secteur de la technologie" => "https://www.youtube.com/watch?v=qmGCZcTuxxA",
                "Femmes et numérique : pratiques égalitaires, dispositifs inclusifs" => "https://www.youtube.com/watch?v=AE54o0QgFJo",
                "Les oubliées du numérique | Épisode 2 | Les femmes dans la Tech | ETNA" => "https://www.youtube.com/watch?v=4DQo4hy5wMg",
                "Les femmes et le numérique : reformatons la société | Zinnya Del Villar | TEDxRennes" => "https://www.youtube.com/watch?v=x7ozO9vZJdw",
                "Quelle place pour les femmes dans la tech ?" => "https://www.youtube.com/watch?v=UWziHcuM4rM",
                "La place de la femme dans le numérique - Interview Ldigital" => "https://www.youtube.com/watch?v=-4MiL61YMOo",
                "SMART IMPACT - L’IA encore trop fermée aux femmes ?" => "https://www.youtube.com/watch?v=xeTtlhSxR_s",
                "Femmes, emploi et intelligence artificielle : les grands enjeux à venir - Le numérique pour tous" => "https://www.youtube.com/watch?v=iq5cHtS74Sk",
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
                "Technoféminisme : Comment se réapproprier l'espace et les technologies numériques ?" => "https://www.youtube.com/watch?v=f2i8M1QRogc",
                "[Podcast OK:SII] : les femmes dans la tech : comment devenir speakeuse ?" => "https://www.youtube.com/watch?v=td8htphPc2g",
                "[Inside Esker #12] La tech au féminin" => "https://www.youtube.com/watch?v=qopxT0ctHGY",
            ];
            echo "<ul>";
            foreach ($podcasts as $titre => $lien) {
                echo "<li><a href='$lien' target='_blank'>$titre</a></li>";
            }
            echo "</ul>";
            ?>

            <h3>Autres</h3>
            <?php
            $autres = [
                "Programme : NOVA In tech" => "https://numeum.fr/themes/femmes-dans-le-numerique",
                "Livre : Numérique, compter avec les femmes de Anne-Marie Kermarrec" => "https://www.odilejacob.fr/catalogue/sciences-humaines/management-entreprise/numerique-compter-avec-les-femmes_9782738154446.php",
                "Livre : Elles changent le monde de Delphine Remy-Boutang" => "https://www.joinjfd.com/livre-elles-changent-le-monde/",
                "Livre : La Femme digitale de Isabelle Juppé" => "https://www.amazon.fr/Femme-digitale-Isabelle-Jupp%C3%A9/dp/2709630036",
                "Quizz : LE QUIZZ de DesCodeuses" => "https://descodeuses.org/quizz-descodeuses/",
                "Association : Social Builder" => "https://socialbuilder.org/",
                "Programme : Numérique pour elles" => "https://numeriquepourelles.fr/",
                "Programme : JUMP IN TECH" => "https://becomtech.fr/nos-programmes/",
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
