<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frise Chronologique - EmpowHer</title>
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
            margin-left: 20px; 
        }
        .search-container input {
            width: 200px; 
            padding: 5px;
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
        .events {
            margin: 20px 0;
            width: 100%;
            text-align: center;
        }
        .event {
            margin: 10px 0;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
            width: 80%; 
            margin-left: auto;
            margin-right: auto; 
        }
        .add-event {
            width: 100%; 
            text-align: center;
            margin-top: 50px; 
            margin-bottom: 20px; 
        }
        .add-event input {
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
        <h2>Recherche par période</h2>
        <ul>
            <li><a href="#" data-filtre="prehistoire">Préhistoire</a></li>
            <li><a href="#" data-filtre="antiquite">Antiquité</a></li>
            <li><a href="#" data-filtre="moyen-age">Moyen Âge</a></li>
            <li><a href="#" data-filtre="temps-modernes">Temps Modernes</a></li>
            <li><a href="#" data-filtre="epoque-contemporaine">Époque contemporaine</a></li>
        </ul>
    </aside>

    <main class="content">
        <div class="header-title">
            <h2>Frise Chronologique</h2>
            <div class="search-container" style="margin-left: auto;">
                <input type="text" placeholder="Barre de recherche">
            </div>
        </div>

        <div class="events" id="liste-evenements">
            <div class="event prehistoire"><a href="evenement.php?id=event1">Vers 25 000 av. J.-C. : Création de la Vénus de Willendorf, statuette symbolisant la fécondité (Autriche)</a></div>
            <div class="event prehistoire"><a href="evenement.php?id=event2">Vers 6 000 av. J.-C. : Sociétés néolithiques matrilinéaires (ex. : cultures Cucuteni-Trypillia en Europe de l’Est)</a></div>
            <div class="event prehistoire"><a href="evenement.php?id=event3">Vers 5000 av. J.-C. : Hypothèse de sociétés gyno-centriques dans les cultures de l’Ancien Europe (hypothèse de Marija Gimbutas) </a></div>
            <div class="event antiquite"><a href="evenement.php?id=event4">Vers 2 350 av. J.-C. : Règne de Enheduanna, première autrice connue de l'histoire (Mésopotamie)</a></div>
            <div class="event antiquite"><a href="evenement.php?id=event5">Vers 1 800 av. J.-C. : Code d'Hammurabi inclut des lois concernant les droits des femmes mariées (Babylone)</a></div>
            <div class="event antiquite"><a href="evenement.php?id=event6">Vers 1 500 av. J.-C. : Règne de Hatchepsout, femme pharaon (Égypte)</a></div>
            <div class="event antiquite"><a href="evenement.php?id=event7">Vers 600 av. J.-C. : Sapho, poétesse et figure féminine influente (Grèce antique)</a></div>
            <div class="event antiquite"><a href="evenement.php?id=event8">5e siècle av. J.-C. : Aspasie de Milet, femme philosophe et politicienne influente (Athènes)</a></div>
            <div class="event antiquite"><a href="evenement.php?id=event9">450 av. J.-C. : Lois de Périclès à Athènes réduisant les droits des femmes citoyennes </a></div>
            <div class="event antiquite"><a href="evenement.php?id=event10">40 ap. J.-C. : Trưng Trắc et Trưng Nhị, sœurs vietnamiennes, mènent une révolte contre l’occupation chinoise </a></div>
            <div class="event antiquite"><a href="evenement.php?id=event11">61 ap. J.-C. : Reine Boudicca mène une rébellion contre l’Empire romain (Grande-Bretagne) </a></div>
            <div class="event antiquite"><a href="evenement.php?id=event12">Vers 100 ap. J.-C. : Lois romaines évoluent pour permettre aux femmes libres d’avoir plus d’autonomie légale (Rome)</a></div>
            <div class="event moyen-age"><a href="evenement.php?id=event13">622 : Khadija et Aïcha, figures féminines importantes dans les débuts de l'islam (Arabie)</a></div>
            <div class="event moyen-age"><a href="evenement.php?id=event14">979 : Fondation de l’école pour filles par Ælfthryth, reine d’Angleterre (Angleterre) </a></div>
            <div class="event moyen-age"><a href="evenement.php?id=event15">Vers 1100 : Début de l'accès à certaines fonctions religieuses pour les femmes dans les monastères (Europe)</a></div>
            <div class="event moyen-age"><a href="evenement.php?id=event16">1142 : Héloïse d’Argenteuil, philosophe et intellectuelle influente (France)</a></div>
            <div class="event moyen-age"><a href="evenement.php?id=event17">1150-1200 : Rédaction de poèmes et chansons par des Trobairitz, poétesses occitanes (France)</a></div>
            <div class="event moyen-age"><a href="evenement.php?id=event18">1250 : Fatima al-Fihri, fondatrice de l’Université Al Quaraouiyine (Maroc), parfois citée comme la première université au monde </a></div>
            <div class="event moyen-age"><a href="evenement.php?id=event19">1373 : Julienne de Norwich, première femme à écrire un livre en anglais (Angleterre) </a></div>
            <div class="event moyen-age"><a href="evenement.php?id=event20">Fin XIVe siècle : Participation féminine dans les guildes de métiers urbains (Italie, France, Flandres) </a></div>
            <div class="event moyen-age"><a href="evenement.php?id=event21">1431 : Procès et exécution de Jeanne d’Arc, figure religieuse et militaire (France)</a></div>
            <div class="event moyen-age"><a href="evenement.php?id=event22">1450-1500 : Multiplication des procès de sorcières, souvent femmes guérisseuses ou marginales (Europe) </a></div>
            <div class="event moyen-age"><a href="evenement.php?id=event23">1486 : Publication du Malleus Maleficarum, manuel d’inquisition qui participe à la chasse aux sorcières (Europe) </a></div>
            <div class="event moyen-age"><a href="evenement.php?id=event24">1488 : Christine de Pizan publie La Cité des Dames, défense pionnière des femmes (France)</a></div>
            <div class="event temps-modernes"><a href="evenement.php?id=event25">1526 : Argula von Grumbach, protestante, publie des lettres pour défendre la parole des femmes (Allemagne) </a></div>
            <div class="event temps-modernes"><a href="evenement.php?id=event26">1644 : Margaret Cavendish publie The Blazing World, une des premières œuvres de science-fiction (Angleterre)</a></div>
            <div class="event temps-modernes"><a href="evenement.php?id=event27">1673 : Ouverture de la première école de filles par les Ursulines (Nouvelle-France / Québec)</a></div>
            <div class="event temps-modernes"><a href="evenement.php?id=event28">1678 : Elena Cornaro Piscopia, première femme à obtenir un doctorat universitaire (Italie) </a></div>
            <div class="event temps-modernes"><a href="evenement.php?id=event29">1694 : Fondation de l’ordre des Sœurs de Saint-Joseph, éducation des jeunes filles (France)</a></div>
            <div class="event temps-modernes"><a href="evenement.php?id=event30">1739 : Création d’une école pour filles pauvres par les Ursulines à la Réunion</a></div>
            <div class="event temps-modernes"><a href="evenement.php?id=event31">1787 : Première pétition collective de femmes adressée à l’Assemblée (France) </a></div>
            <div class="event temps-modernes"><a href="evenement.php?id=event32">1787 : Abigail Adams écrit à son mari John Adams pour "se souvenir des femmes" dans la Constitution (États-Unis) </a></div>
            <div class="event temps-modernes"><a href="evenement.php?id=event33">1791 : Olympe de Gouges publie Déclaration des droits de la femme et de la citoyenne (France)</a></div>
            <div class="event temps-modernes"><a href="evenement.php?id=event34">1792 : Mary Wollstonecraft publie A Vindication of the Rights of Woman (Angleterre)</a></div>
            <div class="event temps-modernes"><a href="evenement.php?id=event35">1793 : Exécution d’Olympe de Gouges (France) – punie pour ses idées politiques féministes </a></div>
            <div class="event temps-modernes"><a href="evenement.php?id=event36">1795 : Théroigne de Méricourt milite pour un bataillon féminin révolutionnaire (France) </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event37">1832 : Flora Tristan milite pour les droits des femmes ouvrières (France / Pérou) </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event38">1833 : Oberlin College (États-Unis) accepte pour la première fois des étudiantes femmes </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event39">1848 : Première Convention pour les droits des femmes à Seneca Falls (États-Unis)</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event40">1851 : Discours “Ain’t I a Woman?” par Sojourner Truth à l’Ohio Women’s Convention (États-Unis) </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event41">1866 : Fondation de la première société suffragiste (Londres) </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event42">1869 : Droit de vote pour les femmes au Wyoming (États-Unis)</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event43">1879 : Accès à l’université pour les femmes (Suisse)</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event44">1889 : Fondation de la Women's International League for Peace and Freedom (International) </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event45">1893 : Le Nouvelle-Zélande accorde le droit de vote aux femmes (premier pays au monde)</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event46">1903 : Fondation de la Women’s Social and Political Union par les suffragettes (Royaume-Uni)</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event47">1906 : Le Finlande devient le premier pays européen à accorder le droit de vote aux femmes </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event48">1911 : Tragédie de l’usine Triangle Shirtwaist, mobilisation féminine ouvrière (États-Unis) </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event49">1919 : Droit de vote pour les femmes en Allemagne</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event50">1920 : Adoption du 19e amendement : droit de vote pour les femmes (États-Unis)</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event51">1929 : "Marche des femmes" à Lagos, protestation contre les taxes coloniales (Nigeria) </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event52">1931 : Droit de vote des femmes aux Canaries – avant même l’Espagne continentale </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event53">1937 : Première journée des femmes noires aux États-Unis organisée par Mary McLeod Bethune </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event54">1944 : Droit de vote pour les femmes (France)</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event55">1947 : Droit de vote pour les femmes au Japon </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event56">1951 : Création de la Commission de la condition de la femme à l’ONU </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event57">1952 : Droit de vote accordé aux femmes en Grèce</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event58">1956 : Code du statut personnel promulgué (Tunisie) – avancées majeures pour les droits des femmes</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event59">1960 : Droit de vote pour les femmes au Sénégal </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event60">1963 : Publication de The Feminine Mystique par Betty Friedan (États-Unis)</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event61">1969 : Création du Mouvement de libération des femmes en France (MLF) </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event62">1971 : Manifeste des 343 femmes déclarant avoir avorté (France)</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event63">1973 : Publication de "Our Bodies, Ourselves", révolution sur la santé des femmes (États-Unis) </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event64">1975 : Première Journée internationale des femmes reconnue par l’ONU </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event65">1979 : Adoption de la CEDAW, Convention internationale sur l’élimination des discriminations envers les femmes (ONU)</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event66">1981 : Loi sur l’égalité professionnelle entre femmes et hommes (France) </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event67">1985 : Convention de Nairobi sur les stratégies pour l’avancement des femmes (ONU) </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event68">1993 : Reconnaissance du viol comme crime de guerre au tribunal international pour l’ex-Yougoslavie</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event69">1994 : L’Afrique du Sud inscrit l’égalité de genre dans sa nouvelle Constitution post-apartheid </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event70">1995 : Conférence de Pékin, 4e conférence mondiale sur les femmes (Chine)</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event71">2004 : Loi française interdisant les discriminations salariales (France)</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event72">2005 : Loi anti-violence contre les femmes (Espagne) </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event73">2011 : Création de ONU Femmes, entité des Nations Unies pour l’égalité des sexes </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event74">2012 : Malala Yousafzai prend la parole pour l’éducation des filles (Pakistan)</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event75">2014 : Création du mouvement féministe Ni Una Menos contre les féminicides (Argentine) </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event76">2017 : Mouvement #MeToo mondial après les révélations sur Harvey Weinstein (International)</a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event77">2018 : Droit de conduire accordé aux femmes en Arabie saoudite </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event78">2020 : Marche des femmes en Pologne contre la régression du droit à l’avortement </a></div>
            <div class="event epoque-contemporaine"><a href="evenement.php?id=event79">2022 : Révolte autour de la mort de Mahsa Amini et mouvements "Femme, Vie, Liberté" (Iran / international) </a></div>
        </div>

        <div class="add-event">
            <form method="POST">
                <input type="text" id="proposeEventInput" name="proposition_evenement" placeholder="Proposer un nouvel événement">
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
document.addEventListener("DOMContentLoaded", function () {
    const eventsPerPage = 10;
    const allEvents = Array.from(document.querySelectorAll("#liste-evenements .event"));
    const paginationContainer = document.createElement("div");
    paginationContainer.id = "pagination";
    paginationContainer.style.textAlign = "center";
    paginationContainer.style.marginTop = "20px";
    document.getElementById("liste-evenements").appendChild(paginationContainer);

    function showPage(events, page) {
        events.forEach((event, index) => {
            event.style.display = (index >= (page - 1) * eventsPerPage && index < page * eventsPerPage) ? "block" : "none";
        });

        // pagination
        paginationContainer.innerHTML = "";
        const totalPages = Math.ceil(events.length / eventsPerPage);
        for (let i = 1; i <= totalPages; i++) {
            const link = document.createElement("a");
            link.href = "#";
            link.innerText = i;
            link.style.margin = "0 5px";
            if (i === page) link.style.fontWeight = "bold";
            link.addEventListener("click", function (e) {
                e.preventDefault();
                showPage(events, i);
            });
            paginationContainer.appendChild(link);
        }
    }

    showPage(allEvents, 1);

    // filtre par période
    document.querySelectorAll(".sidebar a").forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const filtre = this.dataset.filtre;

            let filtered = [];
            allEvents.forEach(event => {
                if (filtre === "all" || event.classList.contains(filtre)) {
                    event.style.display = "block";
                    filtered.push(event);
                } else {
                    event.style.display = "none";
                }
            });

            showPage(filtered, 1);
        });
    });

    // barre de recherche
    const searchInput = document.querySelector('.search-container input');
    searchInput.addEventListener('input', function () {
        const query = this.value.trim().toLowerCase();

        if (query === "") {
            showPage(allEvents, 1);
        } else {
            const filtered = allEvents.filter(event => event.innerText.toLowerCase().includes(query));
            filtered.forEach(event => event.style.display = "block");
            allEvents.forEach(event => {
                if (!filtered.includes(event)) {
                    event.style.display = "none";
                }
            });
            paginationContainer.innerHTML = "";
        }
    });
});
</script>

<script>
const proposeEventInput = document.getElementById('proposeEventInput');

proposeEventInput.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        e.preventDefault(); // bloquer
        const value = this.value.trim();
        if (value.length > 0) {
            fetch('proposer.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'type=evenement&contenu=' + encodeURIComponent(value)
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