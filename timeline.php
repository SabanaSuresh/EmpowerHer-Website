<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowHer - Timeline</title>
    <style>
        body { font-family: 'Times New Roman', serif; background-color: #fbfcfc; margin: 0; padding: 0; display: flex; flex-direction: column; min-height: 100vh; }
        header { display: flex; justify-content: space-between; align-items: center; padding: 20px; background-color: #ca83f7; }
        header h1 { margin: 0; text-align: center; flex-grow: 1; }
        nav { display: flex; flex-direction: column; align-items: flex-end; }
        nav button { margin-bottom: 10px; }
        .banner { width: 100%; height: 200px; background-image: url('banner.png'); background-size: cover; background-position: center; }
        main { flex-grow: 1; padding: 40px 20px; display: flex; flex-direction: column; align-items: center; }
        h2 { font-size: 28px; margin-bottom: 30px; text-align: center; }
        .timeline { list-style: none; padding: 0; width: 100%; max-width: 600px; }
        .timeline li { padding: 10px; margin: 10px 0; background: #eee; border-radius: 5px; cursor: move; }
        .button { margin-top: 20px; padding: 10px 20px; background-color: #ca83f7; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .button:hover { background-color: #b26de0; }
        .back-link { margin-top: 20px; display: block; text-align: center; text-decoration: none; font-size: 16px; color: #333; }
        .message { margin-top: 20px; font-weight: bold; font-size: 18px; color: #5a2b82; text-align: center; }
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

<main>
    <h2>Reconstitue la frise historique</h2>

    <ul class="timeline" id="timeline">
        <!-- Les événements seront insérés ici -->
    </ul>

    <button class="button" onclick="checkOrder()">Valider</button>

    <a class="back-link" href="jeux.php">← Retour aux jeux</a>

    <div class="message" id="message"></div>
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
const events = [
    { text: "Première Convention pour les droits des femmes à Seneca Falls", year: 1848 },
    { text: "Droit de vote pour les femmes en France", year: 1944 },
    { text: "Publication de la Déclaration des droits de la femme et de la citoyenne par Olympe de Gouges", year: 1791 },
    { text: "Mouvement #MeToo mondial", year: 2017 },
    { text: "Marche des femmes en Pologne contre la régression du droit à l’avortement", year: 2020 },
    { text: "L’Afrique du Sud inscrit l’égalité de genre dans sa Constitution", year: 1994 },
    { text: "Sapho écrit ses poèmes en Grèce antique", year: -600 },
    { text: "Reine Boudicca mène une révolte", year: 61 },
    { text: "Julienne de Norwich écrit le premier livre en anglais par une femme", year: 1373 },
    { text: "Christine de Pizan publie La Cité des Dames", year: 1488 },
    { text: "Création du mouvement Ni Una Menos contre les féminicides", year: 2014 },
    { text: "Reconnaissance du viol comme crime de guerre au tribunal international", year: 1993 },
    { text: "Publication de The Feminine Mystique par Betty Friedan", year: 1963 },
    { text: "Droit de conduire accordé aux femmes en Arabie Saoudite", year: 2018 }
];

let attempts = 0;

// mélanger les évènements
events.sort(() => Math.random() - 0.5);

const timeline = document.getElementById('timeline');

// liste qui se mélange
events.forEach(event => {
    const li = document.createElement('li');
    li.textContent = event.text;
    li.setAttribute('draggable', 'true');
    li.dataset.year = event.year;
    timeline.appendChild(li);
});

let dragged;

timeline.addEventListener('dragstart', function (e) {
    dragged = e.target;
});

timeline.addEventListener('dragover', function (e) {
    e.preventDefault();
});

timeline.addEventListener('drop', function (e) {
    e.preventDefault();
    if (e.target.tagName === 'LI') {
        timeline.insertBefore(dragged, e.target.nextSibling);
    }
});

function checkOrder() {
    const items = timeline.querySelectorAll('li');
    const years = Array.from(items).map(item => parseInt(item.dataset.year));

    let correct = true;
    for (let i = 0; i < years.length - 1; i++) {
        if (years[i] > years[i + 1]) {
            correct = false;
            break;
        }
    }

    attempts++;

    const message = document.getElementById('message');

    if (correct) {
        message.innerHTML = "<span style='color: green;'>Bravo ! Tu as reconstitué la frise correctement !</span>";
    } else if (attempts >= 2) {
        message.innerHTML = "<span style='color: red;'>Raté ! Voici la bonne frise :<br><br>" +
            events.sort((a, b) => a.year - b.year).map(e => e.text + " (" + (e.year > 0 ? e.year : (Math.abs(e.year) + " av. J.-C.")) + ")").join('<br>') +
            "</span>";
    } else {
        message.innerHTML = "<span style='color: orange;'>Ce n'est pas encore bon, essaye encore ! (" + (2 - attempts) + " essai restant)</span>";
    }
}
</script>

</body>
</html>
