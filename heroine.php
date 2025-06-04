<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=empowerher_db;charset=utf8', 'root', '');

$heroines = include('heroines.php');
$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id || !isset($heroines[$id])) {
    echo "<p>Héroïne non trouvée.</p>";
    exit;
}

$hero = $heroines[$id];
// ajout fav
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ajouter_favori"]) && isset($_SESSION["username"])) {
    $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE username = ?");
    $stmt->execute([$_SESSION["username"]]);
    $user = $stmt->fetch();

    if ($user) {
        $stmt = $pdo->prepare("INSERT INTO favoris (utilisateur_id, type_favori, id_favori) VALUES (?, 'heroine', ?)");
        $stmt->execute([$user['id'], $id]);

        header("Location: heroine.php?id=" . urlencode($id));
        exit();
    }
}


// enregistrer comm
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["commentaire"]) && !empty(trim($_POST["commentaire"]))) {
    $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE username = ?");
    $stmt->execute([$_SESSION["username"]]);
    $user = $stmt->fetch();
    $userId = $user['id'];

    $contenu = htmlspecialchars($_POST["commentaire"]);
    $stmt = $pdo->prepare("INSERT INTO heroine_commentaires (id_heroine, user_id, contenu) VALUES (?, ?, ?)");
    $stmt->execute([$id, $userId, $contenu]);

    header("Location: heroine.php?id=" . urlencode($id));
    exit();
}

// recup les comms
$stmt = $pdo->prepare("SELECT c.*, u.username FROM heroine_commentaires c JOIN utilisateurs u ON c.user_id = u.id WHERE c.id_heroine = ? ORDER BY c.date_commentaire DESC");
$stmt->execute([$id]);
$commentaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["supprimer_commentaire_id"]) && isset($_SESSION["username"]) && $_SESSION["username"] === "SabanaSuresh") {
    $idCommentaire = intval($_POST["supprimer_commentaire_id"]);
    $stmt = $pdo->prepare("DELETE FROM heroine_commentaires WHERE id = ?");
    $stmt->execute([$idCommentaire]);
    
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($hero["nom"]); ?> - EmpowHer</title>
    <style>
        body { font-family: 'Times New Roman', serif; margin: 0; padding: 0; background-color: #fbfcfc; display: flex; flex-direction: column; min-height: 100vh; }
        header { display: flex; justify-content: space-between; align-items: center; padding: 20px; background-color: #ca83f7; }
        header h1 { margin: 0; text-align: center; flex-grow: 1; }
        nav { display: flex; flex-direction: column; align-items: flex-end; }
        nav button { margin-bottom: 10px; }
        .banner { width: 100%; height: 200px; background-image: url('banner.png'); background-size: cover; background-position: center; }
        .main-content { padding: 30px; flex-grow: 1; max-width: 900px; margin: auto; }
        .titre { font-weight: bold; font-size: 24px; text-align: center; margin-bottom: 10px; }
        .infos { display: flex; justify-content: space-between; font-size: 14px; margin-bottom: 30px; color: #444; }
        .media { text-align: center; margin: 20px 0; }
        .media img { max-width: 100%; height: auto; }
        .description { font-size: 16px; margin-bottom: 20px; line-height: 1.6; }
        .anecdote { font-style: italic; background-color: #f0e6ff; padding: 10px; border-left: 4px solid #ca83f7; margin-bottom: 30px; }
        .comments-section { margin-top: 50px; width: 100%; }
        .comments-section textarea { width: 100%; height: 100px; padding: 10px; font-family: 'Times New Roman', serif; margin-bottom: 10px; }
        .comment-block { background-color: #eee; padding: 10px; margin-top: 10px; border-radius: 5px; }
        .comment-meta { font-size: 12px; color: #666; margin-bottom: 5px; }
        .footer-actions { text-align: right; margin-top: 20px; }
        .footer-actions a { margin-left: 10px; text-decoration: none; }
        .retour { margin-top: 40px; }
        .retour a { text-decoration: none; color: #333; font-size: 14px; }
        .footer { text-align: center; padding: 10px; background-color: #ca83f7; margin-top: auto; }
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

<div class="main-content">
    <div class="titre"><?php echo htmlspecialchars($hero["nom"]); ?></div>

    <div class="infos">
        <div><?php echo htmlspecialchars($hero["domaine"]); ?></div>
        <div><?php echo htmlspecialchars($hero["lieu"]); ?></div>
    </div>

    <div class="media">
        <img src="<?php echo htmlspecialchars($hero["media"]); ?>" alt="<?php echo htmlspecialchars($hero["nom"]); ?>">
    </div>

    <div class="description"><?php echo nl2br(htmlspecialchars($hero["biographie"])); ?></div>

    <div class="anecdote"><strong>Anecdote / Impact :</strong><br><?php echo nl2br(htmlspecialchars($hero["anecdote"])); ?></div>

    <div class="comments-section">
        <form method="POST">
            <textarea name="commentaire" placeholder="Votre commentaire..." required></textarea>
            <button type="submit" style="margin-top: 5px; padding: 5px 10px;">Envoyer</button>
        </form>

        <?php if (count($commentaires) > 0): ?>
            <h3 style="margin-top: 30px;">Commentaires :</h3>
            <?php foreach ($commentaires as $com): ?>
                <div class="comment-block">
                    <div class="comment-meta">
                        <?php echo htmlspecialchars($com['username']); ?> – <?php echo date('d/m/Y H:i', strtotime($com['date_commentaire'])); ?>
                    </div>
                    <div>
                        <?php echo nl2br(htmlspecialchars($com['contenu'])); ?>

                        <?php if (isset($_SESSION['username']) && $_SESSION['username'] === 'SabanaSuresh'): ?>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="supprimer_commentaire_id" value="<?php echo $com['id']; ?>">
                                <button type="submit" style="margin-left:10px; background-color:red; color:white; border:none; padding:2px 5px;">Supprimer</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="footer-actions">
        <?php if (isset($_SESSION["username"])): ?>
            <form method="POST" style="display:inline;">
                <input type="hidden" name="ajouter_favori" value="1">
                <button type="submit" style="background:none; border:none; color:inherit; cursor:pointer;">⭐ Ajouter aux favoris</button>
            </form>
        <?php else: ?>
            <a href="connexion.html" style="color: inherit;">⭐ Connectez-vous pour ajouter en favori</a>
        <?php endif; ?>

        <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode($hero["nom"]); ?>&url=<?php echo urlencode('https://tonsite.com/heroine.php?id=' . urlencode($id)); ?>" target="_blank">Partager sur X (Twitter)</a>
    </div>

    <div class="retour">
        ← <a href="mur_heroines.php">Retour au mur d’héroïnes</a>
    </div>
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
