<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dictionnaire du féminisme - EmpowHer</title>
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
        .header-title {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 0;
        }
        .header-title h2 {
            font-weight: bold;
            margin: 0; /* Espacement autour du titre */
            text-align: center; /* Centrer le texte */
            flex-grow: 1; /* Permet au titre de prendre l'espace disponible */
        }
        .search-container {
            margin-right: 20px; 
        }
        .search-container input {
            width: 200px; 
            padding: 5px;
        }
        .content {
            padding: 20px;
            flex-grow: 1;
        }
        .alphabetical-list {
            margin-bottom: 20px;
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
            width: 90%; 
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
        <h2>Recherche par lettre</h2>
        <ul>
            <li><a href="?lettre=A">A</a></li>
            <li><a href="?lettre=B">B</a></li>
            <li><a href="?lettre=C">C</a></li>
            <li><a href="?lettre=D">D</a></li>
            <li><a href="?lettre=E">E</a></li>
            <li><a href="?lettre=F">F</a></li>
            <li><a href="?lettre=G">G</a></li>
            <li><a href="?lettre=H">H</a></li>
            <li><a href="?lettre=I">I</a></li>
            <li><a href="?lettre=J">J</a></li>
            <li><a href="?lettre=K">K</a></li>
            <li><a href="?lettre=L">L</a></li>
            <li><a href="?lettre=M">M</a></li>
            <li><a href="?lettre=N">N</a></li>
            <li><a href="?lettre=O">O</a></li>
            <li><a href="?lettre=P">P</a></li>
            <li><a href="?lettre=Q">Q</a></li>
            <li><a href="?lettre=R">R</a></li>
            <li><a href="?lettre=S">S</a></li>
            <li><a href="?lettre=T">T</a></li>
            <li><a href="?lettre=U">U</a></li>
            <li><a href="?lettre=V">V</a></li>
            <li><a href="?lettre=W">W</a></li>
            <li><a href="?lettre=X">X</a></li>
            <li><a href="?lettre=Y">Y</a></li>
            <li><a href="?lettre=Z">Z</a></li>
        </ul>
    </aside>

    <main class="main" style="flex-grow: 1;">
        <div class="header-title">
            <h2>Dictionnaire du féminisme</h2>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Barre de recherche">
            </div>
        </div>

        <div class="content">
            <div class="alphabetical-list">
                <ul style="list-style-type: none; padding-left: 20px;">
                    <?php
                    $mots = [
                        "Activisme",
                        "Activisme numérique",
                        "Affectivité",
                        "Aliénation",
                        "Androcentrisme",
                        "Autonomie",
                        "Autonomisation",
                        "Biais sexiste",
                        "Binarité de genre",
                        "Body positivity",
                        "Chauvinisme",
                        "Cisnormativioté",
                        "Colonialisme",
                        "Comportement genré",
                        "Consentement",
                        "Consentement éclairé",
                        "Critique féministe",
                        "Déconstruction",
                        "Discrimination",
                        "Discrimination systémique",
                        "Écoféminisme",
                        "Droits reproductifs",
                        "Éducation sexuelle",
                        "Égalité",
                        "Égalité des genres", 
                        "Empathie",
                        "Empowerment",
                        "Empowerment économique",
                        "Féminisme",
                        "Féminisme décolonial",
                        "Féminisme inclusif",
                        "Féminisme intersectionnel",
                        "Féminisme noir",
                        "Féminisme queer",
                        "Féminisme radical",
                        "Féminisme socialiste",
                        "Galibot",
                        "Gender",
                        "Gender fluidity",
                        "Gynécologie sociale",
                        "Harcèlement",
                        "Harcèlement de rue",
                        "Hétérosexualité",
                        "Hétéronormativité",
                        "Identité de genre",
                        "Inclusivité",
                        "Inégalités",
                        "Intersectionnalité",
                        "LGBTQ+",
                        "Lutte des classes",
                        "Masculinisme",
                        "Microagressions",
                        "Misogynie",
                        "Mutilations génitales",
                        "Non-binarité",
                        "Patriarcat",
                        "Paternité engagée",
                        "Patriarcat hégémonique",
                        "Patrilinéarité",
                        "Paternalisme",
                        "Racisme systémique",
                        "Représentation",
                        "Réseau de soutien",
                        "Rights",
                        "Sexe",
                        "Sexisme",
                        "Sexualité positive",
                        "Sexualité intersectionnelle",
                        "Sociologie du genre",
                        "Stéréotype de genre",
                        "Toxicité de la masculinité",
                        "Transphobie",
                        "Victimisation",
                        "Violence conjugale",
                        "Violence sexuelle",
                        "Women's empowerment"
                    ];
                    try {
                        $pdo = new PDO('mysql:host=localhost;dbname=empowerher_db;charset=utf8', 'root', '');
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $pdo->query("SELECT mot FROM mots");
                        $motsBdd = $stmt->fetchAll(PDO::FETCH_COLUMN);
                        
                        foreach ($motsBdd as $motBdd) {
                            if (!in_array($motBdd, $mots)) {
                                $mots[] = $motBdd;
                            }
                        }
                    } catch (PDOException $e) {
                    }                    
                    $definitions = include('definitions.php');
                    $lettre = isset($_GET['lettre']) ? strtoupper($_GET['lettre']) : null;

                    
                    if ($lettre) {
                        $mots = array_filter($mots, function ($mot) use ($lettre) {
                            return strtoupper(mb_substr($mot, 0, 1)) === $lettre;
                        });
                    }


                    sort($mots, SORT_FLAG_CASE | SORT_STRING); 
                    $parPage = 20;
                    $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
                    $totalPages = ceil(count($mots) / $parPage);
                    $debut = ($page - 1) * $parPage;
                    $motsAffiches = array_slice($mots, $debut, $parPage);
                    
                    
                    echo "<ul style='list-style-type: disc; padding-left: 40px;'>";
                    foreach ($motsAffiches as $mot) {
                        $urlMot = urlencode($mot);
                        echo "<li style='margin-bottom: 8px;'><a href='definition.php?mot={$urlMot}'>{$mot}</a></li>";
                    }
                    echo "</ul>";
                    
                    echo "<div style='text-align:center; margin-top:20px;'>";
                    for ($i = 1; $i <= $totalPages; $i++) {
                        if ($i == $page) {
                            echo "<strong style='margin: 0 5px;'>$i</strong>";
                        } else {
                            echo "<a href='?page=$i' style='margin: 0 5px;'>$i</a>";
                        }
                    }
                    echo "</div>";
                    ?>
                </ul>
            </div>

            </div>
            <div class="suggest-resource">
                <form method="POST">
                    <input type="text" id="propositionMot" name="propositions_mots" placeholder="Proposer un nouveau mot" required>
                </form>
            </div>
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
// barre de recherche
const searchInput = document.getElementById('searchInput');
const wordsList = document.querySelector('.alphabetical-list ul');
const pagination = document.querySelector('.alphabetical-list div');

const allWords = <?php echo json_encode($mots); ?>;

function afficherMots(mots) {
    wordsList.innerHTML = '';
    mots.forEach(mot => {
        const li = document.createElement('li');
        li.style.marginBottom = '8px';
        const a = document.createElement('a');
        a.href = 'definition.php?mot=' + encodeURIComponent(mot);
        a.textContent = mot;
        li.appendChild(a);
        wordsList.appendChild(li);
    });
}

searchInput.addEventListener('input', function () {
    const query = this.value.trim().toLowerCase();

    if (query === '') {
        location.reload(); // Si barre de recherche vide
    } else {
        const filtered = allWords.filter(mot => mot.toLowerCase().includes(query));
        afficherMots(filtered);
        pagination.style.display = 'none'; 
    }
});
</script>

<script>
const proposeWordInput = document.getElementById('propositionMot');

proposeWordInput.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        e.preventDefault(); // pas recharger la page
        const value = this.value.trim();
        if (value.length > 0) {
            fetch('proposer.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'type=mot&contenu=' + encodeURIComponent(value)
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