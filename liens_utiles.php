<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowHer - Liens Utiles</title>
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
        .container {
            flex-grow: 1;
            padding: 20px;
            text-align: center;
        }
        .links-section {
            max-width: 800px;
            margin: 0 auto;
        }
        h2 {
            color: #a81ce9;
            text-align: center;
        }
        .link-item {
            margin-bottom: 15px;
        }
        .link-item a {
            color: #6a1b9a;
            text-decoration: none;
            font-weight: bold;
        }
        .link-item a:hover {
            text-decoration: underline;
        }
        footer {
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
</header>

<div class="container">
    <div class="links-section">
        <h2>Numéros d’urgence</h2>
        <div class="link-item">
            <strong>3919 - Violences Femmes Info (France)</strong><br>
            Gratuit et anonyme, 24h/24, 7j/7<br>
            <a href="https://www.solidaritefemmes.org/">https://www.solidaritefemmes.org/</a>
        </div>
        <div class="link-item">
            <strong>112 - Numéro d’urgence européen</strong><br>
            Pour toute situation de danger immédiat (police, pompiers, ambulance)
        </div>
        <div class="link-item">
            <strong>17 - Police Secours (France)</strong><br>
            En cas de menace ou d’agression
        </div>
        <div class="link-item">
            <strong>119 - Enfance en Danger</strong><br>
            Pour signaler une situation de maltraitance d’un enfant
        </div>

        <h2>Sites et plateformes d’aide</h2>
        <div class="link-item">
            <strong>Arrêtons les violences (Signalement en ligne)</strong><br>
            <a href="https://arretonslesviolences.gouv.fr/">https://arretonslesviolences.gouv.fr/</a>
        </div>
        <div class="link-item">
            <strong>Fédération Nationale Solidarité Femmes (FNSF)</strong><br>
            <a href="https://www.solidaritefemmes.org/">https://www.solidaritefemmes.org/</a>
        </div>
        <div class="link-item">
            <strong>Service public - Aide aux victimes de violences conjugales</strong><br>
            <a href="https://www.service-public.fr/particuliers/vosdroits/F12544">https://www.service-public.fr/particuliers/vosdroits/F12544</a>
        </div>
        <div class="link-item">
            <strong>Chat anonyme - En avant toute(s)</strong><br>
            <a href="https://www.commentonsaime.fr/">https://www.commentonsaime.fr/</a>
        </div>
        <div class="link-item">
            <strong>Stop Harcèlement de Rue</strong><br>
            <a href="https://stopharcelementderue.org/">https://stopharcelementderue.org/</a>
        </div>
        <div class="link-item">
            <strong>Pôle Violences Sexuelles</strong><br>
            <a href="https://pvs.asso.fr/">https://pvs.asso.fr/</a>
        </div>
        
        <h2>Hébergement et soutien psychologique</h2>
        <div class="link-item">
            <strong>Associations locales (Centres d’hébergement d’urgence)</strong><br>
            Contacter le 115 (Numéro d’hébergement d’urgence)
        </div>
        <div class="link-item">
            <strong>Association France Victimes</strong><br>
            <a href="https://www.france-victimes.fr/">https://www.france-victimes.fr/</a>
        </div>
        <div class="link-item">
            <strong>CIDFF (Centres d’Information sur les Droits des Femmes et des Familles)</strong><br>
            <a href="https://www.cidff.fr/">https://www.cidff.fr/</a>
        </div>
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
