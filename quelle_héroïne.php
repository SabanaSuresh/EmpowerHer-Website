<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quelle héroïne te ressemble ? - EmpowHer</title>
    <style>
        body { font-family: 'Times New Roman', serif; background-color: #fbfcfc; margin: 0; padding: 0; display: flex; flex-direction: column; min-height: 100vh; }
        header { display: flex; justify-content: space-between; align-items: center; padding: 20px; background-color: #ca83f7; }
        header h1 { margin: 0; text-align: center; flex-grow: 1; }
        nav { display: flex; flex-direction: column; align-items: flex-end; }
        nav button { margin-bottom: 10px; }
        .banner { width: 100%; height: 200px; background-image: url('banner.png'); background-size: cover; background-position: center; }
        main { flex-grow: 1; padding: 40px 20px; display: flex; flex-direction: column; align-items: center; }
        h2 { font-size: 28px; margin-bottom: 30px; text-align: center; }
        .quiz-box { max-width: 700px; width: 100%; text-align: center; }
        .question { margin-bottom: 20px; }
        .answers button { margin: 10px; padding: 10px 20px; background-color: #eee; border: none; border-radius: 5px; cursor: pointer; }
        .answers button:hover { background-color: #ddd; }
        .result { margin-top: 30px; font-weight: bold; font-size: 20px; color: #5a2b82; }
        .back-link {
            margin-top: 30px;
            display: block;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            color: #333;
        }
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
    <h2>Quelle héroïne te ressemble ?</h2>
    <div class="quiz-box" id="quiz">
        <div class="question" id="question"></div>
        <div class="answers" id="answers"></div>
    </div>

    <div class="result" id="result"></div>

    <!-- Bouton retour affiché en permanence -->
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
const heroines = {
    'Marie Curie': 'pers1',
    'Simone Veil': 'pers87',
    'Serena Williams': 'pers129',
    'Ada Lovelace': 'pers108',
    'Virginia Woolf': 'pers118',
    'Vandana Shiva': 'pers77',
    'Françoise Dolto': 'pers98',
    'Oprah Winfrey': 'pers67',
    'Greta Thunberg': 'pers78',
    'Chimamanda Ngozi Adichie': 'pers69',
    'Ruth Bader Ginsburg': 'pers92',
    'Malala Yousafzai': 'pers73',
    'Marguerite Yourcenar': 'pers123',
    'Wangari Maathai': 'pers79',
    'Christine Lagarde': 'pers55'
};

const scores = {};
for (let heroine in heroines) scores[heroine] = 0;

const questions = [
    { question: "Ton rêve d'enfant ?", answers: [
        { text: "Changer la science", heroine: 'Marie Curie' },
        { text: "Défendre les droits", heroine: 'Simone Veil' },
        { text: "Briller par le sport", heroine: 'Serena Williams' },
        { text: "Inventer la tech du futur", heroine: 'Ada Lovelace' },
        { text: "Devenir écrivaine célèbre", heroine: 'Virginia Woolf' },
    ]},
    { question: "Ce qui te fait vibrer ?", answers: [
        { text: "Défendre l’environnement", heroine: 'Vandana Shiva' },
        { text: "Comprendre l'esprit humain", heroine: 'Françoise Dolto' },
        { text: "Partager des histoires", heroine: 'Oprah Winfrey' },
        { text: "Protester pour la planète", heroine: 'Greta Thunberg' },
        { text: "Écrire pour changer", heroine: 'Chimamanda Ngozi Adichie' },
    ]},
    { question: "Ta citation préférée ?", answers: [
        { text: "La science sauvera l'humanité", heroine: 'Marie Curie' },
        { text: "Le droit est pour toutes", heroine: 'Simone Veil' },
        { text: "Se battre sans peur", heroine: 'Serena Williams' },
        { text: "Imaginer sans limite", heroine: 'Ada Lovelace' },
        { text: "La plume est plus forte que l'épée", heroine: 'Virginia Woolf' },
    ]},
    { question: "Ton idéal de société ?", answers: [
        { text: "Une écologie respectée", heroine: 'Vandana Shiva' },
        { text: "La santé pour tous", heroine: 'Françoise Dolto' },
        { text: "Libérer la parole des minorités", heroine: 'Oprah Winfrey' },
        { text: "Un futur sans carbone", heroine: 'Greta Thunberg' },
        { text: "L'égalité des genres", heroine: 'Ruth Bader Ginsburg' },
    ]},
    { question: "Ton moyen d'action favori ?", answers: [
        { text: "Éducation des filles", heroine: 'Malala Yousafzai' },
        { text: "Changer les lois", heroine: 'Simone Veil' },
        { text: "Écrire des chefs-d'œuvre", heroine: 'Marguerite Yourcenar' },
        { text: "Planter des millions d'arbres", heroine: 'Wangari Maathai' },
        { text: "Gérer l'économie mondiale", heroine: 'Christine Lagarde' },
    ]}
];

let currentQuestion = 0;

function showQuestion() {
    const questionDiv = document.getElementById('question');
    const answersDiv = document.getElementById('answers');
    questionDiv.innerText = questions[currentQuestion].question;
    answersDiv.innerHTML = "";
    questions[currentQuestion].answers.forEach(answer => {
        const btn = document.createElement('button');
        btn.innerText = answer.text;
        btn.onclick = () => selectAnswer(answer.heroine);
        answersDiv.appendChild(btn);
    });
}

function selectAnswer(heroine) {
    scores[heroine]++;
    currentQuestion++;
    if (currentQuestion < questions.length) {
        showQuestion();
    } else {
        showResult();
    }
}

function showResult() {
    const resultDiv = document.getElementById('result');
    const quizDiv = document.getElementById('quiz');
    quizDiv.style.display = 'none';

    let topScore = 0;
    let winner = '';

    for (let heroine in scores) {
        if (scores[heroine] > topScore) {
            topScore = scores[heroine];
            winner = heroine;
        }
    }

    const id = heroines[winner];
    resultDiv.innerHTML = `Tu ressembles à <strong><a href='heroine.php?id=${id}'>${winner}</a></strong> !`;
}

showQuestion();
</script>

</body>
</html>
