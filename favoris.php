<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=empowerher_db;charset=utf8', 'root', '');

// verifier si l'utilisateur est connecté
if (!isset($_SESSION["username"])) {
    header("Location: connexion.html");
    exit;
}

// recup l'utilisateur
$stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE username = ?");
$stmt->execute([$_SESSION["username"]]);
$user = $stmt->fetch();
if (!$user) {
    die("Utilisateur introuvable.");
}

// supp fav
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["supprimer_favori_id"])) {
    $idFavori = intval($_POST["supprimer_favori_id"]);
    $stmt = $pdo->prepare("DELETE FROM favoris WHERE id = ? AND utilisateur_id = ?");
    $stmt->execute([$idFavori, $user['id']]);
    header("Location: favoris.php");
    exit();
}

$evenements = include('evenements.php');
$heroines = include('heroines.php');

// recup les fav
$stmt = $pdo->prepare("SELECT * FROM favoris WHERE utilisateur_id = ? ORDER BY date_ajout DESC");
$stmt->execute([$user['id']]);
$favoris = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowHer - Mes Favoris</title>
    <style>
        body { font-family: 'Times New Roman', serif; margin: 0; padding: 0; background-color: #fbfcfc; display: flex; flex-direction: column; min-height: 100vh; }
        header { display: flex; justify-content: space-between; align-items: center; padding: 20px; background-color: #ca83f7; }
        header h1 { margin: 0; text-align: center; flex-grow: 1; }
        nav { display: flex; flex-direction: column; align-items: flex-end; }
        nav button { margin-bottom: 10px; }
        .banner { width: 100%; height: 200px; background-image: url('banner.png'); background-size: cover; background-position: center; }
        .container { display: flex; flex-grow: 1; min-height: 0; }
        .main { flex-grow: 1; padding: 20px; }
        .resources { margin-left: 20px; margin-bottom: 10px; font-weight: normal; }
        footer { text-align: center; padding: 10px; background-color: #ca83f7; margin-top: auto; }
        .footer-links { display: flex; justify-content: space-between; width: 100%; max-width: 800px; margin: 0 auto; }
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
    <main class="main">
        <section style="text-align: center;">
            <h2 style="margin-bottom: 40px;">⭐ Mes Favoris</h2>

            <?php if (count($favoris) > 0): ?>
                <?php $affiches = []; ?>
                <ul style="list-style: none; padding: 0;">
                    <?php foreach ($favoris as $fav): ?>
                        <?php
                        $cleUnique = $fav['type_favori'] . '_' . $fav['id_favori'];
                        if (in_array($cleUnique, $affiches)) {
                            continue;
                        }
                        $affiches[] = $cleUnique;

                        $link = "#";
                        $nom = htmlspecialchars($fav['id_favori']);

                        if ($fav['type_favori'] == "evenement") {
                            $link = "evenement.php?id=" . urlencode($fav['id_favori']);
                            if (isset($evenements[$fav['id_favori']]['titre'])) {
                                $nom = htmlspecialchars($evenements[$fav['id_favori']]['titre']);
                            }
                        } elseif ($fav['type_favori'] == "heroine") {
                            $link = "heroine.php?id=" . urlencode($fav['id_favori']);
                            if (isset($heroines[$fav['id_favori']]['nom'])) {
                                $nom = htmlspecialchars($heroines[$fav['id_favori']]['nom']);
                            }
                        } elseif ($fav['type_favori'] == "loi") {
                            $link = "loi.php?titre=" . urlencode($fav['id_favori']);
                            $nom = htmlspecialchars($fav['id_favori']);
                        }
                        ?>

                        <li style="margin-bottom: 10px;">
                            <a href="<?php echo $link; ?>"><?php echo ucfirst($fav['type_favori']); ?> favori - <?php echo $nom; ?></a>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="supprimer_favori_id" value="<?php echo $fav['id']; ?>">
                                <button type="submit" style="margin-left:10px; background-color:red; color:white; border:none; padding:2px 5px; cursor:pointer;">Supprimer</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Aucun favori enregistré pour l'instant.</p>
            <?php endif; ?>
        </section>
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

</body>
</html>
