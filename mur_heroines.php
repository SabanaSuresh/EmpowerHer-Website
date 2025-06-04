<?php
session_start();
$heroines = include('heroines.php');

// transformer le domaine en nom de classique
function domaine_to_class($domaine) {
    $domaine = strtolower($domaine);
    $domaine = str_replace(
        [' ', 'é', 'è', 'ê', 'ë', 'É', 'à', 'â', 'ä', 'ç', 'ô', 'ö', 'ù', 'û', 'ü', 'œ', 'î', 'ï'],
        ['-', 'e', 'e', 'e', 'e', 'e', 'a', 'a', 'a', 'c', 'o', 'o', 'u', 'u', 'u', 'oe', 'i', 'i'],
        $domaine
    );
    return preg_replace('/[^a-z0-9\-]/', '', $domaine);
}

// trie par ordre alphabétique
uasort($heroines, function ($a, $b) {
    return strcasecmp($a['nom'], $b['nom']);
});
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mur d'Héroïnes - EmpowHer</title>
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
        }
        .sidebar h2 {
            text-align: center;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar li a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: inherit;
        }
        .sidebar li a:hover {
            background-color: #e0c1f7;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            text-align: center;
        }
        .person {
            margin: 10px auto;
            padding: 10px;
            background: #fff;
            border: 1px solid #ccc;
            width: 80%;
            display: none;
        }
        .pagination {
            margin: 20px 0;
        }
        .pagination a {
            margin: 0 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .pagination a.active {
            font-weight: bold;
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
            <a href="profil.php"><button><?php echo htmlspecialchars($_SESSION["username"]); ?></button></a>
        <?php else: ?>
            <a href="connexion.html"><button>Créer compte / Connexion</button></a>
        <?php endif; ?>
    </nav>
</header>

<div class="banner"></div>

<div class="container">
    <aside class="sidebar">
        <h2>Recherche par thématique</h2>
        <ul>
            <li><a href="#" data-filtre="all">Toutes</a></li>
            <?php
            $domaines = [];
            foreach ($heroines as $hero) {
                $d = $hero['domaine'];
                $domaines[$d] = domaine_to_class($d);
            }
            foreach ($domaines as $nom => $class) {
                echo '<li><a href="#" data-filtre="' . $class . '">' . htmlspecialchars($nom) . '</a></li>';
            }
            ?>
        </ul>
    </aside>

    <main class="content">
        <div class="search-container" style="display: flex; justify-content: space-between; align-items: center; padding: 10px 20px; width: 100%; box-sizing: border-box;">
            <h2 style="flex-grow: 1; text-align: center; margin: 0;">Mur d'Héroïnes</h2>
            <input type="text" id="searchInput" placeholder="Barre de recherche" style="width: 200px; padding: 5px; margin-left: 20px;">
        </div>

        <div id="people-list">
            <?php foreach ($heroines as $id => $hero): 
                $class = domaine_to_class($hero['domaine']);
            ?>
                <div class="person <?php echo $class; ?>">
                    <a href="heroine.php?id=<?php echo urlencode($id); ?>">
                        <?php echo htmlspecialchars($hero["nom"]); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="pagination" id="pagination"></div>
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
    const perPage = 11;
    let currentPage = 1;
    let currentFilter = "all";
    const searchInput = document.getElementById("searchInput");

    const allPeople = Array.from(document.querySelectorAll(".person"));
    const pagination = document.getElementById("pagination");

    function filterAndPaginate() {
        const searchQuery = searchInput.value.trim().toLowerCase();

        const filtered = allPeople.filter(p => {
            const matchesFilter = currentFilter === "all" || p.classList.contains(currentFilter);
            const matchesSearch = p.textContent.toLowerCase().includes(searchQuery);
            return matchesFilter && matchesSearch;
        });

        allPeople.forEach(p => p.style.display = "none");

        const totalPages = Math.ceil(filtered.length / perPage);
        const start = (currentPage - 1) * perPage;
        const end = start + perPage;

        filtered.slice(start, end).forEach(p => p.style.display = "block");

        pagination.innerHTML = "";
        for (let i = 1; i <= totalPages; i++) {
            const link = document.createElement("a");
            link.textContent = i;
            link.href = "#";
            if (i === currentPage) link.classList.add("active");
            link.addEventListener("click", e => {
                e.preventDefault();
                currentPage = i;
                filterAndPaginate();
                window.scrollTo(0, 0);
            });
            pagination.appendChild(link);
        }
    }

    document.querySelectorAll(".sidebar a").forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            currentFilter = this.dataset.filtre;
            currentPage = 1;
            filterAndPaginate();
        });
    });

    searchInput.addEventListener("input", function () {
        currentPage = 1;
        filterAndPaginate();
    });

    filterAndPaginate();
});
</script>

</body>
</html>
