<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki des Lois - EmpowHer</title>
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
        .header-title {
            display: flex;
            justify-content: space-between; 
            align-items: center;
            padding: 20px 0;
            width: 100%; 
        }
        .header-title h2 {
            font-weight: bold;
            margin: 0; 
            text-align: center; 
            flex-grow: 1; 
        }
        .search-container {
            margin-right: 20px; 
        }
        .search-container input {
            width: 200px; 
            padding: 5px;
        }
        .container {
            display: flex;
            flex-grow: 1;
            width: 100%;
            margin-top: 0; 
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
            margin-bottom: 10px; 
            text-align: center;
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
        .content {
            flex-grow: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .law-table {
            width: 80%; 
            margin: 20px 0;
            border-collapse: collapse;
        }
        .law-table th, .law-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        .law-table th {
            background-color: #fae4fc;
        }
        .law-table tr:hover {
            background-color: #f0d8fa;
            cursor: pointer;
        }
        .add-law {
            width: 100%; 
            text-align: center;
            margin: 20px 0;
        }
        .add-law input {
            padding: 5px;
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
            <li><a href="lois.php?categorie=Droits civils et politiques">Droits civils et politiques</a></li>
            <li><a href="lois.php?categorie=Santé et droits reproductifs">Santé et droits reproductifs</a></li>
            <li><a href="lois.php?categorie=Travail et égalité salariale">Travail et égalité salariale</a></li>
            <li><a href="lois.php?categorie=Éducation">Éducation</a></li>
            <li><a href="lois.php?categorie=Violences sexistes et sexuelles">Violences sexistes et sexuelles</a></li>
            <li><a href="lois.php?categorie=Mariage, famille et parentalité">Mariage, famille et parentalité</a></li>
            <li><a href="lois.php?categorie=Représentation politique et leadership">Représentation politique et leadership</a></li>
            <li><a href="lois.php?categorie=Identité de genre et LGBTQIA">Identité de genre et LGBTQIA+</a></li>
            <li><a href="lois.php?categorie=Libertés numériques et cyberviolences">Libertés numériques et cyberviolences</a></li>
            <li><a href="lois.php?categorie=Droits des femmes dans le sport et la culture">Droits des femmes dans le sport et la culture</a></li>
        </ul>
    </aside>

    <main class="content">
        <div class="header-title">
            <h2>Wiki des lois</h2>
            <div class="search-container">
                <form method="get" action="lois.php" class="search-container">
                    <input type="text" name="recherche" placeholder="Barre de recherche" value="<?php echo isset($_GET['recherche']) ? htmlspecialchars($_GET['recherche']) : ''; ?>">
                </form>
            </div>
        </div>

        <?php
        $lois = [
            ["titre" => "Declaration of Sentiments", "pays" => "États-Unis", "date" => "1848", "categorie" => "Droits civils et politiques"],
            ["titre" => "Droit de vote des femmes – Nouvelle-Zélande", "pays" => "Nouvelle-Zélande", "date" => "1893", "categorie" => "Droits civils et politiques"],
            ["titre" => "Loi sur le droit de vote des femmes", "pays" => "Royaume-Uni", "date" => "1918", "categorie" => "Droits civils et politiques"],
            ["titre" => "19e amendement de la Constitution (droit de vote des femmes)", "pays" => "États-Unis", "date" => "1920", "categorie" => "Droits civils et politiques"],
            ["titre" => "Droit de vote des femmes", "pays" => "France", "date" => "1944", "categorie" => "Droits civils et politiques"],
            ["titre" => "Loi fondamentale de la République Fédérale d’Allemagne (égalité hommes/femmes devant la loi)", "pays" => "Allemagne", "date" => "1949", "categorie" => "Droits civils et politiques"],
            ["titre" => "Constitution indienne (interdiction de la discrimination basée sur le sexe)", "pays" => "Inde", "date" => "1950", "categorie" => "Droits civils et politiques"],
            ["titre" => "Droit de vote pour les femmes autochtones", "pays" => "Canada", "date" => "1960", "categorie" => "Droits civils et politiques"],
            ["titre" => "Loi sur l’égalité politique entre hommes et femmes", "pays" => "Espagne", "date" => "1976", "categorie" => "Droits civils et politiques"],
            ["titre" => "Convention sur l’élimination de toutes les formes de discrimination à l’égard des femmes (CEDAW)", "pays" => "ONU", "date" => "1979", "categorie" => "Droits civils et politiques"],
            ["titre" => "Droit de vote des femmes - Koweït", "pays" => "Koweït", "date" => "2005", "categorie" => "Droits civils et politiques"],
            ["titre" => "Loi sur la parité politique (représentation des femmes en politique)", "pays" => "Argentine", "date" => "2019", "categorie" => "Droits civils et politiques"],
            ["titre" => "Réforme du code électoral – quotas de genre", "pays" => "Tunisie", "date" => "2011", "categorie" => "Droits civils et politiques"],
            ["titre" => "Constitution sud-africaine (égalité des sexes garantie)", "pays" => "Afrique du Sud", "date" => "1996", "categorie" => "Droits civils et politiques"],
            ["titre" => "Droit de conduire pour les femmes", "pays" => "Arabie Saoudite", "date" => "2018", "categorie" => "Droits civils et politiques"],
            ["titre" => "Legalisation de la contraception", "pays" => "Royaume-Uni", "date" => "1967", "categorie" => "Santé et droits reproductifs"],
            ["titre" => "Griswold v. Connecticut – droit à la contraception pour les couples mariés", "pays" => "États-Unis", "date" => "1965", "categorie" => "Santé et droits reproductifs"],
            ["titre" => "Loi Neuwirth – autorisation de la contraception", "pays" => "France", "date" => "1967", "categorie" => "Santé et droits reproductifs"],
            ["titre" => "Legalisation de l’avortement – arrêt Roe v. Wade", "pays" => "États-Unis", "date" => "1973", "categorie" => "Santé et droits reproductifs"],
            ["titre" => "Loi sur l’interruption volontaire de grossesse (IVG)", "pays" => "France", "date" => "1975", "categorie" => "Santé et droits reproductifs"],
            ["titre" => "Dépénalisation de l’avortement", "pays" => "Australie – État de Victoria", "date" => "1983", "categorie" => "Santé et droits reproductifs"],
            ["titre" => "Loi sur la santé sexuelle et reproductive", "pays" => "Espagne", "date" => "2002", "categorie" => "Santé et droits reproductifs"],
            ["titre" => "Loi sur les droits sexuels et reproductifs", "pays" => "Mexique – État de Mexico", "date" => "2010", "categorie" => "Santé et droits reproductifs"],
            ["titre" => "Legalisation de l’avortement", "pays" => "Irlande", "date" => "2018", "categorie" => "Santé et droits reproductifs"],
            ["titre" => "Droit à l’avortement inscrit dans la loi", "pays" => "Argentine", "date" => "2022", "categorie" => "Santé et droits reproductifs"],
            ["titre" => "Loi sur l’accès à la contraception gratuite pour les jeunes femmes", "pays" => "France", "date" => "2023", "categorie" => "Santé et droits reproductifs"],
            ["titre" => "Dépénalisation totale de l’avortement", "pays" => "Colombie", "date" => "2021", "categorie" => "Santé et droits reproductifs"],
            ["titre" => "Reconnaissance du droit à l’IVG dans la Constitution", "pays" => "France", "date" => "2024", "categorie" => "Santé et droits reproductifs"],
            ["titre" => "Interdiction des mutilations génitales féminines (MGF)", "pays" => "Kenya", "date" => "2003", "categorie" => "Santé et droits reproductifs"],
            ["titre" => "Accès légal à l’avortement – Loi Veil élargie", "pays" => "France", "date" => "2001", "categorie" => "Santé et droits reproductifs"],
            ["titre" => "Loi sur l’égalité de rémunération (Equal Pay Act)", "pays" => "États-Unis", "date" => "1963", "categorie" => "Travail et égalité salariale"],
            ["titre" => "Loi sur l’égalité professionnelle entre les femmes et les hommes", "pays" => "France", "date" => "1972", "categorie" => "Travail et égalité salariale"],
            ["titre" => "Loi fédérale sur l’égalité entre femmes et hommes", "pays" => "Suisse", "date" => "1995", "categorie" => "Travail et égalité salariale"],
            ["titre" => "Directive européenne sur l’égalité de rémunération", "pays" => "Union européenne", "date" => "1975", "categorie" => "Travail et égalité salariale"],
            ["titre" => "Loi sur la promotion de l’égalité au travail", "pays" => "Japon", "date" => "1985", "categorie" => "Travail et égalité salariale"],
            ["titre" => "Loi sur l’égalité de traitement entre hommes et femmes au travail", "pays" => "Royaume-Uni", "date" => "1975", "categorie" => "Travail et égalité salariale"],
            ["titre" => "Loi sur l'égalité des sexes", "pays" => "Norvège", "date" => "2013", "categorie" => "Travail et égalité salariale"],
            ["titre" => "Loi sur la transparence salariale", "pays" => "Islande", "date" => "2017", "categorie" => "Travail et égalité salariale"],
            ["titre" => "Loi sur l’égalité de rémunération entre les sexes", "pays" => "Australie", "date" => "1972", "categorie" => "Travail et égalité salariale"],
            ["titre" => "Loi sur l'équité salariale", "pays" => "Canada – Québec", "date" => "1996", "categorie" => "Travail et égalité salariale"],
            ["titre" => "Loi sur le congé parental égalitaire", "pays" => "Espagne", "date" => "2019", "categorie" => "Travail et égalité salariale"],
            ["titre" => "Loi contre le harcèlement sexuel au travail", "pays" => "Inde", "date" => "2006", "categorie" => "Travail et égalité salariale"],
            ["titre" => "Loi sur les quotas de genre dans le secteur public", "pays" => "Afrique du Sud", "date" => "2006", "categorie" => "Travail et égalité salariale"],
            ["titre" => "Loi sur la lutte contre les discriminations salariales", "pays" => "Allemagne", "date" => "2022", "categorie" => "Travail et égalité salariale"],
            ["titre" => "Loi Ferry – école gratuite, laïque et obligatoire pour tous les enfants", "pays" => "France", "date" => "1882", "categorie" => "Éducation"],
            ["titre" => "19e amendement à la Constitution mexicaine – égalité d’accès à l’éducation", "pays" => "Mexique", "date" => "1917", "categorie" => "Éducation"],
            ["titre" => "Brown v. Board of Education – fin de la ségrégation raciale dans les écoles", "pays" => "États-Unis", "date" => "1954", "categorie" => "Éducation"],
            ["titre" => "Loi sur l'éducation des filles (Girl’s Education Act)", "pays" => "Nigeria", "date" => "1960", "categorie" => "Éducation"],
            ["titre" => "Loi sur l'éducation gratuite et obligatoire", "pays" => "Inde", "date" => "1976", "categorie" => "Éducation"],
            ["titre" => "Loi sur l’égalité d’accès à l’éducation (Title IX)", "pays" => "États-Unis", "date" => "1972", "categorie" => "Éducation"],
            ["titre" => "Loi sur l'accès universel à l’éducation primaire", "pays" => "Afrique du Sud", "date" => "1994", "categorie" => "Éducation"],
            ["titre" => "Loi pour l'accès égalitaire à l’éducation des filles", "pays" => "Pakistan", "date" => "2003", "categorie" => "Éducation"],
            ["titre" => "Loi sur l'éducation inclusive pour les filles handicapées", "pays" => "Rwanda", "date" => "2010", "categorie" => "Éducation"],
            ["titre" => "Loi sur la scolarisation obligatoire des filles", "pays" => "Maroc", "date" => "2006", "categorie" => "Éducation"],
            ["titre" => "Loi organique n° 2002-80 sur l'égalité entre les sexes et la lutte contre la discrimination", "pays" => "Tunisie", "date" => "2002", "categorie" => "Éducation"],
            ["titre" => "Objectif d’éducation universelle – Programme Éducation pour Tous (UNESCO)", "pays" => "international", "date" => "1990", "categorie" => "Éducation"],
            ["titre" => "Loi sur la gratuité de l’enseignement secondaire pour les filles", "pays" => "Sierra Leone", "date" => "2015", "categorie" => "Éducation"],
            ["titre" => "Loi sur la répression du viol", "pays" => "France", "date" => "1980", "categorie" => "Violences sexistes et sexuelles"],
            ["titre" => "Criminalisation du viol conjugal", "pays" => "Canada", "date" => "1993", "categorie" => "Violences sexistes et sexuelles"],
            ["titre" => "Loi contre la violence domestique (Violence Against Women Act)", "pays" => "États-Unis", "date" => "1994", "categorie" => "Violences sexistes et sexuelles"],
            ["titre" => "Loi de lutte contre les violences conjugales - Espagne", "pays" => "Espagne", "date" => "2005", "categorie" => "Violences sexistes et sexuelles"],
            ["titre" => "Criminalisation des mutilations génitales féminines (MGF)", "pays" => "Kenya", "date" => "2003", "categorie" => "Violences sexistes et sexuelles"],
            ["titre" => "Loi sur les féminicides – reconnaissance légale du terme", "pays" => "Mexique", "date" => "2012", "categorie" => "Violences sexistes et sexuelles"],
            ["titre" => "Loi n° 103-13 sur la lutte contre les violences faites aux femmes", "pays" => "Maroc", "date" => "2018", "categorie" => "Violences sexistes et sexuelles"],
            ["titre" => "Loi sur la protection contre les violences sexuelles et domestiques", "pays" => "Inde", "date" => "2010", "categorie" => "Violences sexistes et sexuelles"],
            ["titre" => "Loi de pénalisation du harcèlement de rue", "pays" => "France", "date" => "2018", "categorie" => "Violences sexistes et sexuelles"],
            ["titre" => "Loi contre les violences sexuelles dans les conflits armés – résolution 1820", "pays" => "ONU", "date" => "2008", "categorie" => "Violences sexistes et sexuelles"],
            ["titre" => "Loi sur la reconnaissance du viol comme crime de guerre (Statut de Rome, CPI)", "pays" => "international", "date" => "1998", "categorie" => "Violences sexistes et sexuelles"],
            ["titre" => "Loi sur la définition du viol basée sur le consentement", "pays" => "Suède", "date" => "2022", "categorie" => "Violences sexistes et sexuelles"],
            ["titre" => "Abolition de l’autorité maritale – femmes égales dans le couple", "pays" => "France", "date" => "1938", "categorie" => "Mariage, famille et parentalité"],
            ["titre" => "Loi sur le mariage civil obligatoire", "pays" => "Italie", "date" => "1969", "categorie" => "Mariage, famille et parentalité"],
            ["titre" => "Loi autorisant le divorce par consentement mutuel", "pays" => "France", "date" => "1975", "categorie" => "Mariage, famille et parentalité"],
            ["titre" => "Loi sur l’abaissement de la majorité matrimoniale des femmes à 18 ans", "pays" => "France", "date" => "1974", "categorie" => "Mariage, famille et parentalité"],
            ["titre" => "Loi sur l’égalité des époux dans le mariage", "pays" => "Allemagne", "date" => "1981", "categorie" => "Mariage, famille et parentalité"],
            ["titre" => "Loi sur la reconnaissance du viol conjugal", "pays" => "Afrique du Sud", "date" => "1993", "categorie" => "Mariage, famille et parentalité"],
            ["titre" => "Legalisation du mariage homosexuel", "pays" => "Pays-Bas", "date" => "2001", "categorie" => "Mariage, famille et parentalité"],
            ["titre" => "Loi sur la garde partagée équitable après divorce", "pays" => "Canada", "date" => "2006", "categorie" => "Mariage, famille et parentalité"],
            ["titre" => "Loi sur l’interdiction du mariage des enfants", "pays" => "Éthiopie", "date" => "2006", "categorie" => "Mariage, famille et parentalité"],
            ["titre" => "Loi Taubira – mariage pour tous", "pays" => "France", "date" => "2013", "categorie" => "Mariage, famille et parentalité"],
            ["titre" => "Loi sur le congé parental partagé", "pays" => "Suède", "date" => "2010", "categorie" => "Mariage, famille et parentalité"],
            ["titre" => "Loi sur la reconnaissance de la parentalité pour les couples de même sexe", "pays" => "Irlande", "date" => "2015", "categorie" => "Mariage, famille et parentalité"],
            ["titre" => "Loi interdisant la polygamie", "pays" => "Tunisie", "date" => "1965", "categorie" => "Mariage, famille et parentalité"],
            ["titre" => "Loi sur la PMA pour toutes les femmes", "pays" => "France", "date" => "2021", "categorie" => "Mariage, famille et parentalité"],
            ["titre" => "Loi sur l’interdiction du mariage forcé", "pays" => "Royaume-Uni", "date" => "2014", "categorie" => "Mariage, famille et parentalité"],
            ["titre" => "Droit d’éligibilité des femmes au Parlement", "pays" => "Royaume-Uni", "date" => "1918", "categorie" => "Représentation politique et leadership"],
            ["titre" => "Premier vote et éligibilité des femmes à l’échelle fédérale", "pays" => "Canada", "date" => "1919", "categorie" => "Représentation politique et leadership"],
            ["titre" => "Loi sur l’éligibilité des femmes aux fonctions politiques", "pays" => "France", "date" => "1945", "categorie" => "Représentation politique et leadership"],
            ["titre" => "Constitution de l’Inde – garantie de représentation des femmes dans les Panchayats (conseils locaux)", "pays" => "Inde", "date" => "1950", "categorie" => "Représentation politique et leadership"],
            ["titre" => "Loi de quota de 30 % de femmes au Parlement", "pays" => "Afrique du Sud", "date" => "1997", "categorie" => "Représentation politique et leadership"],
            ["titre" => "Loi sur la parité hommes-femmes en politique", "pays" => "France", "date" => "2000", "categorie" => "Représentation politique et leadership"],
            ["titre" => "Loi sur la représentation politique équitable", "pays" => "Rwanda", "date" => "2006", "categorie" => "Représentation politique et leadership"],
            ["titre" => "Loi sur les quotas de genre pour les partis politiques", "pays" => "Bolivie", "date" => "2009", "categorie" => "Représentation politique et leadership"],
            ["titre" => "Réforme constitutionnelle – parité obligatoire sur les listes électorales", "pays" => "Tunisie", "date" => "2011", "categorie" => "Représentation politique et leadership"],
            ["titre" => "Loi de quota 50 % femmes dans les fonctions électives", "pays" => "Mexique", "date" => "2019", "categorie" => "Représentation politique et leadership"],
            ["titre" => "Loi sur les quotas de genre pour les partis politiques", "pays" => "Bolivie", "date" => "2009", "categorie" => "Représentation politique et leadership"],
            ["titre" => "Directive sur l'équilibre femmes-hommes dans les conseils d'administration", "pays" => "Union européenne", "date" => "2022", "categorie" => "Représentation politique et leadership"],
            ["titre" => "Loi organique n° 59.11 relative à l'élection des membres des conseils des collectivités territoriales", "pays" => "Maroc", "date" => "2011", "categorie" => "Représentation politique et leadership"],
            ["titre" => "Loi sur la parité dans les collectivités locales", "pays" => "Sénégal", "date" => "2013", "categorie" => "Représentation politique et leadership"],
            ["titre" => "Loi imposant un quota de 40 % de femmes sur les listes électorales locales", "pays" => "Espagne", "date" => "2007", "categorie" => "Représentation politique et leadership"],
            ["titre" => "Loi sur la dépénalisation de l’homosexualité", "pays" => "France", "date" => "1791", "categorie" => "Identité de genre et LGBTQIA"],
            ["titre" => "Loi sur le mariage homosexuel", "pays" => "Pays-Bas", "date" => "2001", "categorie" => "Identité de genre et LGBTQIA"],
            ["titre" => "Loi sur l'égalité des droits des personnes LGBT et la non-discrimination fondée sur l'orientation sexuelle et l'identité de genre (Equality Act)", "pays" => "États-Unis", "date" => "2021", "categorie" => "Identité de genre et LGBTQIA"],
            ["titre" => "Loi sur la reconnaissance du changement de sexe", "pays" => "Suède", "date" => "2022", "categorie" => "Identité de genre et LGBTQIA"],
            ["titre" => "Loi sur l’adoption par des couples de même sexe", "pays" => "Espagne", "date" => "2005", "categorie" => "Identité de genre et LGBTQIA"],
            ["titre" => "Loi sur la non-discrimination des personnes LGBT", "pays" => "Argentine", "date" => "2011", "categorie" => "Identité de genre et LGBTQIA"],
            ["titre" => "Loi sur la protection des droits des personnes transgenres", "pays" => "Argentine", "date" => "2012", "categorie" => "Identité de genre et LGBTQIA"],
            ["titre" => "Loi pour la reconnaissance des couples de même sexe (PACS)", "pays" => "France", "date" => "1999", "categorie" => "Identité de genre et LGBTQIA"],
            ["titre" => "Loi de dépénalisation de l’homosexualité", "pays" => "Inde", "date" => "2018", "categorie" => "Identité de genre et LGBTQIA"],
            ["titre" => "Loi sur l’égalité des droits pour les personnes transgenres", "pays" => "Irlande", "date" => "2014", "categorie" => "Identité de genre et LGBTQIA"],
            ["titre" => "Loi sur l’égalité des droits pour les personnes intersexes", "pays" => "Malta", "date" => "2019", "categorie" => "Identité de genre et LGBTQIA"],
            ["titre" => "Loi sur la reconnaissance juridique des couples de même sexe", "pays" => "Taiwan", "date" => "2019", "categorie" => "Identité de genre et LGBTQIA"],
            ["titre" => "Loi sur la protection des droits des personnes LGBT et intersexes", "pays" => "Australie", "date" => "2018", "categorie" => "Identité de genre et LGBTQIA"],
            ["titre" => "Loi sur l’accès des personnes transgenres à la santé reproductive (Affordable Care Act)", "pays" => "États-Unis", "date" => "2010", "categorie" => "Identité de genre et LGBTQIA"],
            ["titre" => "Loi contre le harcèlement en ligne", "pays" => "États-Unis", "date" => "2013", "categorie" => "Libertés numériques et cyberviolences"],
            ["titre" => "Loi sur la protection contre les violences sexuelles en ligne", "pays" => "Royaume-Uni", "date" => "2016", "categorie" => "Libertés numériques et cyberviolences"],
            ["titre" => "Loi contre la diffusion non consensuelle de contenus intimes (California Cyber Exploitation Law)", "pays" => "États-Unis", "date" => "2013", "categorie" => "Libertés numériques et cyberviolences"],
            ["titre" => "Loi sur la lutte contre le cyberharcèlement", "pays" => "Espagne", "date" => "2015", "categorie" => "Libertés numériques et cyberviolences"],
            ["titre" => "Loi sur la protection des victimes de cyberviolence (violences psychologiques et sexuelles)", "pays" => "Argentine", "date" => "2019", "categorie" => "Libertés numériques et cyberviolences"],
            ["titre" => "Loi contre la diffusion de contenu sexuellement explicite sans consentement (loi sur la \"revenge porn\")", "pays" => "France", "date" => "2020", "categorie" => "Libertés numériques et cyberviolences"],
            ["titre" => "Loi sur la violation de la vie privée (Section 66E du Information Technology Act)", "pays" => "Inde", "date" => "2016", "categorie" => "Libertés numériques et cyberviolences"],
            ["titre" => "Loi contre le cyberharcèlement sexuel", "pays" => "Mexique", "date" => "2015", "categorie" => "Libertés numériques et cyberviolences"],
            ["titre" => "Loi pour la prévention des violences sexistes numériques", "pays" => "Colombie", "date" => "2020", "categorie" => "Libertés numériques et cyberviolences"],
            ["titre" => "Loi sur la confidentialité des données personnelles et la protection des femmes en ligne (RGPD)", "pays" => "Union européenne", "date" => "2018", "categorie" => "Libertés numériques et cyberviolences"],
            ["titre" => "Loi sur la protection des victimes de harcèlement en ligne", "pays" => "Australie", "date" => "2016", "categorie" => "Libertés numériques et cyberviolences"],
            ["titre" => "Loi sur l'interdiction de la cyberviolence basée sur le genre", "pays" => "Canada", "date" => "2019", "categorie" => "Libertés numériques et cyberviolences"],
            ["titre" => "Loi n° 2016-1321 du 7 octobre 2016 sur la lutte contre la diffusion de contenus intimes sans consentement", "pays" => "France", "date" => "2016", "categorie" => "Libertés numériques et cyberviolences"],
            ["titre" => "Loi sur l’accès à la justice numérique pour les victimes de violence domestique et sexuelle en ligne", "pays" => "Italie", "date" => "2019", "categorie" => "Libertés numériques et cyberviolences"],
            ["titre" => "Loi n° 2018-5 du 9 mai 2018 contre les violences numériques", "pays" => "Tunisie", "date" => "2018", "categorie" => "Libertés numériques et cyberviolences"],
            ["titre" => "Loi sur l’égalité d’accès des femmes au sport (Title IX)", "pays" => "États-Unis", "date" => "1972", "categorie" => "Droits des femmes dans le sport et la culture"],
            ["titre" => "Loi sur l’interdiction de la discrimination basée sur le genre dans les sports scolaires (Title IX)", "pays" => "États-Unis", "date" => "1975", "categorie" => "Droits des femmes dans le sport et la culture"],
            ["titre" => "Loi sur la promotion des femmes dans les métiers du cinéma et de la culture", "pays" => "France", "date" => "2009", "categorie" => "Droits des femmes dans le sport et la culture"],
            ["titre" => "Loi sur la protection des athlètes féminines contre le harcèlement et les abus dans le sport", "pays" => "Royaume-Uni", "date" => "2019", "categorie" => "Droits des femmes dans le sport et la culture"],
            ["titre" => "Loi sur l’égalité d’accès des femmes aux événements sportifs", "pays" => "Arabie Saoudite", "date" => "2018", "categorie" => "Droits des femmes dans le sport et la culture"],
            ["titre" => "Loi sur l’égalité salariale dans les compétitions sportives féminines", "pays" => "France", "date" => "2021", "categorie" => "Droits des femmes dans le sport et la culture"],
            ["titre" => "Loi sur la parité dans les instances dirigeantes des fédérations sportives (Loi Sport et Société)", "pays" => "France", "date" => "2022", "categorie" => "Droits des femmes dans le sport et la culture"],
            ["titre" => "Loi sur l’obligation de parité dans les institutions culturelles publiques (loi relative à l’égalité réelle)", "pays" => "France", "date" => "2014", "categorie" => "Droits des femmes dans le sport et la culture"],
            ["titre" => "Loi sur la transparence et l’égalité salariale dans le secteur artistique et culturel", "pays" => "Islande", "date" => "2016", "categorie" => "Droits des femmes dans le sport et la culture"],
            ["titre" => "Loi sur la représentation équilibrée des genres dans les conseils d’administration des institutions culturelles", "pays" => "Norvège", "date" => "2011", "categorie" => "Droits des femmes dans le sport et la culture"]
        ];

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=empowerher_db;charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->query("SELECT titre, pays, date_loi AS date FROM lois ORDER BY date_loi ASC");
            $lois_bdd = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            foreach ($lois_bdd as $loi) {
                // éviter les doublons si une loi de la BDD a déjà été saisie à la main
                $existe = false;
                foreach ($lois as $l) {
                    if ($l['titre'] === $loi['titre'] && $l['pays'] === $loi['pays'] && $l['date'] === $loi['date']) {
                        $existe = true;
                        break;
                    }
                }
                if (!$existe) {
                    $lois[] = $loi;
                }
            }
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
        
        usort($lois, function($a, $b) {
            return intval($a['date']) - intval($b['date']); // tri chronologique
        });

        $categorieFiltre = isset($_GET['categorie']) ? $_GET['categorie'] : null;

        if ($categorieFiltre) {
            $lois = array_filter($lois, function($loi) use ($categorieFiltre) {
                return $loi['categorie'] === $categorieFiltre;
            });
        }
        
        $rechercheTexte = isset($_GET['recherche']) ? mb_strtolower(trim($_GET['recherche'])) : null;

        if ($rechercheTexte) {
            $lois = array_filter($lois, function($loi) use ($rechercheTexte) {
                return mb_stripos($loi['titre'], $rechercheTexte) !== false
                    || mb_stripos($loi['pays'], $rechercheTexte) !== false
                    || mb_stripos($loi['date'], $rechercheTexte) !== false;
            });
        }

        // pagination
        $loisParPage = 12;
        $pageActuelle = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
        $debut = ($pageActuelle - 1) * $loisParPage;
        $totalLois = count($lois);
        $pagesTotales = ceil($totalLois / $loisParPage);
        $loisAffichees = array_slice($lois, $debut, $loisParPage);

        echo "<table class='law-table'>";
        echo "<thead><tr><th>Pays</th><th>Lois</th><th>Date</th></tr></thead><tbody>";
        foreach ($loisAffichees as $loi) {
            $url = 'loi.php?titre=' . urlencode($loi['titre'] ?? '') . '&pays=' . urlencode($loi['pays'] ?? '') . '&date=' . urlencode($loi['date'] ?? '');
            echo "<tr onclick=\"window.location='$url'\">";
            echo "<td>{$loi['pays']}</td><td>{$loi['titre']}</td><td>{$loi['date']}</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
        echo "<div style='margin-top: 20px; text-align: center;'>";
        for ($i = 1; $i <= $pagesTotales; $i++) {
            if ($i == $pageActuelle) {
                echo "<strong>$i</strong> ";
            } else {
                $params = ['page' => $i];
                if ($categorieFiltre) $params['categorie'] = $categorieFiltre;
                if ($rechercheTexte) $params['recherche'] = $rechercheTexte;
                $link = 'lois.php?' . http_build_query($params);                
                echo "<a href='$link' style='margin: 0 5px;'>$i</a> ";
            }
        }
        echo "</div>";

        ?>

        <div class="add-law">
            <form method="POST" id="formProposeLaw">
                <input type="text" id="proposeLawInput" name="contenu" placeholder="Proposer une nouvelle loi" required>
            </form>
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
const proposeLawInput = document.getElementById('proposeLawInput');

proposeLawInput.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        e.preventDefault(); // bloquer
        const value = this.value.trim();
        if (value.length > 0) {
            fetch('proposer.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'type=loi&contenu=' + encodeURIComponent(value)
            })
            .then(response => response.text())
            .then(data => {
                alert(data); // Proposition envoyée avec succès !
                this.value = '';
            })
            .catch(error => {
                alert('Erreur lors de l\'envoi');
                console.error(error);
            });
        }
    }
});
</script>


</body>
</html>
