<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=empowerher_db;charset=utf8', 'root', '');

// poser une question
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["question"])) {
    $question = htmlspecialchars($_POST["question"]);

    $stmt = $pdo->prepare("INSERT INTO forum_sujets (titre, forum) VALUES (?, 'general')");
    $stmt->execute([$question]);

    header("Location: forum.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum et Espace communautaire - EmpowHer</title>
    <style>
        body { font-family: 'Times New Roman', serif; margin: 0; padding: 0; background-color: #fbfcfc; display: flex; flex-direction: column; min-height: 100vh; }
        header { display: flex; justify-content: space-between; align-items: center; padding: 20px; background-color: #ca83f7; }
        header h1 { margin: 0; text-align: center; flex-grow: 1; }
        .banner { width: 100%; height: 200px; background-image: url('banner.png'); background-size: cover; background-position: center; }
        .header-title { display: flex; justify-content: space-between; align-items: center; padding: 20px; width: 100%; }
        .header-title h2 { font-weight: bold; margin: 0; text-align: center; flex-grow: 1; }
        .search-container { margin-left: auto; margin-right: 20px; }
        .search-container input { width: 200px; padding: 5px; }
        .container { display: flex; flex-grow: 1; width: 100%; margin-top: 0; }
        .sidebar { width: 200px; padding: 20px; background-color: #fae4fc; border-right: 1px solid #ccc; display: flex; flex-direction: column; align-items: flex-start; }
        .sidebar h2 { margin-bottom: 10px; text-align: center; }
        .sidebar ul { list-style-type: none; padding: 0; margin: 0; width: 100%; }
        .sidebar li { width: 100%; }
        .sidebar li a { display: block; padding: 10px; text-align: left; text-decoration: none; color: inherit; }
        .sidebar li a:hover { background-color: #e0c1f7; }
        .main { flex-grow: 1; padding: 20px; display: flex; flex-direction: column; align-items: flex-start; }
        .discussion-section { width: 100%; margin: 20px 0; }
        .forum { margin-bottom: 20px; background: #fff; border: 1px solid #ccc; padding: 10px; width: 100%; }
        .forum h4 { margin: 0 0 10px; color: #333; }
        .forum ul { list-style-type: none; padding-left: 0; }
        .forum ul li { margin-bottom: 5px; }
        .forum ul li a { color: #444; text-decoration: none; }
        .forum ul li a:hover { text-decoration: underline; }
        .question-form { width: 100%; margin: 20px 0; }
        .question-form input { padding: 5px; width: calc(100% - 110px); }
        .question-form button { padding: 5px 10px; margin-left: 10px; }
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

<div class="container">
    <aside class="sidebar">
        <h2>Recherche par sujet</h2>
        <ul>
            <li><a href="forum.php?categorie=general">Général</a></li>
            <li><a href="forum.php?categorie=sante">Santé</a></li>
            <li><a href="forum.php?categorie=carriere">Carrière</a></li>
            <li><a href="forum.php?categorie=education">Éducation</a></li>
            <li><a href="forum.php?categorie=activisme">Activisme</a></li>
        </ul>
    </aside>

    <main class="main">
        <div class="header-title">
            <h2>Forum et Espace communautaire</h2>
        </div>

        <div class="discussion-section">
            <a href="nouveau_sujet.php" style="margin-bottom: 20px; display: inline-block; background-color: #ca83f7; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">Créer un sujet</a>

            <div class="forum">
                <h3>Les discussions</h3>
                <ul id="sujetsList">
                <?php
                $categorie = isset($_GET['categorie']) ? $_GET['categorie'] : '';
                if ($categorie) {
                    $stmt = $pdo->prepare("SELECT * FROM forum_sujets WHERE forum = ? ORDER BY date_creation DESC");
                    $stmt->execute([strtolower($categorie)]);
                } else {
                    $stmt = $pdo->query("SELECT * FROM forum_sujets ORDER BY date_creation DESC");
                }
                while ($row = $stmt->fetch()) {
                    echo '<li><a href="discussion.php?id=' . $row['id'] . '">' . htmlspecialchars($row['titre']) . '</a> - ' . date('d/m/Y H:i', strtotime($row['date_creation'])) . '</li>';
                }
                ?>
                </ul>
            </div>
        </div>

        <?php if (!isset($_GET['categorie'])): ?>
        <div class="question-form">
            <h3>Formulaire pour poser une question</h3>
            <form method="POST" action="forum.php">
                <input type="text" name="question" placeholder="Posez votre question ici..." required>
                <button type="submit">Envoyer</button>
            </form>
        </div>
        <?php endif; ?>

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
document.getElementById('searchInput').addEventListener('input', function () {
    let filter = this.value.toLowerCase();
    let sujets = document.querySelectorAll('#sujetsList li');
    sujets.forEach(function (sujet) {
        if (sujet.innerText.toLowerCase().includes(filter)) {
            sujet.style.display = '';
        } else {
            sujet.style.display = 'none';
        }
    });
});
</script>

</body>
</html>
