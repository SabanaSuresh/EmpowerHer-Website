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
            <h2>Psychologie et Bien-être</h2> 
            <input type="text" id="searchInput" placeholder="Barre de recherche">
        </div>
        <div style="padding: 10px 20px;">
            <a href="ressources.php" style="text-decoration: none; font-weight: bold; color: #000;">← Retour à toutes les ressources</a>
        </div>
        <div class="resources-list">
            <h3>Articles</h3>
            <?php
            $articles = [
                "Féminité et Estime de soi" => "https://www.psychologue.net/articles/feminite-et-estime-de-soi",
                "Psychologie féministe" => "https://fr.wikipedia.org/wiki/Psychologie_f%C3%A9ministe",
                "Pourquoi les femmes s’intéressent plus à la psychologie que les hommes?" => "https://www.huffingtonpost.fr/life/article/pourquoi-les-femmes-s-interessent-plus-a-la-psychologie-que-les-hommes-blog_189408.html",
                "Hommes-femmes : même cerveau, même psychologie ?" => "https://www.lesechos.fr/2017/09/hommes-femmes-meme-cerveau-meme-psychologie-177269",
                "DE LA CRITIQUE FÉMINISTE DE LA PSYCHOLOGIE À LA THÉRAPIE FÉMINISTE : DÉMOCRATISER LES PRATIQUES THÉRAPEUTIQUES" => "https://www.erudit.org/fr/revues/rqpsy/2022-v43-n3-rqpsy07552/1094895ar/",
                "Bien-Être" => "https://lapause.jho.fr/je-veux-prendre-soin-de-moi-et-de-mon-corps/bien-etre/1/",
                "L’industrie du bien-être n'est pas du côté des femmes. Elle nous détourne de ce qui nous fait réellement souffrir" => "https://theconversation.com/lindustrie-du-bien-etre-nest-pas-du-cote-des-femmes-elle-nous-detourne-de-ce-qui-nous-fait-reellement-souffrir-178727",
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
                "Bien-être et droits des femmes : parole d’une croyante" => "https://www.ktotv.com/video/00404024/bien-etre-et-droits-des-femmes-parole-dune-croyante",
                "Dépression : les femmes sont les plus touchées" => "https://www.tf1info.fr/sante/video-depression-les-femmes-sont-les-plus-touchees-selon-une-etude-2101715.html",
                "Santé mentale et féminisme | Contre Soirée avec Louisadonna" => "https://www.youtube.com/watch?v=htgDaCqBuOA",
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
                "Inventer une thérapie féministe | Un podcast à soi (52) - ARTE Radio Podcast" => "https://www.youtube.com/watch?v=_DC6fuWt6Uc",
                "Apprendre à prendre soin de soi : Féminisme et santé mentale avec Lauren Bastide" => "https://www.youtube.com/watch?v=oocjR0i91hg",
                "Au procès des folles | Un podcast à soi (51) - ARTE Radio Podcast" => "https://www.youtube.com/watch?app=desktop&v=BmLa5NhvS7M",
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
                "Psychology of men and women" => "https://play.google.com/store/apps/details?id=app.psycho.newworld&hl=fr",
                "Feminine health" => "https://play.google.com/store/apps/details?id=com.eurofarmacontigo&hl=fr",
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
                "Jeu : 2 Minutes Les Filles" => "https://www.amazon.fr/Complicit%C3%A9-Questions-discuter-Psychologie-Positive/dp/B07Q3XXNMC",
                "Livre : Épistémologies féministes et psychologie de Fonte David, Lelaurain Solveig" => "https://www.editions-hermann.fr/livre/epistemologies-feministes-et-psychologie-fonte-david",
                "Livre : La Psychologie de la femme de Karen Horney" => "https://www.payot-rivages.fr/payot/livre/la-psychologie-de-la-femme-9782228917711",
                "Livre : Le syndrome d'imposture de Elisabeth Cadoche et Anne De Montarlot" => "https://booknode.com/le_syndrome_dimposture_03408844 ",
                "Livre : Le regret d'être mère de Orna Donath" => "https://booknode.com/le_regret_detre_mere_03301063",
                "Livre : Révolution intérieure de Gloria Steinem" => "https://booknode.com/revolution_interieure_03504980",
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

    // Si barre de recherche vide
    if (query === '') {
        links.forEach(link => link.parentElement.style.display = "list-item");
    }
});
</script>
</body>
</html>
