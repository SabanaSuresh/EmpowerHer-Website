<?php
session_start();

if (!isset($_SESSION["username"]) || $_SESSION["username"] !== "SabanaSuresh") {
    header("Location: site.php");
    exit;
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=empowerher_db;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

if (isset($_GET['valider_evenement'])) {
    $id = intval($_GET['valider_evenement']);
    $stmt = $pdo->prepare("SELECT * FROM proposition_evenement WHERE id = ?");
    $stmt->execute([$id]);
    $proposition = $stmt->fetch();

    if ($proposition) {
        $titre = trim($proposition['texte']); 

        if (!empty($titre)) {
            $stmtInsert = $pdo->prepare("INSERT INTO evenements (titre, annee, lieu, description, lien) VALUES (?, NULL, NULL, NULL, NULL)");
            $stmtInsert->execute([$titre]);
        }

        $stmtDelete = $pdo->prepare("DELETE FROM proposition_evenement WHERE id = ?");
        $stmtDelete->execute([$id]);
    }

    header("Location: admin.php");
    exit;
}

if (isset($_GET['valider_loi'])) {
    $id = intval($_GET['valider_loi']);
    $stmt = $pdo->prepare("SELECT * FROM proposition_loi WHERE id = ?");
    $stmt->execute([$id]);
    $proposition = $stmt->fetch();

    if ($proposition) {
        $stmtInsert = $pdo->prepare("INSERT INTO lois (titre) VALUES (?)");
        $stmtInsert->execute([
            $proposition['texte']
        ]);

        $stmtDelete = $pdo->prepare("DELETE FROM proposition_loi WHERE id = ?");
        $stmtDelete->execute([$id]);
    }

    header("Location: admin.php");
    exit;
}


if (isset($_GET['valider_ressource'])) {
    $id = intval($_GET['valider_ressource']);
    $stmt = $pdo->prepare("SELECT * FROM propositions_ressources WHERE id = ?");
    $stmt->execute([$id]);
    $proposition = $stmt->fetch();

    if ($proposition) {
        $texte = $proposition['texte'];
        $parts = explode('|', $texte, 2);
        $titre = isset($parts[0]) ? trim($parts[0]) : '';
        $lien = isset($parts[1]) ? trim($parts[1]) : '';

        if (!empty($titre) && !empty($lien)) {
            $stmtInsert = $pdo->prepare("INSERT INTO ressources (titre, lien, description) VALUES (?, ?, ?)");
            $stmtInsert->execute([$titre, $lien, $texte]);
        }

        $stmtDelete = $pdo->prepare("DELETE FROM propositions_ressources WHERE id = ?");
        $stmtDelete->execute([$id]);
    }
    header("Location: admin.php");
    exit;
}

if (isset($_GET['valider_mot'])) {
    $id = intval($_GET['valider_mot']);
    $stmt = $pdo->prepare("SELECT * FROM propositions_mots WHERE id = ?");
    $stmt->execute([$id]);
    $proposition = $stmt->fetch();

    if ($proposition) {
        $stmtInsert = $pdo->prepare("INSERT INTO mots (mot) VALUES (?)");
        $stmtInsert->execute([$proposition['mot']]);

        $stmtDelete = $pdo->prepare("DELETE FROM propositions_mots WHERE id = ?");
        $stmtDelete->execute([$id]);
    }
    header("Location: admin.php");
    exit;
}

if (isset($_GET['delete']) && isset($_GET['table'])) {
    $id = intval($_GET['delete']);
    $table = preg_replace('/[^a-z_]/', '', $_GET['table']);

    if (in_array($table, ['proposition_evenement', 'proposition_loi', 'propositions_ressources', 'propositions_mots'])) {
        $stmt = $pdo->prepare("DELETE FROM $table WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: admin.php");
        exit;
    }
}

function getPropositions($pdo, $tableName) {
    $stmt = $pdo->query("SELECT * FROM $tableName ORDER BY date_proposition DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$propositions_evenements = getPropositions($pdo, 'proposition_evenement');
$propositions_lois = getPropositions($pdo, 'proposition_loi');
$propositions_ressources = getPropositions($pdo, 'propositions_ressources');
$propositions_mots = getPropositions($pdo, 'propositions_mots');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - EmpowHer</title>
    <style>
        body { font-family: 'Times New Roman', serif; margin: 0; padding: 0; background-color: #fbfcfc; display: flex; flex-direction: column; min-height: 100vh; }
        header { display: flex; justify-content: space-between; align-items: center; padding: 20px; background-color: #ca83f7; }
        header h1 { margin: 0; text-align: center; flex-grow: 1; }
        nav { display: flex; flex-direction: column; align-items: flex-end; }
        nav button { margin-bottom: 10px; }
        .banner { width: 100%; height: 200px; background-image: url('banner.png'); background-size: cover; background-position: center; }
        .main { flex-grow: 1; padding: 20px; }
        footer { text-align: center; padding: 10px; background-color: #ca83f7; margin-top: auto; }
        .footer-links { display: flex; justify-content: space-between; width: 100%; max-width: 800px; margin: 0 auto; }
        .propositions-section { margin-bottom: 50px; }
        .propositions-section h2 { margin-bottom: 20px; color: #7d3c98; }
        .table-propositions { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .table-propositions th, .table-propositions td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        .table-propositions th { background-color: #fae4fc; }
        .table-propositions tr:nth-child(even) { background-color: #f9f9f9; }
        .delete-button { color: red; text-decoration: none; font-weight: bold; }
    </style>
    <script>
    function confirmDelete(url) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet élément ?")) {
            window.location.href = url;
        }
    }
    </script>
</head>
<body>

<header>
    <a href="site.php" style="display: flex; align-items: center; text-decoration: none; color: inherit; flex-grow: 1; justify-content: center;">
        <img src="logo.png" alt="Logo" width="50">
        <h1 style="margin-left: 10px;">EmpowHer</h1>
    </a>
    <nav>
        <?php if (isset($_SESSION["username"])): ?>
            <a href="profil.php" style="text-decoration: none; color: inherit;"><button><?php echo htmlspecialchars($_SESSION["username"]); ?></button></a>
        <?php else: ?>
            <a href="connexion.html" style="text-decoration: none; color: inherit;"><button>Créer compte / Connexion</button></a>
        <?php endif; ?>
    </nav>
</header>

<div class="banner"></div>

<main class="main">
    <h2 style="text-align:center; margin-bottom: 40px;">Panneau d'administration - Propositions</h2>

    <?php
    function renderPropositions($propositions, $table) {
        echo "<div class='propositions-section'>";

        $noms = [
            'proposition_evenement' => "Propositions d'Événements",
            'proposition_loi' => "Propositions de Lois",
            'propositions_ressources' => "Propositions de Ressources",
            'propositions_mots' => "Propositions de Mots",
        ];

        $titre = $noms[$table] ?? $table;
        echo "<h2>$titre</h2>";
        echo "<table class='table-propositions'><thead><tr><th>ID</th><th>Contenu</th><th>Date</th><th>Action</th></tr></thead><tbody>";

        foreach ($propositions as $prop) {
            $deleteUrl = "admin.php?delete={$prop['id']}&table=$table";
            $validerUrl = null;

            if ($table === 'proposition_evenement') {
                $validerUrl = "admin.php?valider_evenement={$prop['id']}";
            } elseif ($table === 'proposition_loi') {
                $validerUrl = "admin.php?valider_loi={$prop['id']}";
            } elseif ($table === 'propositions_ressources') {
                $validerUrl = "admin.php?valider_ressource={$prop['id']}";
            } elseif ($table === 'propositions_mots') {
                $validerUrl = "admin.php?valider_mot={$prop['id']}";
            }

            echo "<tr><td>{$prop['id']}</td><td>";
            echo isset($prop['texte']) ? htmlspecialchars($prop['texte']) : (isset($prop['mot']) ? htmlspecialchars($prop['mot']) : '—');
            echo "</td><td>{$prop['date_proposition']}</td><td>";
            echo "<a href='#' class='delete-button' onclick=\"confirmDelete('$deleteUrl')\">Supprimer</a>";
            if ($validerUrl) {
                echo " | <a href='$validerUrl' style='color:green;'>Valider</a>";
            }
            echo "</td></tr>";
        }

        echo "</tbody></table></div>";
    }

    renderPropositions($propositions_evenements, 'proposition_evenement');
    renderPropositions($propositions_lois, 'proposition_loi');
    renderPropositions($propositions_ressources, 'propositions_ressources');
    renderPropositions($propositions_mots, 'propositions_mots');
    ?>
</main>

<footer class="footer">
    <div class="footer-links">
        <a href="liens_utiles.php">Liens utiles</a> <span>|</span>
        <a href="contact.php">Contact</a> <span>|</span>
        <a href="politique.php">Politique de confidentialité</a>
    </div>
</footer>

</body>
</html>
