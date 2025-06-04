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
    <h2>Articles</h2>
    <input type="text" placeholder="Barre de recherche"> 
</div>
<div style="padding: 10px 20px;">
    <a href="ressources.php" style="text-decoration: none; font-weight: bold; color: #000;">← Retour à toutes les ressources</a>
</div>

<div class="main-content">
    <?php
    $articles = [
        "Jeu : Mendeleieva" => "https://www.femmesetsciences.fr/mendeleieva-en-ligne",
        "Jeu de cartes : Femmes scientifiques et techniciennes à travers les époques" => "https://www.cite-sciences.fr/fr/au-programme/lieux-ressources/carrefour-numerique2/ressources-en-ligne/jeu-femmes-scientifiques",
        "Film : Les figures de l’ombre" => "https://fr.wikipedia.org/wiki/Les_Figures_de_l%27ombre",
        "Formation : Femme médecine" => "https://www.enterredefemmes.com/femme-medecine-formation",
        "Livre : Les soeurs d’Hippocrate de Jean-Noël Fabiani-Salmon et Laetitia Coryn" => "https://arenes.fr/livre/les-soeurs-dhippocrate/",
        "Site de formations : hkind" => "https://catalogue-hkind.femmesdesante.fr/",
        "Film : François Dolto, le désir de vivre" => "https://fr.wikipedia.org/wiki/Fran%C3%A7oise_Dolto,_le_d%C3%A9sir_de_vivre",
        "Livre : Une histoire des femmes en Europe (des grottes aux Lumières) de Sophie Lalanne (dir.), Didier Lett, Dominique Picco" => "https://www.anhima.fr/publications/une-histoire-des-femmes-en-europe-des-grottes-aux-lumieres",
        "Extrait d'un livre : Les Femmes à travers l’Histoire de Isabelle Grégor et André Larané" => "https://www.herodote.net/Textes/Femmes_extraits.pdf",
        "Jeu  ''Qui est-ce ?'' : Who's she ?" => "https://www.comprendrepouragir.org/produit/whos-she/",
        "Jeu Time's up : Bad Bitches Only" => "https://www.comprendrepouragir.org/produit/jeu-de-cartes-feministe-bad-bitches-only/",
        "Film : Les Suffragettes" => "https://fr.wikipedia.org/wiki/Les_Suffragettes",
        "Film : Les Femmes de l'ombre" => "https://fr.wikipedia.org/wiki/Les_Femmes_de_l%27ombre",
        "Formation égalité hommes femmes au travail" => "https://goalmap.com/fr/formation-egalite-homme-femme-au-travail",
        "Livre : Le manuel de formation d’ONU Femmes sur et genre et l’économie" => "https://www.unwomen.org/fr/digital-library/publications/2017/10/the-un-women-gender-and-economics-training-manual",
        "Travail et emploi des femmes de Margaret Maruani" => "https://www.editionsladecouverte.fr/travail_et_emploi_des_femmes-9782707194022",
        "Aides pour les photographes" => "https://ellesfontla.culture.gouv.fr/aides",
        "Exposition de Pharrell Williams" => "https://www.sortiraparis.com/arts-culture/exposition/articles/324469-femmes-l-exposition-collective-et-gratuite-de-pharrell-williams-a-la-galerie-perrotin#:~:text=Avis%20aux%20accros%20de%20l,40%20artistes%20aux%20univers%20vari%C3%A9s.",
        "Musée : Le Paris des femmes" => "https://www.carnavalet.paris.fr/visiter/offre-culturelle/le-paris-des-femmes",
        "Musées: 11 femmes pour 11 institutions" => "https://www.parismusees.paris.fr/fr/actualite/11-femmes-pour-11-institutions",
        "Livre : Être écoféministe de Jeanne Burgart Goutal" => "https://www.babelio.com/livres/Burgart-Goutal-tre-ecofeministe/1220109",
        "Livre : L'écoféminisme dans la géopolitique: Femmes et développement durable de Rokhaya Samb" => "https://www.babelio.com/livres/Samb-Lecofeminisme-dans-la-geopolitique-Femmes-et-dev/1217903",
        "Livre : Soeurs en écologie : Des femmes, de la nature et du réenchantement du monde de Pascale d'Erm" => "https://www.babelio.com/livres/Erm-Soeurs-en-ecologie--Des-femmes-de-la-nature-et-du/1203377",
        "Jeu de cartes : Héros et héroïnes de l’écologie" => "https://www.editionslibre.org/wp-content/uploads/2022/12/Heros-de-lecologie-volume-carre-1.png",
        "Film : Woman at war" => "https://1001heroines.fr/heroines/women-at-war/",
        "Association : Elues locales" => "https://www.elueslocales.fr/soutenir-et-valoriser-les-femmes-en-politique/",
        "Film : The Lady" => "https://fr.wikipedia.org/wiki/The_Lady_(film)",
        "Série : Borgen, une femme au pouvoir" => "https://fr.wikipedia.org/wiki/Borgen,_une_femme_au_pouvoir",
        "Livre : Femmes en politique : premier bilan de Christine Kelly" => "https://www.lisez.com/livres/femmes-en-politique-premier-bilan-trente-portraits-de-femmes-qui-ont-accede-aux",
        "Jeu : 2 Minutes Les Filles" => "https://www.amazon.fr/Complicit%C3%A9-Questions-discuter-Psychologie-Positive/dp/B07Q3XXNMC",
        "Livre : Épistémologies féministes et psychologie de Fonte David, Lelaurain Solveig" => "https://www.editions-hermann.fr/livre/epistemologies-feministes-et-psychologie-fonte-david",
        "Livre : La Psychologie de la femme de Karen Horney" => "https://www.payot-rivages.fr/payot/livre/la-psychologie-de-la-femme-9782228917711",
        "Livre : Le syndrome d'imposture de Elisabeth Cadoche et Anne De Montarlot" => "https://booknode.com/le_syndrome_dimposture_03408844 ",
        "Livre : Le regret d'être mère de Orna Donath" => "https://booknode.com/le_regret_detre_mere_03301063",
        "Livre : Révolution intérieure de Gloria Steinem" => "https://booknode.com/revolution_interieure_03504980",
        "Programme : NOVA In tech" => "https://numeum.fr/themes/femmes-dans-le-numerique",
        "Livre : Numérique, compter avec les femmes de Anne-Marie Kermarrec" => "https://www.odilejacob.fr/catalogue/sciences-humaines/management-entreprise/numerique-compter-avec-les-femmes_9782738154446.php",
        "Livre : Elles changent le monde de Delphine Remy-Boutang" => "https://www.joinjfd.com/livre-elles-changent-le-monde/",
        "Livre : La Femme digitale de Isabelle Juppé" => "https://www.amazon.fr/Femme-digitale-Isabelle-Jupp%C3%A9/dp/2709630036",
        "Quizz : LE QUIZZ de DesCodeuses" => "https://descodeuses.org/quizz-descodeuses/",
        "Association : Social Builder" => "https://socialbuilder.org/",
        "Programme : Numérique pour elles" => "https://numeriquepourelles.fr/",
        "Programme : JUMP IN TECH" => "https://becomtech.fr/nos-programmes/",
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
        "Livre : Du sexisme dans le sport de Béatrice Barbusse" => "https://anamosa.fr/livre/du-sexisme-dans-le-sport-nouvelle-edition/",
        "Livre : Le Sport Contre Les Femmes de Ronan David" => "https://www.editionsbdl.com/produit/le-sport-contre-les-femmes/",
        "Association : Femix’Sports"  => "https://www.femixsports.fr/"
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