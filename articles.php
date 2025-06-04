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
    "Femmes de science" => "https://lejournal.cnrs.fr/dossiers/femmes-de-science",
    "Femmes et sciences : où en est-on ?" => "https://www.sciencespo.fr/gender-studies/fr/actualites/femmes-et-sciences-ou-en-est-on/",
    "Ressenti et discriminations de genre : ce qui freine la féminisation des filières scientifiques" => "https://www.jean-jaures.org/publication/le-ressenti-a-t-il-un-genre-decryptage-de-la-sous-representation-des-femmes-en-sciences/",
    "La place des femmes dans la recherche scientifique" => "https://www.echosciences-grenoble.fr/articles/la-place-des-femmes-dans-la-recherche-scientifique",
    "Femmes et Ingénieures : elles font la science d’aujourd’hui et de demain !" => "https://www.chimieparistech.psl.eu/ecole/actualites/femmes-et-ingenieures-elles-font-la-science-daujourdhui-et-de-demain/",
    "Femmes et Mathématiques" => "https://femmes-et-maths.fr/",
    "Histoire de la médecine - La place des femmes en médecine" => "https://reseauprosante.fr/articles/show/histoire-de-la-medecine-la-place-des-femmes-en-medecine-2572",
    "Féminisation de la médecine : des bénéfices pour toute la profession" => "https://savoirs.unistra.fr/societe/feminisation-de-la-medecine-des-benefices-pour-toute-la-profession",
    "Histoire de l'entrée des femmes en médecine" => "https://numerabilis.u-paris.fr/medica/bibliotheque-numerique/presentations/entree-femmes-en-medecine.php",
    "Les femmes sont de meilleurs médecins que les hommes… surtout pour les femmes !" => "https://www.jim.fr/viewarticle/femmes-sont-meilleurs-m%C3%A9decins-que-hommes-surtout-2024a1000832",
    "Les femmes médecins aujourd'hui : l'avenir de la médecine ?" => "https://shs.cairn.info/revue-les-tribunes-de-la-sante1-2014-3-page-43?lang=fr",
    "L'évolution des droits des femmes : chronologie" => "https://www.vie-publique.fr/eclairage/19590-chronologie-des-droits-des-femmes",
    "Être femme au Moyen-Âge : les chemins discrets de la liberté" => "https://www.nationalgeographic.fr/histoire/etre-femme-au-moyen-age-les-chemins-discrets-de-la-liberte-droits-emancipation-epoque-medievale",
    "Les femmes dans l’histoire mondiale" => "https://journals.openedition.org/clio/9894",
    "Il paraît que les femmes ont une histoire (mais pas depuis longtemps)" => "https://www.radiofrance.fr/franceculture/il-parait-que-les-femmes-ont-une-histoire-mais-pas-depuis-longtemps-6348151",
    "Les femmes pendant la Révolution française" => "https://www.lhistoire.fr/mondes-sociaux/les-femmes-pendant-la-r%C3%A9volution-fran%C3%A7aise",
    "Des femmes écrivent l’histoire des femmes au milieu du XIXe siècle : représentations, interprétations" => "https://journals.openedition.org/genrehistoire/742?lang=en",
    "Les femmes : une force de travail à maximiser" => "https://www.pwc.fr/fr/publications/2024/03/les-femmes-une-force-de-travail-a-maximiser.html",
    "Les femmes au travail, c’est bon pour la croissance" => "https://www.lemonde.fr/economie/article/2012/12/17/les-femmes-au-travail-c-est-bon-pour-la-croissance_1807301_3234.html",
    "Pourquoi l’autonomisation économique des femmes profite à l’ensemble des sociétés ?" => "https://www.onufemmes.fr/nos-actualites/pourquoi-lautonomisation-economique-des-femmes-profite-a-lensemble-des-societes-",
    "Travail des femmes : ce qu’on voit… et ce qu’on a ignoré" => "https://lejournal.cnrs.fr/nos-blogs/dialogues-economiques/travail-des-femmes-ce-quon-voit-et-ce-quon-a-ignore",
    "Près de 2,4 milliards de femmes dans le monde ne possèdent pas les mêmes droits économiques que les hommes" => "https://www.banquemondiale.org/fr/news/press-release/2022/03/01/nearly-2-4-billion-women-globally-don-t-have-same-economic-rights-as-men",
    "Place des femmes dans les médias, la culture, le sport" => "https://www.egalite-femmes-hommes.gouv.fr/place-des-femmes-dans-les-medias-la-culture-le-sport",
    "Culture et médias : les femmes sont plus touchées par la discrimination" => "https://www.cbnews.fr/etudes/image-culture-medias-femmes-sont-plus-touchees-discrimination-80811",
    "Egalité femmes-hommes dans les médias : « pour que les femmes comptent, il faut les compter »" => "https://www.culture.gouv.fr/fr/actualites/egalite-femmes-hommes-dans-les-medias-pour-que-les-femmes-comptent-il-faut-les-compter",
    "Femmes et medias" => "https://shs.cairn.info/revue-reseaux1-2003-4-page-23?lang=fr&contenu=article",
    "La place des femmes dans les médias est en hausse depuis le début de l’année, mais…" => "https://www.ouest-france.fr/societe/egalite-hommes-femmes/la-place-des-personnalites-feminines-dans-les-medias-est-en-hausse-mais-d5baada6-dbf4-11ee-a79f-2312009be08f",
    "Les femmes plus visibles dans la culture mais toujours des inégalités" => "https://www.culture.gouv.fr/fr/actualites/les-femmes-plus-visibles-dans-la-culture-mais-toujours-des-inegalites",
    "La représentation des femmes dans les médias" => "https://www.egalab.org/representation_des_femmes_medias.php",
    "Égalité femmes-hommes : les médias ne montrent toujours pas l’exemple" => "https://www.radiofrance.fr/franceculture/egalite-femmes-hommes-les-medias-ne-montrent-toujours-pas-l-exemple-3907353",
    "Droits des femmes : un enjeu environnemental" => "https://fne.asso.fr/dossiers/droits-des-femmes-un-enjeu-environnemental#:~:text=Les%20in%C3%A9galit%C3%A9s%20de%20genre%20renforcent,es%20environnementaux%20sont%20des%20femmes.",
    "Les femmes et l’environnement" => "http://www.adequations.org/spip.php?article648#:~:text=Les%20femmes%20ont%20souvent%20jou%C3%A9,les%20modes%20de%20consommation%20viables.",
    "L'écologie serait-elle une affaire de femmes ?" => "https://www.radiofrance.fr/franceculture/l-ecologie-serait-elle-une-affaire-de-femmes-1196252",
    "Quels liens entre les questions de genre et les enjeux climatiques ?" => "https://millenaire3.grandlyon.com/dossiers/2024/attenuation-du-changement-climatique-quelles-empreintes-carbone-selon-les-csp-ages-genres-et-territoires/quels-liens-entre-les-questions-de-genre-et-les-enjeux-climatiques#:~:text=Les%20femmes%20sont%20plus%20vertueuses,16%20%25%20de%20CO%E2%82%82%20en%20moins.",
    "Pourquoi les femmes sont essentielles à l'action climatique" => "https://www.un.org/fr/climatechange/science/climate-issues/women#:~:text=Les%20femmes%20sont%20des%20agents%20du%20changement&text=Les%20femmes%20sont%20plus%20susceptibles,l'%C3%A9nergie%20dans%20le%20m%C3%A9nage.",
    "Le rôle crucial des femmes dans la protection de l’environnement en Afrique" => "https://eco-pledgeafrica.com/echo-vert/le-role-crucial-des-femmes-dans-la-protection-de-lenvironnement-en-afrique/#:~:text=Collecte%20et%20recyclage%20des%20d%C3%A9chets,renouvelables%20comme%20les%20foyers%20solaires.",
    "Les femmes et le changement climatique" => "https://tnova.fr/ecologie/climat/les-femmes-et-le-changement-climatique/",
    "Etre femme en politique, ce qu’il faut savoir pour réussir mais qu’on ne vous dit pas" => "https://www.elle.fr/Elle-Active/Actualites/Etre-femme-en-politique-ce-qu-il-faut-savoir-pour-reussir-mais-qu-on-ne-vous-dit-pas-3822435",
    "Faits et chiffres : Le leadership et la participation des femmes à la vie politique" => "https://www.unwomen.org/fr/articles/faits-et-chiffres/faits-et-chiffres-le-leadership-et-la-participation-des-femmes-a-la-vie-politique#:~:text=Seulement%2018%20pays%20ont%20une,1er%20janvier%202024%20%5B4%5D",
    "Leadership et participation des femmes à la vie politique" => "https://www.unwomen.org/fr/what-we-do/leadership-and-political-participation",
    "Les femmes en politique" => "https://shs.cairn.info/revue-apres-demain-2013-2-page-24?lang=fr",
    "Femmes et politique" => "https://www.paricilademocratie.com/approfondir/femmes-societe-et-politique/881-femmes-et-politique",
    "Féminité et Estime de soi" => "https://www.psychologue.net/articles/feminite-et-estime-de-soi",
    "Psychologie féministe" => "https://fr.wikipedia.org/wiki/Psychologie_f%C3%A9ministe",
    "Pourquoi les femmes s’intéressent plus à la psychologie que les hommes?" => "https://www.huffingtonpost.fr/life/article/pourquoi-les-femmes-s-interessent-plus-a-la-psychologie-que-les-hommes-blog_189408.html",
    "Hommes-femmes : même cerveau, même psychologie ?" => "https://www.lesechos.fr/2017/09/hommes-femmes-meme-cerveau-meme-psychologie-177269",
    "DE LA CRITIQUE FÉMINISTE DE LA PSYCHOLOGIE À LA THÉRAPIE FÉMINISTE : DÉMOCRATISER LES PRATIQUES THÉRAPEUTIQUES" => "https://www.erudit.org/fr/revues/rqpsy/2022-v43-n3-rqpsy07552/1094895ar/",
    "Bien-Être" => "https://lapause.jho.fr/je-veux-prendre-soin-de-moi-et-de-mon-corps/bien-etre/1/",
    "L’industrie du bien-être n'est pas du côté des femmes. Elle nous détourne de ce qui nous fait réellement souffrir" => "https://theconversation.com/lindustrie-du-bien-etre-nest-pas-du-cote-des-femmes-elle-nous-detourne-de-ce-qui-nous-fait-reellement-souffrir-178727",
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
    "L’invisibilisation des femmes dans l’art et la culture, tentatives de compréhension" => "https://www.onufemmes.fr/nos-actualites/2021/7/9/linvisibilisation-des-femmes-dans-lart-et-la-culture-tentatives-de-comprehension",
    "Les femmes dans l’histoire de l’art (et la littérature jeunesse)" => "https://filledalbum.wordpress.com/2021/05/25/les-femmes-dans-lhistoire-de-lart-et-la-litterature-jeunesse/",
    "«La littérature et l’art, vecteurs essentiels» face aux violences faites aux femmes" => "https://www.culture.gouv.fr/regions/drac-ile-de-france/actualites/actualite-a-la-une/la-litterature-et-l-art-vecteurs-essentiels-face-aux-violences-faites-aux-femmes",
    "Des femmes qui lisent et de l'art" => "https://lasuperbenewsletter.substack.com/p/des-femmes-qui-lisent-et-de-lart",
    "Artistes femmes ni muses, ni soumises" => "https://www.connaissancedesarts.com/arts-expositions/artistes-femmes-ni-muses-ni-soumises-2-11133980/",
    "La place des femmes dans l’art" => "https://euradio.fr/emission/KYQz-la-cause-des-femmes-en-europe-jade-champetier/oQQl-la-place-des-femmes-dans-lart",
    "Littérature : un art encore largement dominé par les hommes" => "https://theconversation.com/litterature-un-art-encore-largement-domine-par-les-hommes-126561",
    "Femme dans l’art : toute une histoire" => "https://culturetvous.fr/informations-transversales/actualites/femme-dans-lart-toute-une-histoire-4194",
    "Déclaration des droits de la femme et de la citoyenne de Olympe de Gouges" => "https://gallica.bnf.fr/essentiels/anthologie/declaration-droits-femme-citoyenne-0",
    "Histoire du sport féminin - 1000 ans d’évolution (pas toujours)" => "https://conseilsport.decathlon.fr/histoire-du-sport-feminin-1000-ans-devolution-enfin-pas-toujours-avec-le-portrait-de-wilma-rudolph-en-bonus",
    "Sport féminin : les inégalités persistent !" => "https://www.oxfamfrance.org/inegalites-femmes-hommes/inegalites-femmes-sport/",
    "Cinq choses à savoir sur les femmes et le sport" => "https://www.unwomen.org/fr/nouvelles/article-explicatif/2024/07/cinq-choses-a-savoir-sur-les-femmes-et-le-sport",
    "Le sport féminin gagne du terrain" => "https://www.sports.gouv.fr/le-sport-feminin-gagne-du-terrain-3262",
    "Place des femmes dans le sport : on en est où ?" => "https://asptt.com/blog/article/place-des-femmes-dans-le-sport/ ",
    "Faits et chiffres : les femmes dans le sport" => "https://www.unwomen.org/fr/jeux-olympiques-de-paris-2024-une-nouvelle-ere-pour-les-femmes-dans-le-monde-du-sport/faits-et-chiffres-les-femmes-dans-le-sport",
    "Où en est l'égalité femmes hommes dans le sport ?" => "https://www.vie-publique.fr/parole-dexpert/290150-ou-en-est-legalite-femmes-hommes-dans-le-sport",
    "Femmes et sport : « J’ai dû me battre et me justifier deux fois plus car j’étais une femme »" => "https://www.lemonde.fr/sport/article/2023/03/06/femmes-et-sport-j-ai-du-me-battre-et-me-justifier-deux-fois-plus-car-j-etais-une-femme_6164284_3242.html",
    "Une lutte pour la visibilité du sport féminin" => "https://www.espace-sciences.org/sciences-ouest/420/dossier/une-lutte-pour-la-visibilite-du-sport-feminin"
];

ksort($articles, SORT_FLAG_CASE | SORT_STRING);

$parPage = 20;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$debut = ($page - 1) * $parPage;
$totalPages = ceil(count($articles) / $parPage);

$titresAvecLiens = array_slice($articles, $debut, $parPage, true);

echo "<ul style='list-style-type: disc; padding-left: 40px;'>";
foreach ($titresAvecLiens as $titre => $url) {
    echo "<li style='margin-bottom: 10px;'><a href='{$url}' target='_blank'>{$titre}</a></li>";
}
echo "</ul>";

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
