<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=empowerher_db;charset=utf8', 'root', '');
$stmt = $pdo->query("SELECT * FROM qui_est_ce ORDER BY RAND() LIMIT 1");
$question = $stmt->fetch(PDO::FETCH_ASSOC);

$reponses = [$question['reponse'], $question['faux1'], $question['faux2'], $question['faux3']];
shuffle($reponses);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qui-est-ce ? - EmpowHer</title>
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

        .indice {
            margin: 10px 0;
            font-size: 18px;
            display: none;
            padding: 10px;
            background-color: #f2e6ff;
            border-left: 4px solid #ca83f7;
        }

        .reponses {
            margin-top: 20px;
        }

        .reponses button {
            margin: 8px;
            padding: 10px 20px;
            background-color: #eee;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .reponses button:hover {
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
    <h2>Qui-est-ce ?</h2>

    <div class="quiz-box">
        <p>Clique pour révéler les indices, puis tente de deviner !</p>

        <div id="indice1" class="indice"><?php echo htmlspecialchars($question['indice1']); ?></div>
        <div id="indice2" class="indice"><?php echo htmlspecialchars($question['indice2']); ?></div>
        <div id="indice3" class="indice"><?php echo htmlspecialchars($question['indice3']); ?></div>

        <button onclick="montrerIndice()">Afficher un indice</button>

        <div class="reponses" id="choixReponses">
            <?php foreach ($reponses as $rep): ?>
                <button onclick="verifier(this, '<?php echo addslashes($question['reponse']); ?>')"><?php echo htmlspecialchars($rep); ?></button>
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
let indice = 1;
function montrerIndice() {
    const current = document.getElementById('indice' + indice);
    if (current) {
        current.style.display = 'block';
        indice++;
    }
}

function verifier(bouton, bonneReponse) {
    const resultat = document.getElementById('resultat');
    if (bouton.innerText === bonneReponse) {
        bouton.style.backgroundColor = '#c8e6c9';
        resultat.innerText = "Bravo ! C'était la bonne réponse.";
    } else {
        bouton.style.backgroundColor = '#f8d7da';
        resultat.innerText = "Non, la bonne réponse était : " + bonneReponse;
    }
    document.querySelectorAll('.reponses button').forEach(b => b.disabled = true);
    setTimeout(() => location.reload(), 5000);
}
</script>

</body>
</html>
