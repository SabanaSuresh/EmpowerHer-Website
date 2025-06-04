<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=empowerher_db;charset=utf8', 'root', '');
$stmt = $pdo->query("SELECT * FROM devine_mot ORDER BY RAND() LIMIT 1");
$question = $stmt->fetch(PDO::FETCH_ASSOC);
$reponses = [$question['reponse_correcte'], $question['faux1'], $question['faux2'], $question['faux3']];
shuffle($reponses);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devine le mot - EmpowHer</title>
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

        .main {
            flex-grow: 1;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
        }

        .quiz-box {
            max-width: 600px;
            text-align: center;
        }

        .question {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .answers {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        button.answer {
            padding: 10px;
            background-color: #eee;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button.answer:hover {
            background-color: #ddd;
        }

        .result {
            margin-top: 20px;
            font-weight: bold;
        }

        .back-link {
            margin-top: 30px;
            display: block;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            color: #333;
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

<main class="main">
    <h2>Devine le mot</h2>

    <div class="quiz-box">
        <div class="question">
            <strong>Définition :</strong><br>
            <?php echo htmlspecialchars($question['definition']); ?>
        </div>

        <div class="answers">
            <?php foreach ($reponses as $rep): ?>
                <button class="answer" onclick="verifier(this, '<?php echo addslashes($question['reponse_correcte']); ?>')"><?php echo htmlspecialchars($rep); ?></button>
            <?php endforeach; ?>
        </div>

        <div class="result" id="resultat"></div>

        <a class="back-link" href="jeux.php">← Retour aux jeux</a>
    </div>
</main>

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
function verifier(bouton, bonneReponse) {
    const resultat = document.getElementById('resultat');
    if (bouton.innerText === bonneReponse) {
        bouton.style.backgroundColor = '#c8e6c9';
        resultat.innerText = "Bravo ! C'est la bonne réponse.";
    } else {
        bouton.style.backgroundColor = '#f8d7da';
        resultat.innerText = "Raté ! La bonne réponse était : " + bonneReponse;
    }
    document.querySelectorAll('button.answer').forEach(btn => btn.disabled = true);
    setTimeout(() => location.reload(), 4000);
}
</script>

</body>
</html>
