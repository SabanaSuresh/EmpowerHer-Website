<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'] ?? '';
    $contenu = trim($_POST['contenu'] ?? '');

    if ($contenu === '') {
        echo "Erreur : contenu vide.";
        exit;
    }

    // Connexion à bdd
    $pdo = new PDO('mysql:host=localhost;dbname=empowerher_db;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // les tables
    switch ($type) {
        case 'ressource':
            $table = 'propositions_ressources';
            break;
        case 'mot':
            $table = 'propositions_mots';
            break;
        case 'evenement':
            $table = 'proposition_evenement';
            break;
        case 'loi':
            $table = 'proposition_loi';
            break;
        default:
            echo "Type de proposition inconnu.";
            exit;
    }

    // insertion sécurisée
    $champ = ($type === 'mot') ? 'mot' : 'texte';

    $stmt = $pdo->prepare("INSERT INTO $table ($champ, date_proposition) VALUES (:contenu, NOW())");
    $stmt->execute(['contenu' => $contenu]);
    

    echo "Proposition envoyée avec succès !";
} else {
    echo "Méthode non autorisée.";
}
?>
