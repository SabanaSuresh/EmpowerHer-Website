<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowHer - Politique de Confidentialité</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            margin: 0;
            padding: 20px;
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
        h2, h3 {
            color: #a81ce9; 
        }
        h1 {
            color: #000000;
        }
        p, ul {
            margin: 10px 0;
        }
        footer {
            text-align: center;
            padding:1px;
            background-color: #ca83f7; 
            margin-top: auto; 
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

<h1><strong>Politique de Confidentialité</strong></h1>

<p><strong>Dernière mise à jour :</strong> 25/02/2025</p>

<p>Bienvenue sur EmpowerHer ! La protection de vos données personnelles est une priorité pour nous. Cette politique de confidentialité explique quelles informations nous collectons, comment nous les utilisons et vos droits en matière de protection des données.</p>

<h2><strong>1. Collecte des données personnelles</strong></h2>
<p>Nous collectons différentes informations lorsque vous utilisez notre site, notamment :</p>
<ul>
    <li><strong>Données d'inscription :</strong> Nom, prénom, adresse e-mail, mot de passe.</li>
    <li><strong>Données de navigation :</strong> Adresse IP, type de navigateur, pages visitées, durée de la visite.</li>
    <li><strong>Données de contact :</strong> Toute information que vous nous transmettez via nos formulaires de contact ou de support.</li>
</ul>

<h2><strong>2. Utilisation des données</strong></h2>
<p>Nous utilisons vos données pour :</p>
<ul>
    <li><strong>Fournir et améliorer</strong> nos services.</li>
    <li><strong>Répondre</strong> à vos demandes et questions.</li>
    <li><strong>Assurer la sécurité</strong> de notre site.</li>
    <li><strong>Vous envoyer</strong> des informations et actualités (avec votre consentement).</li>
</ul>

<h2><strong>3. Partage des données</strong></h2>
<p>Nous ne partageons pas vos informations personnelles avec des tiers, sauf dans les cas suivants :</p>
<ul>
    <li><strong>Si la loi</strong> nous y oblige.</li>
    <li><strong>Avec nos prestataires</strong> techniques et partenaires de confiance pour l'hébergement et l'amélioration du site.</li>
</ul>

<h2><strong>4. Sécurité des données</strong></h2>
<p>Nous mettons en place des mesures de sécurité pour protéger vos données contre tout accès non autorisé, modification, divulgation ou destruction.</p>

<h2><strong>5. Vos droits</strong></h2>
<p>Conformément aux réglementations en vigueur, vous disposez des droits suivants :</p>
<ul>
    <li><strong>Accéder</strong> à vos données personnelles.</li>
    <li><strong>Demander la rectification</strong> ou la suppression de vos données.</li>
    <li><strong>Vous opposer</strong> à leur traitement ou demander leur limitation.</li>
    <li><strong>Retirer votre consentement</strong> à tout moment.</li>
</ul>
<p>Pour exercer vos droits, contactez-nous à <a href="mailto:sabana.suresh@dauphine.eu">sabana.suresh@dauphine.eu</a>.</p>

<h2><strong>6. Cookies</strong></h2>
<p>Nous utilisons des cookies pour améliorer votre expérience utilisateur. Vous pouvez les gérer via les paramètres de votre navigateur.</p>

<h2><strong>7. Modifications de la politique de confidentialité</strong></h2>
<p>Nous nous réservons le droit de modifier cette politique à tout moment. Les changements seront publiés sur cette page avec la date de mise à jour.</p>

<h2><strong>8. Contact</strong></h2>
<p>Pour toute question concernant cette politique de confidentialité, vous pouvez nous contacter à <a href="mailto:sabana.suresh@dauphine.eu">sabana.suresh@dauphine.eu</a>.</p>

<p>Merci de faire confiance à EmpowerHer !</p>

<footer>
    <p>&copy; 2025 EmpowerHer. Tous droits réservés.</p>
</footer>

</body>
</html>