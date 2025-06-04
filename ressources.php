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
    <title>EmpowHer - Page Ressources</title>
    <style>
        body { font-family: 'Times New Roman', serif; margin: 0; padding: 0; background-color: #fbfcfc; display: flex; flex-direction: column; min-height: 100vh; }
        header { display: flex; justify-content: space-between; align-items: center; padding: 20px; background-color: #ca83f7; }
        header h1 { margin: 0; text-align: center; flex-grow: 1; }
        nav { display: flex; flex-direction: column; align-items: flex-end; }
        nav button { margin-bottom: 10px; }
        .banner { width: 100%; height: 200px; background-image: url('banner.png'); background-size: cover; background-position: center; }
        .container { display: flex; flex-grow: 1; width: 100%; }
        .sidebar { width: 210px; padding: 20px; background-color: #fae4fc; border-right: 1px solid #ccc; display: flex; flex-direction: column; align-items: flex-start; }
        .sidebar h2 { text-align: center; margin-bottom: 10px; }
        .sidebar ul { list-style-type: none; padding: 0; margin: 0; width: 100%; }
        .sidebar li { width: 100%; }
        .sidebar li a { display: block; padding: 10px; text-align: left; text-decoration: none; color: inherit; }
        .sidebar li a:hover { background-color: #e0c1f7; }
        .search-container { display: flex; justify-content: space-between; align-items: center; padding: 10px 20px; width: 100%; box-sizing: border-box; }
        .search-container h2 { flex-grow: 1; text-align: center; margin: 0; }
        .search-container input { width: 200px; padding: 5px; margin-left: 20px; }
        .resources-nav { padding: 10px 20px; width: 100%; }
        .resources-nav a { margin-right: 10px; text-decoration: none; color: #000; }
        .resources-list { padding: 20px; width: 100%; }
        .footer { text-align: center; padding: 10px; background-color: #ca83f7; margin-top: auto; }
        .footer-links { display: flex; justify-content: space-between; width: 100%; max-width: 800px; margin: 0 auto; }
        .suggest-resource { padding: 10px; text-align: center; width: 100%; margin-top: 50px; margin-bottom: 20px; }
        .suggest-resource input { width: 100%; padding: 5px; }
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
            <h2>Ressources</h2> 
            <input type="text" id="searchInput" placeholder="Barre de recherche">
        </div>

        <div class="resources-nav">
            <a href="articles.php">•Articles</a>
            <a href="videos.php">•Vidéos</a>
            <a href="podcasts.php">•Podcasts</a>
            <a href="applications.php">•Applications</a>
            <a href="autres.php">•Autres</a>
        </div>

        <div class="resources-list">
        <?php
            $ressources = [
                "Femmes de science",
                "Femmes et sciences : où en est-on ?",
                "Ressenti et discriminations de genre : ce qui freine la féminisation des filières scientifiques",
                "La place des femmes dans la recherche scientifique",
                "Femmes et Ingénieures : elles font la science d’aujourd’hui et de demain !",
                "Femmes et Mathématiques",
                "LES FEMMES DANS L'HISTOIRE DES SCIENCES : L'effet Matilda #CMH9",
                "Science : où sont les femmes ? - Science En Questions ",
                "Portraits de femmes scientifiques",
                "Marie Curie: Une femme pionnière aux deux Prix Nobel",
                "Les droits des femmes et la chimie : une histoire commune",
                "Cecilia Payne - L'astrophysique au début du 20e siècle | Cherchez la femme ! | ARTE",
                "Les filles et les mathématiques",
                "Le plafond de verre des femmes scientifiques",
                "Podcast Sous la blouse, S3 #1 Lucie Leboulleux",
                "Femmes et Sciences - À vous le sup'",
                "For Women in Science Community",
                "Jeu : Mendeleieva",
                "Jeu de cartes : Femmes scientifiques et techniciennes à travers les époques",
                "Film : Les figures de l’ombre",
                "Histoire de la médecine - La place des femmes en médecine",
                "Féminisation de la médecine : des bénéfices pour toute la profession",
                "Histoire de l'entrée des femmes en médecine",
                "Les femmes sont de meilleurs médecins que les hommes… surtout pour les femmes !",
                "Les femmes médecins aujourd'hui : l'avenir de la médecine ?",
                "La place des femmes dans l'histoire de la médecine",
                "Femmes de Santé 2024",
                "Les femmes, victimes de discrimination médicale",
                "LA MÉDECINE EST-ELLE SEXISTE ?",
                "Nathalie Gheeta Babouraj : Devenir sa propre médecine",
                "L'histoire de Caroline, femme, mère, médecin...",
                "PASSAGE DE TÉMOIN x PODEX - De Sage-Femme à Médecin avec Lorène ROCHARD",
                "Femme Clientes",
                "Nabla",
                "Flo",
                "Clue",
                "Keep a Breast",
                "Omena",
                "Formation : Femme médecine",
                "Livre : Les soeurs d’Hippocrate de Jean-Noël Fabiani-Salmon et Laetitia Coryn",
                "Site de formations : hkind",
                "Film : François Dolto, le désir de vivre",
                "L'évolution des droits des femmes : chronologie",
                "Être femme au Moyen-Âge : les chemins discrets de la liberté",
                "Les femmes dans l’histoire mondiale",
                "Il paraît que les femmes ont une histoire (mais pas depuis longtemps)",
                "Les femmes pendant la Révolution française",
                "Des femmes écrivent l’histoire des femmes au milieu du XIXe siècle : représentations, interprétations",
                "Comment les femmes ont-elles été effacées de l'Histoire ? Entretien avec Titiou Lecoq",
                "Toute l'Histoire des femmes en France",
                "“Pourquoi l’Histoire a effacé les femmes ?” | SPEECH de Titiou Lecoq",
                "Les femmes guerrières dans l'histoire : pourquoi elles n'existaient (presque) pas ?",
                "La petite histoire du travail des femmes",
                "Les femmes au XVIIIe siècle (avec Cécile Berly) - Grasse summer podcast festival",
                "Les femmes dans l'Histoire - Simone Veil",
                "Grossesses et avortements sous l’Ancien régime",
                "L'ORIGINE du PATRIARCAT - Ft. Alex Ramirès",
                "Podcast “L’histoire des droits des femmes à travers les époques”",
                "Femmes Qui Ont Changé le Monde",
                "Women on the map : une application qui géolocalise les femmes célèbres",
                "Livre : Une histoire des femmes en Europe (des grottes aux Lumières) de Sophie Lalanne (dir.), Didier Lett, Dominique Picco",
                "Extrait d'un livre : Les Femmes à travers l’Histoire de Isabelle Grégor et André Larané",
                "Jeu  ''Qui est-ce ?'' : Who's she ?",
                "Jeu Time's up : Bad Bitches Only",
                "Film : Les Suffragettes",
                "Film : Les Femmes de l'ombre",
                "Les femmes : une force de travail à maximiser",
                "Les femmes au travail, c’est bon pour la croissance",
                "Pourquoi l’autonomisation économique des femmes profite à l’ensemble des sociétés ?",
                "Travail des femmes : ce qu’on voit… et ce qu’on a ignoré",
                "Près de 2,4 milliards de femmes dans le monde ne possèdent pas les mêmes droits économiques que les hommes",
                "Qu’est-ce qu’une économie féministe?",
                "Inégalités hommes et femmes sur le marché du travail, une vidéo Sciences Echo",
                "Les femmes travaillent gratuitement à partir de ce vendredi : les inégalités salariales pers... ",
                "Une brève histoire de l'arrivée des femmes dans le monde du travail",   
                "Justice Économique - Podcast Ep 9 - Autonomisation Economique des Femmes et travail rémunéré",
                "Justice Économique - Podcast Ep 8 - Résilience économique et sécurité des revenus des femmes",
                "Justice Économique - Podcast Ep 15 - Travail décent et développement économique pour les femmes",
                "#87 Pourquoi les femmes sont majoritairement sous-payées? | Conversation avec Laëtitia Vitaud",
                "Comment les femmes réinventent les codes de la réussite professionnelle ?",
                "Toutes Connectées",
                "Leadership pour elles",
                "Formation égalité hommes femmes au travail",
                "Livre : Le manuel de formation d’ONU Femmes sur et genre et l’économie",
                "Travail et emploi des femmes de Margaret Maruani",
                "Place des femmes dans les médias, la culture, le sport",
                "Culture et médias : les femmes sont plus touchées par la discrimination",
                "Egalité femmes-hommes dans les médias : « pour que les femmes comptent, il faut les compter »",
                "Femmes et medias",
                "La place des femmes dans les médias est en hausse depuis le début de l’année, mais…",
                "Les femmes plus visibles dans la culture mais toujours des inégalités",
                "La représentation des femmes dans les médias",
                "Égalité femmes-hommes : les médias ne montrent toujours pas l’exemple",
                "La représentation des femmes dans les médias - Léa Salamé/Paul Lapierre - La collab' de l'info",
                "Les femmes et la culture : l’art du combat féminin",
                "Violences commises dans le cinéma, la culture, la mode et la publicité : audition de Me Too Médias",
                "TV5MONDE : Les femmes dans les médias",
                "Comment développer la visibilité des femmes dans les médias ? 1/2 [Spécial PODCASTHON]",
                "Comment développer la visibilité des femmes dans les médias ? 2/2 [Spécial PODCASTHON]",
                "Femmes et médias : les rencontres de l’Égalité : En direct",
                "Femme actuelle, le magazine",
                "Journal des Femmes",
                "Aides pour les photographes",
                "Exposition de Pharrell Williams",
                "Musée : Le Paris des femmes",
                "Musées: 11 femmes pour 11 institutions",
                "Droits des femmes : un enjeu environnemental",
                "Les femmes et l’environnement",
                "L'écologie serait-elle une affaire de femmes ?",
                "Quels liens entre les questions de genre et les enjeux climatiques ?",
                "Pourquoi les femmes sont essentielles à l'action climatique",
                "Le rôle crucial des femmes dans la protection de l’environnement en Afrique",
                "Les femmes et le changement climatique",
                "Le féminisme, un outil puissant dans la lutte contre le changement climatique",
                "C’est quoi l’écoféminisme ? ",
                "Les hommes moins écolo que les femmes ? - Y a Pas de Planète B",
                "Le féminisme, un outil puissant dans la lutte contre le changement climatique",
                "[VIRAGO] Écoféminisme : Vertes de rage ? Qui sont vraiment les écoféministes ?",
                "L’écoféminisme pour changer le monde ? Lauren Bastide",
                "Ecoféminisme #1 : Défendre nos territoires | Un podcast à soi (21) - ARTE Radio Podcast",
                "Ecoféminisme #2 : Retrouver la terre | Un podcast à soi (22) - ARTE Radio Podcast",
                "#77 - Véganisme, écoféminisme... des trucs de Blanc·hes ?",
                "Yuka",
                "Buy Or Not",
                "Livre : Être écoféministe de Jeanne Burgart Goutal",
                "Livre : L'écoféminisme dans la géopolitique: Femmes et développement durable de Rokhaya Samb",
                "Livre : Soeurs en écologie : Des femmes, de la nature et du réenchantement du monde de Pascale d'Erm",
                "Jeu de cartes : Héros et héroïnes de l’écologie",
                "Film : Woman at war",
                "Etre femme en politique, ce qu’il faut savoir pour réussir mais qu’on ne vous dit pas",
                "Faits et chiffres : Le leadership et la participation des femmes à la vie politique",
                "Leadership et participation des femmes à la vie politique",
                "Les femmes en politique",
                "Femmes et politique",
                "Être une femme politique, ça veut dire quoi ?",
                "Politique : les femmes au pouvoir, l'oppression au placard ? • FRANCE 24",
                "France : quelle place pour les femmes en politique ?",
                "Le Combat des Femmes en Politique !",
                "Vote et genre ; les femmes votent-elles différemment ?",
                "Les femmes sont-elles des hommes politiques comme les autres ?",
                "1996 - Simone Veil et la place des femmes en politique",
                "Elles - Politique au féminin et dénonciations avec Catherine Fournier",
                "Elues locales",
                "The Lady",
                "Borgen, une femme au pouvoir",
                "Femmes en politique : premier bilan de Christine Kelly",
                "Féminité et Estime de soi",
                "Psychologie féministe",
                "Pourquoi les femmes s’intéressent plus à la psychologie que les hommes?",
                "Hommes-femmes : même cerveau, même psychologie ?",
                "DE LA CRITIQUE FÉMINISTE DE LA PSYCHOLOGIE À LA THÉRAPIE FÉMINISTE : DÉMOCRATISER LES PRATIQUES THÉRAPEUTIQUES",
                "Bien-Être",
                "L’industrie du bien-être n'est pas du côté des femmes. Elle nous détourne de ce qui nous fait réellement souffrir",
                "Bien-être et droits des femmes : parole d’une croyante",
                "Dépression : les femmes sont les plus touchées",
                "Santé mentale et féminisme | Contre Soirée avec Louisadonna",
                "Inventer une thérapie féministe | Un podcast à soi (52) - ARTE Radio Podcast",
                "Apprendre à prendre soin de soi : Féminisme et santé mentale avec Lauren Bastide",
                "Au procès des folles | Un podcast à soi (51) - ARTE Radio Podcast",
                "Psychology of men and women",
                "Feminine health",
                "Jeu : 2 Minutes Les Filles",
                "Livre : Épistémologies féministes et psychologie de Fonte David, Lelaurain Solveig",
                "Livre : La Psychologie de la femme de Karen Horney",
                "Livre : Le syndrome d'imposture de Elisabeth Cadoche et Anne De Montarlot",
                "Livre : Le regret d'être mère de Orna Donath",
                "Livre : Révolution intérieure de Gloria Steinem",
                "Les chiffres clés sur les femmes et la tech",
                "Femmes dans la tech : où en est-on aujourd’hui ?",
                "Nouvelles technologies : outils indispensables à la mise en réseau et l'émancipation des filles et des femmes",
                "17 avril : Journée de la femme digitale",
                "La place des femmes dans la Tech",
                "Les Femmes dans les métiers du numérique",
                "Féminiser le secteur de la tech",
                "Les femmes sont l’avenir du numérique !",
                "Comment manœuvrer vers un avenir numérique équitable",
                "Femmes du numérique : défis et opportunités pour un monde digital et inclusif",
                "Parcours inspirants : être une femme dans le secteur de la tech",
                "Le discours d’inspiration: Les femmes qui inspirent dans le secteur de la technologie",
                "Femmes et numérique : pratiques égalitaires, dispositifs inclusifs",
                "Les oubliées du numérique | Épisode 2 | Les femmes dans la Tech | ETNA",
                "Les femmes et le numérique : reformatons la société | Zinnya Del Villar | TEDxRennes",
                "Quelle place pour les femmes dans la tech ?",
                "La place de la femme dans le numérique - Interview Ldigital",
                "SMART IMPACT - L’IA encore trop fermée aux femmes ?",
                "Femmes, emploi et intelligence artificielle : les grands enjeux à venir - Le numérique pour tous",
                "Technoféminisme : Comment se réapproprier l'espace et les technologies numériques ?",
                "[Podcast OK:SII] : les femmes dans la tech : comment devenir speakeuse ?",
                "[Inside Esker #12] La tech au féminin",
                "Programme : NOVA In tech",
                "Livre : Numérique, compter avec les femmes de Anne-Marie Kermarrec",
                "Livre : Elles changent le monde de Delphine Remy-Boutang",
                "Livre : La Femme digitale de Isabelle Juppé",
                "Quizz : LE QUIZZ de DesCodeuses",
                "Association : Social Builder",
                "Programme : Numérique pour elles",
                "Programme : JUMP IN TECH",
                "L’invisibilisation des femmes dans l’art et la culture, tentatives de compréhension",
                "Les femmes dans l’histoire de l’art (et la littérature jeunesse)",
                "«La littérature et l’art, vecteurs essentiels» face aux violences faites aux femmes",
                "Des femmes qui lisent et de l'art",
                "Artistes femmes ni muses, ni soumises",
                "La place des femmes dans l’art",
                "Littérature : un art encore largement dominé par les hommes",
                "Femme dans l’art : toute une histoire",
                "Déclaration des droits de la femme et de la citoyenne de Olympe de Gouges",
                "« Une femme qui écrit » : quelques observations sur les femmes en littérature",
                "« Il y a toujours eu des artistes femmes mais l'histoire les a mises de côté »",
                "Martine Reid - Femmes et littérature : une histoire culturelle",
                "Femmes, féminisme, genre. Que faire de ces concepts en critique littéraire?",
                "Le travestissement féminin dans l'Histoire de l'art et la Littérature ft. Professeur Klotho",
                "Quelle place pour les femmes dans l’art ? • FRANCE 24",
                "#20 - Aurore Évain présente Catherine Bernard et Mary Sidney | Art et Littérature | Podcast",
                "Une histoire des littératures féministes : de Christine de Pisan à Monique Wittig",
                "Femmes, féminité, féminisme [1/2] | Histoire des arts, objectif Bac !",
                "Femmes, féminité, féminisme [2/2] | Histoire des arts, objectif Bac !",
                "Mécanismes d'(in)visibilisation: où sont les femmes artistes ?",
                "Un Texte Une Femme",
                "Livre : Les impatientes de Djaïli Amadou Amal",
                "Livre : La servante écarlate. The handmaid's tale de Margaret Atwood",
                "Livre : L'événement de Annie Ernaux",
                "Livre : Une farouche liberté de Gisèle Halimi",
                "Livre : Sorcières : la puissance invaincue des femmes de Mona Chollet",
                "Livre : Fille de Camille Laurens",
                "Livre : Le consentement de Vanessa Springora",
                "Livre : Un féminisme décolonial de Françoise Vergès",
                "Livre : Une femme de Annie Ernaux",
                "Livre : Une chambre à soi de Virginia Woolf",
                "Livre : Le deuxième sexe de Simone de Beauvoir",
                "Livre : Parole de femme de Annie Leclerc",
                "Jeu : Jeu de mémoire - 20 femmes dans l'art",
                "Jeu : Iconic Women in art",
                "Film : Frida de Julie Taymor",
                "Histoire du sport féminin - 1000 ans d’évolution (pas toujours)",
                "Sport féminin : les inégalités persistent !",
                "Cinq choses à savoir sur les femmes et le sport",
                "Le sport féminin gagne du terrain",
                "Place des femmes dans le sport : on en est où ?",
                "Faits et chiffres : les femmes dans le sport",
                "Où en est l'égalité femmes hommes dans le sport ?",
                "Femmes et sport : « J’ai dû me battre et me justifier deux fois plus car j’étais une femme »",
                "Une lutte pour la visibilité du sport féminin",
                "Ces femmes ont changé le monde du sport",
                "La place des femmes dans le milieu sportif | Opinion",
                "Le sport féminin, histoire d’un combat",
                "« On attend qu'on soit musclées mais aussi hyper-féminines. »",
                "Le sport au prisme du genre. Une longue marche pour l’égalité",
                "Les combattantes du sport et du genre | Un podcast à soi (2) - ARTE Radio Podcast",
                "Florence-Agathe Dubé-Moreau et Annie Larouche : Le féminisme dans le sport | Sportives, point final",
                "Sports olympiques, médaille d’or du sexisme",
                "Florence-Agathe Dubé-Moreau - La place des femmes dans le sport | Le Podcast de Niry",
                "Fitness Femme - Entraînement",
                "Lady Sports Soest",
                "Idawo",
                "Livre : Du sexisme dans le sport de Béatrice Barbusse",
                "Livre : Le Sport Contre Les Femmes de Ronan David",
                "Association : Femix’Sports"
            ];
            $liens = [
                "Femmes de science" => "https://lejournal.cnrs.fr/dossiers/femmes-de-science",
                "Femmes et sciences : où en est-on ?" => "https://www.sciencespo.fr/gender-studies/fr/actualites/femmes-et-sciences-ou-en-est-on/",
                "Ressenti et discriminations de genre : ce qui freine la féminisation des filières scientifiques" => "https://www.jean-jaures.org/publication/le-ressenti-a-t-il-un-genre-decryptage-de-la-sous-representation-des-femmes-en-sciences/",
                "La place des femmes dans la recherche scientifique" => "https://www.echosciences-grenoble.fr/articles/la-place-des-femmes-dans-la-recherche-scientifique",
                "Femmes et Ingénieures : elles font la science d’aujourd’hui et de demain !" => "https://www.chimieparistech.psl.eu/ecole/actualites/femmes-et-ingenieures-elles-font-la-science-daujourdhui-et-de-demain/",
                "Femmes et Mathématiques" => "https://femmes-et-maths.fr/",
                "LES FEMMES DANS L'HISTOIRE DES SCIENCES : L'effet Matilda #CMH9" => "https://www.youtube.com/watch?v=H08PEppfabM",
                "Science : où sont les femmes ? - Science En Questions " => "https://www.youtube.com/watch?v=K3qyivNWAF4",
                "Portraits de femmes scientifiques" => "https://www.youtube.com/watch?v=uKlTMzYqcOA",
                "Marie Curie: Une femme pionnière aux deux Prix Nobel" => "https://www.youtube.com/watch?v=PNccWwHCw4M",
                "Les droits des femmes et la chimie : une histoire commune" => "https://www.youtube.com/watch?v=rrmGZnrQ9JQ",
                "Cecilia Payne - L'astrophysique au début du 20e siècle | Cherchez la femme ! | ARTE" => "https://www.youtube.com/watch?v=lwOdSqsxa90",
                "Les filles et les mathématiques" => "https://www.youtube.com/watch?v=CkmrNtB3L8o",
                "Le plafond de verre des femmes scientifiques" => "https://www.youtube.com/watch?v=px08mHpDqaM",
                "Podcast Sous la blouse, S3 #1 Lucie Leboulleux" => "https://www.youtube.com/watch?v=px08mHpDqaM",
                "Femmes et Sciences - À vous le sup'" => "https://www.youtube.com/watch?v=J_0v8QHz-c8",
                "For Women in Science Community" => "https://play.google.com/store/apps/details?id=com.fwiscommunity.myapp&hl=fr",
                "Jeu : Mendeleieva" => "https://www.femmesetsciences.fr/mendeleieva-en-ligne",
                "Jeu de cartes : Femmes scientifiques et techniciennes à travers les époques" => "https://www.cite-sciences.fr/fr/au-programme/lieux-ressources/carrefour-numerique2/ressources-en-ligne/jeu-femmes-scientifiques",
                "Film : Les figures de l’ombre" => "https://fr.wikipedia.org/wiki/Les_Figures_de_l%27ombre",
                "Histoire de la médecine - La place des femmes en médecine" => "https://reseauprosante.fr/articles/show/histoire-de-la-medecine-la-place-des-femmes-en-medecine-2572",
                "Féminisation de la médecine : des bénéfices pour toute la profession" => "https://savoirs.unistra.fr/societe/feminisation-de-la-medecine-des-benefices-pour-toute-la-profession",
                "Histoire de l'entrée des femmes en médecine" => "https://numerabilis.u-paris.fr/medica/bibliotheque-numerique/presentations/entree-femmes-en-medecine.php",
                "Les femmes sont de meilleurs médecins que les hommes… surtout pour les femmes !" => "https://www.jim.fr/viewarticle/femmes-sont-meilleurs-m%C3%A9decins-que-hommes-surtout-2024a1000832",
                "Les femmes médecins aujourd'hui : l'avenir de la médecine ?" => "https://shs.cairn.info/revue-les-tribunes-de-la-sante1-2014-3-page-43?lang=fr",
                "La place des femmes dans l'histoire de la médecine" => "https://www.youtube.com/watch?v=Iv-ddA0SbhY",
                "Femmes de Santé 2024" => "https://www.youtube.com/watch?app=desktop&v=4amwgJesDxQ",
                "Les femmes, victimes de discrimination médicale" => "https://www.youtube.com/watch?v=6fieZcN546A",
                "LA MÉDECINE EST-ELLE SEXISTE ?" => "https://www.youtube.com/watch?v=cb3Ov5r4pME",
                "Nathalie Gheeta Babouraj : Devenir sa propre médecine" => "https://www.youtube.com/watch?v=wcIC5rBSWQ0",
                "L'histoire de Caroline, femme, mère, médecin..." => "https://www.youtube.com/watch?v=W6muNYkFlVs",
                "PASSAGE DE TÉMOIN x PODEX - De Sage-Femme à Médecin avec Lorène ROCHARD" => "https://www.youtube.com/watch?v=bikePek-_7E",
                "Femme Clientes" => "https://play.google.com/store/apps/details?id=br.com.mtmtecnologia.mobilex.femme.pacientes&hl=fr",
                "Nabla" => "https://www.nabla.com/fr/",
                "Flo" => "https://flo.health/fr",
                "Clue" => "https://helloclue.com/fr",
                "Keep a Breast" => "https://keepabreast.fr/keepabreast-app",
                "Omena" => "https://www.omena.app/",
                "Formation : Femme médecine" => "https://www.enterredefemmes.com/femme-medecine-formation",
                "Livre : Les soeurs d’Hippocrate de Jean-Noël Fabiani-Salmon et Laetitia Coryn" => "https://arenes.fr/livre/les-soeurs-dhippocrate/",
                "Site de formations : hkind" => "https://catalogue-hkind.femmesdesante.fr/",
                "Film : François Dolto, le désir de vivre" => "https://fr.wikipedia.org/wiki/Fran%C3%A7oise_Dolto,_le_d%C3%A9sir_de_vivre",
                "L'évolution des droits des femmes : chronologie" => "https://www.vie-publique.fr/eclairage/19590-chronologie-des-droits-des-femmes",
                "Être femme au Moyen-Âge : les chemins discrets de la liberté" => "https://www.nationalgeographic.fr/histoire/etre-femme-au-moyen-age-les-chemins-discrets-de-la-liberte-droits-emancipation-epoque-medievale",
                "Les femmes dans l’histoire mondiale" => "https://journals.openedition.org/clio/9894",
                "Il paraît que les femmes ont une histoire (mais pas depuis longtemps)" => "https://www.radiofrance.fr/franceculture/il-parait-que-les-femmes-ont-une-histoire-mais-pas-depuis-longtemps-6348151",
                "Les femmes pendant la Révolution française" => "https://www.lhistoire.fr/mondes-sociaux/les-femmes-pendant-la-r%C3%A9volution-fran%C3%A7aise",
                "Des femmes écrivent l’histoire des femmes au milieu du XIXe siècle : représentations, interprétations" => "https://journals.openedition.org/genrehistoire/742?lang=en",
                "Comment les femmes ont-elles été effacées de l'Histoire ? Entretien avec Titiou Lecoq" => "https://www.ouest-france.fr/societe/egalite-hommes-femmes/video-comment-les-femmes-ont-elles-ete-effacees-de-l-histoire-entretien-avec-titiou-lecoq-dcba0ccc-8ae2-45e3-9779-c697797d11c1",
                "Toute l'Histoire des femmes en France" => "https://www.youtube.com/watch?v=S3Zf8NzPIDA",
                "“Pourquoi l’Histoire a effacé les femmes ?” | SPEECH de Titiou Lecoq" => "https://www.dailymotion.com/video/x84tv5y",
                "Les femmes guerrières dans l'histoire : pourquoi elles n'existaient (presque) pas ?" => "https://www.youtube.com/watch?v=p8et5SjxZSs",
                "La petite histoire du travail des femmes" => "https://www.youtube.com/watch?v=0oir8OR6T5I",
                "Les femmes au XVIIIe siècle (avec Cécile Berly) - Grasse summer podcast festival" => "https://www.youtube.com/watch?v=sJ1Q6KC3FDs",
                "Les femmes dans l'Histoire - Simone Veil" => "https://www.youtube.com/watch?v=1PYbaV2LyPc",
                "Grossesses et avortements sous l’Ancien régime" => "https://www.youtube.com/watch?v=kwBprImfB1g",
                "L'ORIGINE du PATRIARCAT - Ft. Alex Ramirès" => "https://www.youtube.com/watch?v=ebQQEL6G7PE",
                "Podcast “L’histoire des droits des femmes à travers les époques”" => "https://www.youtube.com/watch?v=YpCekIu598c",
                "Femmes Qui Ont Changé le Monde" => "https://play.google.com/store/apps/details?id=com.learnyland.women&hl=fr",
                "Women on the map : une application qui géolocalise les femmes célèbres" => "https://womanns-world.com/women-on-the-map-application-geolocalisation-femmes-histoire/",
                "Livre : Une histoire des femmes en Europe (des grottes aux Lumières) de Sophie Lalanne (dir.), Didier Lett, Dominique Picco" => "https://www.anhima.fr/publications/une-histoire-des-femmes-en-europe-des-grottes-aux-lumieres",
                "Extrait d'un livre : Les Femmes à travers l’Histoire de Isabelle Grégor et André Larané" => "https://www.herodote.net/Textes/Femmes_extraits.pdf",
                "Jeu  ''Qui est-ce ?'' : Who's she ?" => "https://www.comprendrepouragir.org/produit/whos-she/",
                "Jeu Time's up : Bad Bitches Only" => "https://www.comprendrepouragir.org/produit/jeu-de-cartes-feministe-bad-bitches-only/",
                "Film : Les Suffragettes" => "https://fr.wikipedia.org/wiki/Les_Suffragettes",
                "Film : Les Femmes de l'ombre" => "https://fr.wikipedia.org/wiki/Les_Femmes_de_l%27ombre",
                "Les femmes : une force de travail à maximiser" => "https://www.pwc.fr/fr/publications/2024/03/les-femmes-une-force-de-travail-a-maximiser.html",
                "Les femmes au travail, c’est bon pour la croissance" => "https://www.lemonde.fr/economie/article/2012/12/17/les-femmes-au-travail-c-est-bon-pour-la-croissance_1807301_3234.html",
                "Pourquoi l’autonomisation économique des femmes profite à l’ensemble des sociétés ?" => "https://www.onufemmes.fr/nos-actualites/pourquoi-lautonomisation-economique-des-femmes-profite-a-lensemble-des-societes-",
                "Travail des femmes : ce qu’on voit… et ce qu’on a ignoré" => "https://lejournal.cnrs.fr/nos-blogs/dialogues-economiques/travail-des-femmes-ce-quon-voit-et-ce-quon-a-ignore",
                "Près de 2,4 milliards de femmes dans le monde ne possèdent pas les mêmes droits économiques que les hommes" => "https://www.banquemondiale.org/fr/news/press-release/2022/03/01/nearly-2-4-billion-women-globally-don-t-have-same-economic-rights-as-men",
                "Qu’est-ce qu’une économie féministe?" => "https://www.foei.org/fr/video/quest-ce-quune-economie-feministe-video/",
                "Inégalités hommes et femmes sur le marché du travail, une vidéo Sciences Echo" => "https://www.echosciences-paca.fr/articles/inegalites-hommes-et-femmes-sur-le-marche-du-travail-une-video-sciences-echo",
                "Les femmes travaillent gratuitement à partir de ce vendredi : les inégalités salariales pers... " => "https://www.youtube.com/watch?v=IilD2MzdiDE",
                "Une brève histoire de l'arrivée des femmes dans le monde du travail" => "https://www.dailymotion.com/video/x6fb24x",
                "Justice Économique - Podcast Ep 9 - Autonomisation Economique des Femmes et travail rémunéré" => "https://www.youtube.com/watch?v=f6HYn7LjDAs",
                "Justice Économique - Podcast Ep 8 - Résilience économique et sécurité des revenus des femmes" => "https://www.youtube.com/watch?v=FGInhN1PrnA",
                "Justice Économique - Podcast Ep 15 - Travail décent et développement économique pour les femmes" => "https://www.youtube.com/watch?v=SC5h0poDrOc",
                "#87 Pourquoi les femmes sont majoritairement sous-payées? | Conversation avec Laëtitia Vitaud" => "https://www.youtube.com/watch?v=WXh23LHJ9BM",
                "Comment les femmes réinventent les codes de la réussite professionnelle ?" => "https://www.youtube.com/watch?v=aDNpjERopDY",
                "Toutes Connectées" => "https://play.google.com/store/apps/details?id=com.toutesconnectees&hl=fr",
                "Leadership pour elles" => "https://www.francetvinfo.fr/decouverte/gadgets/que-vaut-leadership-pour-elles-l-application-du-gouvernement-pour-les-femmes-au-travail_570999.html",
                "Formation égalité hommes femmes au travail" => "https://goalmap.com/fr/formation-egalite-homme-femme-au-travail",
                "Livre : Le manuel de formation d’ONU Femmes sur et genre et l’économie" => "https://www.unwomen.org/fr/digital-library/publications/2017/10/the-un-women-gender-and-economics-training-manual",
                "Travail et emploi des femmes de Margaret Maruani" => "https://www.editionsladecouverte.fr/travail_et_emploi_des_femmes-9782707194022",
                "Place des femmes dans les médias, la culture, le sport" => "https://www.egalite-femmes-hommes.gouv.fr/place-des-femmes-dans-les-medias-la-culture-le-sport",
                "Culture et médias : les femmes sont plus touchées par la discrimination" => "https://www.cbnews.fr/etudes/image-culture-medias-femmes-sont-plus-touchees-discrimination-80811",
                "Egalité femmes-hommes dans les médias : « pour que les femmes comptent, il faut les compter »" => "https://www.culture.gouv.fr/fr/actualites/egalite-femmes-hommes-dans-les-medias-pour-que-les-femmes-comptent-il-faut-les-compter",
                "Femmes et medias" => "https://shs.cairn.info/revue-reseaux1-2003-4-page-23?lang=fr&contenu=article",
                "La place des femmes dans les médias est en hausse depuis le début de l’année, mais…" => "https://www.ouest-france.fr/societe/egalite-hommes-femmes/la-place-des-personnalites-feminines-dans-les-medias-est-en-hausse-mais-d5baada6-dbf4-11ee-a79f-2312009be08f",
                "Les femmes plus visibles dans la culture mais toujours des inégalités" => "https://www.culture.gouv.fr/fr/actualites/les-femmes-plus-visibles-dans-la-culture-mais-toujours-des-inegalites",
                "La représentation des femmes dans les médias" => "https://www.egalab.org/representation_des_femmes_medias.php",
                "Égalité femmes-hommes : les médias ne montrent toujours pas l’exemple" => "https://www.radiofrance.fr/franceculture/egalite-femmes-hommes-les-medias-ne-montrent-toujours-pas-l-exemple-3907353",
                "La représentation des femmes dans les médias - Léa Salamé/Paul Lapierre - La collab' de l'info" => "https://www.youtube.com/watch?v=ieivmfJhD-0",
                "Les femmes et la culture : l’art du combat féminin" => "https://www.arte.tv/fr/videos/118080-083-A/les-femmes-et-la-culture-l-art-du-combat-feminin/",
                "Violences commises dans le cinéma, la culture, la mode et la publicité : audition de Me Too Médias" => "https://www.youtube.com/watch?v=A09poSYyxck",
                "TV5MONDE : Les femmes dans les médias" => "https://www.youtube.com/watch?v=h_z8QmFAfQg",
                "Comment développer la visibilité des femmes dans les médias ? 1/2 [Spécial PODCASTHON]" => "https://www.youtube.com/watch?v=zP3AevhuqQ0",
                "Comment développer la visibilité des femmes dans les médias ? 2/2 [Spécial PODCASTHON]" => "https://www.youtube.com/watch?v=5PqTo54AZGk",
                "Femmes et médias : les rencontres de l’Égalité : En direct" => "https://www.youtube.com/watch?v=e5yI89m3Iec",
                "Femme actuelle, le magazine" => "https://play.google.com/store/apps/details?id=com.milibris.standalone.app.fac&hl=fr",
                "Journal des Femmes" => "https://play.google.com/store/apps/details?id=com.journaldesfemmes.journaldesfemmes&hl=fr",
                "Aides pour les photographes" => "https://ellesfontla.culture.gouv.fr/aides",
                "Exposition de Pharrell Williams" => "https://www.sortiraparis.com/arts-culture/exposition/articles/324469-femmes-l-exposition-collective-et-gratuite-de-pharrell-williams-a-la-galerie-perrotin#:~:text=Avis%20aux%20accros%20de%20l,40%20artistes%20aux%20univers%20vari%C3%A9s.",
                "Musée : Le Paris des femmes" => "https://www.carnavalet.paris.fr/visiter/offre-culturelle/le-paris-des-femmes",
                "Musées: 11 femmes pour 11 institutions" => "https://www.parismusees.paris.fr/fr/actualite/11-femmes-pour-11-institutions",
                "Droits des femmes : un enjeu environnemental" => "https://fne.asso.fr/dossiers/droits-des-femmes-un-enjeu-environnemental#:~:text=Les%20in%C3%A9galit%C3%A9s%20de%20genre%20renforcent,es%20environnementaux%20sont%20des%20femmes.",
                "Les femmes et l’environnement" => "http://www.adequations.org/spip.php?article648#:~:text=Les%20femmes%20ont%20souvent%20jou%C3%A9,les%20modes%20de%20consommation%20viables.",
                "L'écologie serait-elle une affaire de femmes ?" => "https://www.radiofrance.fr/franceculture/l-ecologie-serait-elle-une-affaire-de-femmes-1196252",
                "Quels liens entre les questions de genre et les enjeux climatiques ?" => "https://millenaire3.grandlyon.com/dossiers/2024/attenuation-du-changement-climatique-quelles-empreintes-carbone-selon-les-csp-ages-genres-et-territoires/quels-liens-entre-les-questions-de-genre-et-les-enjeux-climatiques#:~:text=Les%20femmes%20sont%20plus%20vertueuses,16%20%25%20de%20CO%E2%82%82%20en%20moins.",
                "Pourquoi les femmes sont essentielles à l'action climatique" => "https://www.un.org/fr/climatechange/science/climate-issues/women#:~:text=Les%20femmes%20sont%20des%20agents%20du%20changement&text=Les%20femmes%20sont%20plus%20susceptibles,l'%C3%A9nergie%20dans%20le%20m%C3%A9nage.",
                "Le rôle crucial des femmes dans la protection de l’environnement en Afrique" => "https://eco-pledgeafrica.com/echo-vert/le-role-crucial-des-femmes-dans-la-protection-de-lenvironnement-en-afrique/#:~:text=Collecte%20et%20recyclage%20des%20d%C3%A9chets,renouvelables%20comme%20les%20foyers%20solaires.",
                "Les femmes et le changement climatique" => "https://tnova.fr/ecologie/climat/les-femmes-et-le-changement-climatique/",
                "Le féminisme, un outil puissant dans la lutte contre le changement climatique" => "https://information.tv5monde.com/terriennes/femmes-actrices-de-la-lutte-pour-lenvironnement",
                "C’est quoi l’écoféminisme ? " => "https://www.arte.tv/fr/videos/116341-008-A/c-est-quoi-l-ecofeminisme/",
                "Les hommes moins écolo que les femmes ? - Y a Pas de Planète B" => "https://www.youtube.com/watch?v=KQ0nXb8ZO_k",
                "Le féminisme, un outil puissant dans la lutte contre le changement climatique" => "https://www.youtube.com/watch?v=SxGYwHmzvCM",
                "[VIRAGO] Écoféminisme : Vertes de rage ? Qui sont vraiment les écoféministes ?" => "https://www.youtube.com/watch?app=desktop&v=-vYfBgjpOmw",
                "L’écoféminisme pour changer le monde ? Lauren Bastide" => "https://www.youtube.com/watch?v=V413p8QywNI",
                "Ecoféminisme #1 : Défendre nos territoires | Un podcast à soi (21) - ARTE Radio Podcast" => "https://www.youtube.com/watch?v=oFGQq_p3O2s",
                "Ecoféminisme #2 : Retrouver la terre | Un podcast à soi (22) - ARTE Radio Podcast" => "https://www.youtube.com/watch?app=desktop&v=TJh3UXj55wY&t=1s",
                "#77 - Véganisme, écoféminisme... des trucs de Blanc·hes ?" => "https://www.youtube.com/watch?v=ghWU1CaSpe8",
                "Yuka" => "https://yuka.io/",
                "Buy Or Not" => "https://buyornot.org/",
                "Livre : Être écoféministe de Jeanne Burgart Goutal" => "https://www.babelio.com/livres/Burgart-Goutal-tre-ecofeministe/1220109",
                "Livre : L'écoféminisme dans la géopolitique: Femmes et développement durable de Rokhaya Samb" => "https://www.babelio.com/livres/Samb-Lecofeminisme-dans-la-geopolitique-Femmes-et-dev/1217903",
                "Livre : Soeurs en écologie : Des femmes, de la nature et du réenchantement du monde de Pascale d'Erm" => "https://www.babelio.com/livres/Erm-Soeurs-en-ecologie--Des-femmes-de-la-nature-et-du/1203377",
                "Jeu de cartes : Héros et héroïnes de l’écologie" => "https://www.editionslibre.org/wp-content/uploads/2022/12/Heros-de-lecologie-volume-carre-1.png",
                "Film : Woman at war" => "https://1001heroines.fr/heroines/women-at-war/",
                "Etre femme en politique, ce qu’il faut savoir pour réussir mais qu’on ne vous dit pas" => "https://www.elle.fr/Elle-Active/Actualites/Etre-femme-en-politique-ce-qu-il-faut-savoir-pour-reussir-mais-qu-on-ne-vous-dit-pas-3822435",
                "Faits et chiffres : Le leadership et la participation des femmes à la vie politique" => "https://www.unwomen.org/fr/articles/faits-et-chiffres/faits-et-chiffres-le-leadership-et-la-participation-des-femmes-a-la-vie-politique#:~:text=Seulement%2018%20pays%20ont%20une,1er%20janvier%202024%20%5B4%5D",
                "Leadership et participation des femmes à la vie politique" => "https://www.unwomen.org/fr/what-we-do/leadership-and-political-participation",
                "Les femmes en politique" => "https://shs.cairn.info/revue-apres-demain-2013-2-page-24?lang=fr",
                "Femmes et politique" => "https://www.paricilademocratie.com/approfondir/femmes-societe-et-politique/881-femmes-et-politique",
                "Être une femme politique, ça veut dire quoi ?" => "https://www.dailymotion.com/video/x89h4rh",
                "Politique : les femmes au pouvoir, l'oppression au placard ? • FRANCE 24" => "https://www.youtube.com/watch?v=VycjXZ9iBiY",
                "France : quelle place pour les femmes en politique ?" => "https://information.tv5monde.com/terriennes/france-quelle-place-pour-les-femmes-en-politique-16275",
                "Le Combat des Femmes en Politique !" => "https://www.youtube.com/watch?v=iYvy6F0d52o",
                "Vote et genre ; les femmes votent-elles différemment ?" => "https://www.youtube.com/watch?v=yiFeRUHMtuA",
                "Les femmes sont-elles des hommes politiques comme les autres ?" => "https://www.youtube.com/watch?v=_utyakM_mhY",
                "1996 - Simone Veil et la place des femmes en politique" => "https://www.youtube.com/watch?v=XgYSQpvUCX8",
                "Elles - Politique au féminin et dénonciations avec Catherine Fournier" => "https://www.youtube.com/watch?v=W42GUml3JCQ",
                "Elues locales" => "https://www.elueslocales.fr/soutenir-et-valoriser-les-femmes-en-politique/",
                "The Lady" => "https://fr.wikipedia.org/wiki/The_Lady_(film)",
                "Borgen, une femme au pouvoir" => "https://fr.wikipedia.org/wiki/Borgen,_une_femme_au_pouvoir",
                "Femmes en politique : premier bilan de Christine Kelly" => "https://www.lisez.com/livres/femmes-en-politique-premier-bilan-trente-portraits-de-femmes-qui-ont-accede-aux",
                "Féminité et Estime de soi" => "https://www.psychologue.net/articles/feminite-et-estime-de-soi",
                "Psychologie féministe" => "https://fr.wikipedia.org/wiki/Psychologie_f%C3%A9ministe",
                "Pourquoi les femmes s’intéressent plus à la psychologie que les hommes?" => "https://www.huffingtonpost.fr/life/article/pourquoi-les-femmes-s-interessent-plus-a-la-psychologie-que-les-hommes-blog_189408.html",
                "Hommes-femmes : même cerveau, même psychologie ?" => "https://www.lesechos.fr/2017/09/hommes-femmes-meme-cerveau-meme-psychologie-177269",
                "DE LA CRITIQUE FÉMINISTE DE LA PSYCHOLOGIE À LA THÉRAPIE FÉMINISTE : DÉMOCRATISER LES PRATIQUES THÉRAPEUTIQUES" => "https://www.erudit.org/fr/revues/rqpsy/2022-v43-n3-rqpsy07552/1094895ar/",
                "Bien-Être" => "https://lapause.jho.fr/je-veux-prendre-soin-de-moi-et-de-mon-corps/bien-etre/1/",
                "L’industrie du bien-être n'est pas du côté des femmes. Elle nous détourne de ce qui nous fait réellement souffrir" => "https://theconversation.com/lindustrie-du-bien-etre-nest-pas-du-cote-des-femmes-elle-nous-detourne-de-ce-qui-nous-fait-reellement-souffrir-178727",
                "Bien-être et droits des femmes : parole d’une croyante" => "https://www.ktotv.com/video/00404024/bien-etre-et-droits-des-femmes-parole-dune-croyante",
                "Dépression : les femmes sont les plus touchées" => "https://www.tf1info.fr/sante/video-depression-les-femmes-sont-les-plus-touchees-selon-une-etude-2101715.html",
                "Santé mentale et féminisme | Contre Soirée avec Louisadonna" => "https://www.youtube.com/watch?v=htgDaCqBuOA",
                "Inventer une thérapie féministe | Un podcast à soi (52) - ARTE Radio Podcast" => "https://www.youtube.com/watch?v=_DC6fuWt6Uc",
                "Apprendre à prendre soin de soi : Féminisme et santé mentale avec Lauren Bastide" => "https://www.youtube.com/watch?v=oocjR0i91hg",
                "Au procès des folles | Un podcast à soi (51) - ARTE Radio Podcast" => "https://www.youtube.com/watch?app=desktop&v=BmLa5NhvS7M",
                "Psychology of men and women" => "https://play.google.com/store/apps/details?id=app.psycho.newworld&hl=fr",
                "Feminine health" => "https://play.google.com/store/apps/details?id=com.eurofarmacontigo&hl=fr",
                "Jeu : 2 Minutes Les Filles" => "https://www.amazon.fr/Complicit%C3%A9-Questions-discuter-Psychologie-Positive/dp/B07Q3XXNMC",
                "Livre : Épistémologies féministes et psychologie de Fonte David, Lelaurain Solveig" => "https://www.editions-hermann.fr/livre/epistemologies-feministes-et-psychologie-fonte-david",
                "Livre : La Psychologie de la femme de Karen Horney" => "https://www.payot-rivages.fr/payot/livre/la-psychologie-de-la-femme-9782228917711",
                "Livre : Le syndrome d'imposture de Elisabeth Cadoche et Anne De Montarlot" => "https://booknode.com/le_syndrome_dimposture_03408844 ",
                "Livre : Le regret d'être mère de Orna Donath" => "https://booknode.com/le_regret_detre_mere_03301063",
                "Livre : Révolution intérieure de Gloria Steinem" => "https://booknode.com/revolution_interieure_03504980",
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
                "Parcours inspirants : être une femme dans le secteur de la tech" => "https://www.youtube.com/watch?v=TyT2mh3Jios",
                "Le discours d’inspiration: Les femmes qui inspirent dans le secteur de la technologie" => "https://www.youtube.com/watch?v=qmGCZcTuxxA",
                "Femmes et numérique : pratiques égalitaires, dispositifs inclusifs" => "https://www.youtube.com/watch?v=AE54o0QgFJo",
                "Les oubliées du numérique | Épisode 2 | Les femmes dans la Tech | ETNA" => "https://www.youtube.com/watch?v=4DQo4hy5wMg",
                "Les femmes et le numérique : reformatons la société | Zinnya Del Villar | TEDxRennes" => "https://www.youtube.com/watch?v=x7ozO9vZJdw",
                "Quelle place pour les femmes dans la tech ?" => "https://www.youtube.com/watch?v=UWziHcuM4rM",
                "La place de la femme dans le numérique - Interview Ldigital" => "https://www.youtube.com/watch?v=-4MiL61YMOo",
                "SMART IMPACT - L’IA encore trop fermée aux femmes ?" => "https://www.youtube.com/watch?v=xeTtlhSxR_s",
                "Femmes, emploi et intelligence artificielle : les grands enjeux à venir - Le numérique pour tous" => "https://www.youtube.com/watch?v=iq5cHtS74Sk",
                "Technoféminisme : Comment se réapproprier l'espace et les technologies numériques ?" => "https://www.youtube.com/watch?v=f2i8M1QRogc",
                "[Podcast OK:SII] : les femmes dans la tech : comment devenir speakeuse ?" => "https://www.youtube.com/watch?v=td8htphPc2g",
                "[Inside Esker #12] La tech au féminin" => "https://www.youtube.com/watch?v=qopxT0ctHGY",
                "Programme : NOVA In tech" => "https://numeum.fr/themes/femmes-dans-le-numerique",
                "Livre : Numérique, compter avec les femmes de Anne-Marie Kermarrec" => "https://www.odilejacob.fr/catalogue/sciences-humaines/management-entreprise/numerique-compter-avec-les-femmes_9782738154446.php",
                "Livre : Elles changent le monde de Delphine Remy-Boutang" => "https://www.joinjfd.com/livre-elles-changent-le-monde/",
                "Livre : La Femme digitale de Isabelle Juppé" => "https://www.amazon.fr/Femme-digitale-Isabelle-Jupp%C3%A9/dp/2709630036",
                "Quizz : LE QUIZZ de DesCodeuses" => "https://descodeuses.org/quizz-descodeuses/",
                "Association : Social Builder" => "https://socialbuilder.org/",
                "Programme : Numérique pour elles" => "https://numeriquepourelles.fr/",
                "Programme : JUMP IN TECH" => "https://becomtech.fr/nos-programmes/",
                "L’invisibilisation des femmes dans l’art et la culture, tentatives de compréhension" => "https://www.onufemmes.fr/nos-actualites/2021/7/9/linvisibilisation-des-femmes-dans-lart-et-la-culture-tentatives-de-comprehension",
                "Les femmes dans l’histoire de l’art (et la littérature jeunesse)" => "https://filledalbum.wordpress.com/2021/05/25/les-femmes-dans-lhistoire-de-lart-et-la-litterature-jeunesse/",
                "«La littérature et l’art, vecteurs essentiels» face aux violences faites aux femmes" => "https://www.culture.gouv.fr/regions/drac-ile-de-france/actualites/actualite-a-la-une/la-litterature-et-l-art-vecteurs-essentiels-face-aux-violences-faites-aux-femmes",
                "Des femmes qui lisent et de l'art" => "https://lasuperbenewsletter.substack.com/p/des-femmes-qui-lisent-et-de-lart",
                "Artistes femmes ni muses, ni soumises" => "https://www.connaissancedesarts.com/arts-expositions/artistes-femmes-ni-muses-ni-soumises-2-11133980/",
                "La place des femmes dans l’art" => "https://euradio.fr/emission/KYQz-la-cause-des-femmes-en-europe-jade-champetier/oQQl-la-place-des-femmes-dans-lart",
                "Littérature : un art encore largement dominé par les hommes" => "https://theconversation.com/litterature-un-art-encore-largement-domine-par-les-hommes-126561",
                "Femme dans l’art : toute une histoire" => "https://culturetvous.fr/informations-transversales/actualites/femme-dans-lart-toute-une-histoire-4194",
                "Déclaration des droits de la femme et de la citoyenne de Olympe de Gouges" => "https://gallica.bnf.fr/essentiels/anthologie/declaration-droits-femme-citoyenne-0",
                "« Une femme qui écrit » : quelques observations sur les femmes en littérature" => "https://www.youtube.com/watch?v=DxH4bWh1-CY",
                "« Il y a toujours eu des artistes femmes mais l'histoire les a mises de côté »" => "https://www.youtube.com/watch?v=Ht8tr_fBkAI",
                "Martine Reid - Femmes et littérature : une histoire culturelle" => "https://www.youtube.com/watch?v=dZBolVRtmQ8",
                "Femmes, féminisme, genre. Que faire de ces concepts en critique littéraire?" => "https://www.youtube.com/watch?v=ClXjB9U0an8",
                "Le travestissement féminin dans l'Histoire de l'art et la Littérature ft. Professeur Klotho" => "https://www.youtube.com/watch?v=XBYhl99O-5g",
                "Quelle place pour les femmes dans l’art ? • FRANCE 24" => "https://www.youtube.com/watch?v=RpyMc0LH0hc",
                "#20 - Aurore Évain présente Catherine Bernard et Mary Sidney | Art et Littérature | Podcast" => "https://www.youtube.com/watch?v=wqPyM2QXr9E",
                "Une histoire des littératures féministes : de Christine de Pisan à Monique Wittig" => "https://www.youtube.com/watch?v=_vFV--npHyU",
                "Femmes, féminité, féminisme [1/2] | Histoire des arts, objectif Bac !" => "https://www.youtube.com/watch?app=desktop&v=J-hPHchGqj4",
                "Femmes, féminité, féminisme [2/2] | Histoire des arts, objectif Bac !" => "https://www.youtube.com/watch?v=uCUrg-i67NM",
                "Mécanismes d'(in)visibilisation: où sont les femmes artistes ?" => "https://www.youtube.com/watch?v=a38KFJUXU1o",
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
                "Histoire du sport féminin - 1000 ans d’évolution (pas toujours)" => "https://conseilsport.decathlon.fr/histoire-du-sport-feminin-1000-ans-devolution-enfin-pas-toujours-avec-le-portrait-de-wilma-rudolph-en-bonus",
                "Sport féminin : les inégalités persistent !" => "https://www.oxfamfrance.org/inegalites-femmes-hommes/inegalites-femmes-sport/",
                "Cinq choses à savoir sur les femmes et le sport" => "https://www.unwomen.org/fr/nouvelles/article-explicatif/2024/07/cinq-choses-a-savoir-sur-les-femmes-et-le-sport",
                "Le sport féminin gagne du terrain" => "https://www.sports.gouv.fr/le-sport-feminin-gagne-du-terrain-3262",
                "Place des femmes dans le sport : on en est où ?" => "https://asptt.com/blog/article/place-des-femmes-dans-le-sport/ ",
                "Faits et chiffres : les femmes dans le sport" => "https://www.unwomen.org/fr/jeux-olympiques-de-paris-2024-une-nouvelle-ere-pour-les-femmes-dans-le-monde-du-sport/faits-et-chiffres-les-femmes-dans-le-sport",
                "Où en est l'égalité femmes hommes dans le sport ?" => "https://www.vie-publique.fr/parole-dexpert/290150-ou-en-est-legalite-femmes-hommes-dans-le-sport",
                "Femmes et sport : « J’ai dû me battre et me justifier deux fois plus car j’étais une femme »" => "https://www.lemonde.fr/sport/article/2023/03/06/femmes-et-sport-j-ai-du-me-battre-et-me-justifier-deux-fois-plus-car-j-etais-une-femme_6164284_3242.html",
                "Une lutte pour la visibilité du sport féminin" => "https://www.espace-sciences.org/sciences-ouest/420/dossier/une-lutte-pour-la-visibilite-du-sport-feminin",
                "Ces femmes ont changé le monde du sport" => "https://www.facebook.com/watch/?v=932614845258571",
                "La place des femmes dans le milieu sportif | Opinion" => "https://www.youtube.com/watch?v=TZHK9wndGLY",
                "Le sport féminin, histoire d’un combat" => "https://www.youtube.com/watch?v=vDwMXnixfAk",
                "« On attend qu'on soit musclées mais aussi hyper-féminines. »" => "https://www.youtube.com/watch?v=vvXhWy9pczk",
                "Le sport au prisme du genre. Une longue marche pour l’égalité" => "https://www.youtube.com/watch?v=PM5qoIW0dkc",
                "Les combattantes du sport et du genre | Un podcast à soi (2) - ARTE Radio Podcast" => "https://www.youtube.com/watch?v=45jNv0XptsU",
                "Florence-Agathe Dubé-Moreau et Annie Larouche : Le féminisme dans le sport | Sportives, point final" => "https://www.youtube.com/watch?v=fcLF38nzfYA",
                "Sports olympiques, médaille d’or du sexisme" => "https://www.youtube.com/watch?v=8G9Ypo2z_JM",
                "Florence-Agathe Dubé-Moreau - La place des femmes dans le sport | Le Podcast de Niry" => "https://www.youtube.com/watch?v=l5Obtj2W-_0",
                "Fitness Femme - Entraînement" => "https://play.google.com/store/apps/details?id=women.workout.female.fitness&hl=fr",
                "Lady Sports Soest" => "https://play.google.com/store/apps/details?id=com.mylogifit.ladysportssoest&hl=fr",
                "Idawo" => "https://www.radiofrance.fr/francebleu/podcasts/la-nouvelle-eco-de-france-bleu-paris/la-nouvelle-eco-idawo-l-appli-pour-aider-les-femmes-a-faire-des-sports-collectifs-1611309",
                "Livre : Du sexisme dans le sport de Béatrice Barbusse" => "https://anamosa.fr/livre/du-sexisme-dans-le-sport-nouvelle-edition/",
                "Livre : Le Sport Contre Les Femmes de Ronan David" => "https://www.editionsbdl.com/produit/le-sport-contre-les-femmes/",
                "Association : Femix’Sports"  => "https://www.femixsports.fr/"
            ];
            $pdo = new PDO('mysql:host=localhost;dbname=empowerher_db;charset=utf8', 'root', '');
            $stmt = $pdo->query("SELECT titre, lien FROM ressources ORDER BY date_ajout DESC");
            $donnees = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($donnees as $row) {
                $titre = trim($row['titre'] ?? '');
                $lien = trim($row['lien'] ?? '');
            
                if ($titre !== '') {
                    $ressources[] = $titre;
                    $liens[$titre] = $lien;
                }
            }            

            sort($ressources, SORT_FLAG_CASE | SORT_STRING);
            $parPage = 30;
            $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
            $debut = ($page - 1) * $parPage;
            $totalPages = ceil(count($ressources) / $parPage);
            $affichage = array_slice($ressources, $debut, $parPage);

            echo "<ul id='resourcesList'>";
            foreach ($affichage as $titre) {
                $url = isset($liens[$titre]) ? $liens[$titre] : "#"; 
                echo "<li><a href='$url' target='_blank'>" . htmlspecialchars($titre) . "</a></li>";
            }
            echo "</ul>";

            echo "<div class='pagination' style='margin-top:20px;'>";
            for ($i = 1; $i <= $totalPages; $i++) {
                echo $i == $page ? "<strong>$i</strong> " : "<a href='?page=$i'>$i</a> ";
            }
            echo "</div>";
        ?>
        </div>

        <div class="suggest-resource">
            <input type="text" id="proposeResourceInput" placeholder="Proposer une nouvelle ressource" style="width: 95%;">
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
const allResources = <?php echo json_encode($ressources); ?>;
const resourceLinks = <?php echo json_encode($liens); ?>;

const searchInput = document.querySelector('#searchInput');
const resourcesList = document.querySelector('#resourcesList');

function displayResources(resources) {
    resourcesList.innerHTML = '';
    resources.forEach(titre => {
        const li = document.createElement('li');
        const a = document.createElement('a');
        a.href = resourceLinks[titre] || "#";
        a.target = "_blank";
        a.innerText = titre;
        li.appendChild(a);
        resourcesList.appendChild(li);
    });
}

searchInput.addEventListener('input', function () {
    const query = this.value.trim().toLowerCase();
    if (query.length > 0) {
        const filtered = allResources.filter(titre => titre.toLowerCase().includes(query));
        displayResources(filtered);
        document.querySelector('.pagination').style.display = 'none'; 
    } else {
        location.reload();
    }
});
</script>

<script>
const proposeResourceInput = document.getElementById('proposeResourceInput');

proposeResourceInput.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        const value = this.value.trim();
        if (value.length > 0) {
            fetch('proposer.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'type=ressource&contenu=' + encodeURIComponent(value)
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
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
