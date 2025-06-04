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
            <h2>Politique</h2> 
            <input type="text" id="searchInput" placeholder="Barre de recherche">
        </div>
        <div style="padding: 10px 20px;">
            <a href="ressources.php" style="text-decoration: none; font-weight: bold; color: #000;">← Retour à toutes les ressources</a>
        </div>
        <div class="resources-list">
            <h3>Articles</h3>
            <?php
            $articles = [
                "Etre femme en politique, ce qu’il faut savoir pour réussir mais qu’on ne vous dit pas" => "https://www.elle.fr/Elle-Active/Actualites/Etre-femme-en-politique-ce-qu-il-faut-savoir-pour-reussir-mais-qu-on-ne-vous-dit-pas-3822435",
                "Faits et chiffres : Le leadership et la participation des femmes à la vie politique" => "https://www.unwomen.org/fr/articles/faits-et-chiffres/faits-et-chiffres-le-leadership-et-la-participation-des-femmes-a-la-vie-politique#:~:text=Seulement%2018%20pays%20ont%20une,1er%20janvier%202024%20%5B4%5D",
                "Leadership et participation des femmes à la vie politique" => "https://www.unwomen.org/fr/what-we-do/leadership-and-political-participation",
                "Les femmes en politique" => "https://shs.cairn.info/revue-apres-demain-2013-2-page-24?lang=fr",
                "Femmes et politique" => "https://www.paricilademocratie.com/approfondir/femmes-societe-et-politique/881-femmes-et-politique",
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
                "Être une femme politique, ça veut dire quoi ?" => "https://www.dailymotion.com/video/x89h4rh",
                "Politique : les femmes au pouvoir, l'oppression au placard ? • FRANCE 24" => "https://www.youtube.com/watch?v=VycjXZ9iBiY",
                "France : quelle place pour les femmes en politique ?" => "https://information.tv5monde.com/terriennes/france-quelle-place-pour-les-femmes-en-politique-16275",
                "Le Combat des Femmes en Politique !" => "https://www.youtube.com/watch?v=iYvy6F0d52o",
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
                "Vote et genre ; les femmes votent-elles différemment ?" => "https://www.youtube.com/watch?v=yiFeRUHMtuA",
                "Les femmes sont-elles des hommes politiques comme les autres ?" => "https://www.youtube.com/watch?v=_utyakM_mhY",
                "1996 - Simone Veil et la place des femmes en politique" => "https://www.youtube.com/watch?v=XgYSQpvUCX8",
                "Elles - Politique au féminin et dénonciations avec Catherine Fournier" => "https://www.youtube.com/watch?v=W42GUml3JCQ",
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
                "Association : Elues locales" => "https://www.elueslocales.fr/soutenir-et-valoriser-les-femmes-en-politique/",
                "Film : The Lady" => "https://fr.wikipedia.org/wiki/The_Lady_(film)",
                "Série : Borgen, une femme au pouvoir" => "https://fr.wikipedia.org/wiki/Borgen,_une_femme_au_pouvoir",
                "Livre : Femmes en politique : premier bilan de Christine Kelly" => "https://www.lisez.com/livres/femmes-en-politique-premier-bilan-trente-portraits-de-femmes-qui-ont-accede-aux"
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
