<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowHer - Vrai ou Faux</title>
    <style>
        body { font-family: 'Times New Roman', serif; background-color: #fbfcfc; margin: 0; padding: 0; display: flex; flex-direction: column; min-height: 100vh; }
        header { display: flex; justify-content: space-between; align-items: center; padding: 20px; background-color: #ca83f7; }
        header h1 { margin: 0; text-align: center; flex-grow: 1; }
        nav { display: flex; flex-direction: column; align-items: flex-end; }
        nav button { margin-bottom: 10px; }
        .banner { width: 100%; height: 200px; background-image: url('banner.png'); background-size: cover; background-position: center; }
        main { flex-grow: 1; padding: 40px 20px; display: flex; flex-direction: column; align-items: center; }
        h2 { font-size: 28px; margin-bottom: 30px; text-align: center; }
        .statement { margin: 30px 0; font-size: 16px; text-align: center; max-width: 700px; }
        .buttons { display: flex; gap: 20px; margin-bottom: 20px; }
        .buttons button { padding: 8px 16px; font-size: 13px; background-color: #ca83f7; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .buttons button:hover { background-color: #b26de0; }
        .message { margin-top: 20px; font-weight: bold; font-size: 18px; color: #5a2b82; text-align: center; }
        .back-link { margin-top: 30px; display: block; text-align: center; text-decoration: none; font-size: 16px; color: #333; }
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
    <h2>Jeu Vrai ou Faux</h2>

    <div class="statement" id="statement">Chargement...</div>

    <div class="buttons">
        <button onclick="answer(true)">Vrai</button>
        <button onclick="answer(false)">Faux</button>
    </div>

    <div class="message" id="message"></div>

    <a class="back-link" href="jeux.php">← Retour aux jeux</a>
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
const questions = [
    { text: "Les femmes françaises ont obtenu le droit de vote en 1936.", answer: false },
    { text: "La CEDAW est un traité international pour les droits des femmes.", answer: true },
    { text: "Le mouvement #MeToo a commencé en 2017.", answer: true },
    { text: "Simone de Beauvoir a écrit La Cité des Dames.", answer: false },
    { text: "Olympe de Gouges a été exécutée pendant la Révolution française.", answer: true },
    { text: "Le premier pays à accorder le droit de vote aux femmes est la France.", answer: false },
    { text: "La Journée Internationale des Femmes est célébrée le 8 mars.", answer: true },
    { text: "Greta Thunberg est célèbre pour son combat contre la malnutrition.", answer: false },
    { text: "Ruth Bader Ginsburg était juge à la Cour Suprême des États-Unis.", answer: true },
    { text: "Le Code Napoléon garantissait l'égalité entre hommes et femmes.", answer: false },
    { text: "Marie Curie a reçu deux prix Nobel dans deux disciplines différentes.", answer: true },
    { text: "Madeleine Brès a été la première femme médecin diplômée en France.", answer: true },
    { text: "La Déclaration des droits de la femme et de la citoyenne a été écrite par Simone Veil.", answer: false },
    { text: "Le Mouvement de Libération des Femmes (MLF) est né dans les années 1960.", answer: true },
    { text: "Le droit de vote a été accordé aux femmes françaises en 1944.", answer: true },
    { text: "Harriet Tubman était connue pour ses travaux scientifiques.", answer: false },
    { text: "La conférence mondiale de Pékin en 1995 a été un événement majeur pour les droits des femmes.", answer: true },
    { text: "Christine Lagarde est la première femme à diriger la Banque centrale européenne.", answer: true },
    { text: "Wangari Maathai a reçu le Prix Nobel de la paix pour ses actions écologiques.", answer: true },
    { text: "Florence Nightingale a fondé la première université féminine en Europe.", answer: false },
    { text: "Olympe de Gouges a rédigé la Déclaration des Droits de l'Homme.", answer: false },
    { text: "Le mouvement Ni Una Menos a démarré en France.", answer: false },
    { text: "La Cité des Dames est un livre médiéval défendant la cause des femmes.", answer: true },
    { text: "Le Code du statut personnel tunisien de 1956 a amélioré les droits des femmes.", answer: true },
    { text: "Louise Michel était une célèbre cheffe d’entreprise française.", answer: false },
    { text: "Marguerite Yourcenar a été la première femme élue à l'Académie française.", answer: true },
    { text: "La Convention CEDAW a été adoptée en 1965.", answer: false },
    { text: "Greta Thunberg a commencé son action pour le climat à l'âge de 15 ans.", answer: true },
    { text: "Rosa Luxemburg a lutté pour l'écologie et l'environnement.", answer: false },
    { text: "Fatima Mernissi est connue pour ses recherches sur l'islam et les femmes.", answer: true }
];

let currentQuestion = {};

function loadQuestion() {
    currentQuestion = questions[Math.floor(Math.random() * questions.length)];
    document.getElementById('statement').innerText = currentQuestion.text;
    document.getElementById('message').innerText = "";
}

function answer(userAnswer) {
    if (userAnswer === currentQuestion.answer) {
        document.getElementById('message').innerHTML = "<span style='color: green;'>Bonne réponse !</span>";
    } else {
        document.getElementById('message').innerHTML = "<span style='color: red;'>Mauvaise réponse.</span>";
    }

    setTimeout(loadQuestion, 2500);
}

window.onload = loadQuestion;
</script>

</body>
</html>
