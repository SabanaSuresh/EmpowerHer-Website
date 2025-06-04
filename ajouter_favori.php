<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: connexion.html");
    exit;
}

$pdo = new PDO('mysql:host=localhost;dbname=empowerher_db;charset=utf8', 'root', '');

// Recup utilisateur
$stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE username = ?");
$stmt->execute([$_SESSION["username"]]);
$user = $stmt->fetch();

if ($user && isset($_POST["type"]) && isset($_POST["id_favori"])) {
    $type = htmlspecialchars($_POST["type"]);
    $idFavori = htmlspecialchars($_POST["id_favori"]);

    // si favori existe déjà
    $stmt = $pdo->prepare("SELECT * FROM favoris WHERE utilisateur_id = ? AND type_favori = ? AND id_favori = ?");
    $stmt->execute([$user['id'], $type, $idFavori]);
    if ($stmt->rowCount() == 0) {
        $stmt = $pdo->prepare("INSERT INTO favoris (utilisateur_id, type_favori, id_favori) VALUES (?, ?, ?)");
        $stmt->execute([$user['id'], $type, $idFavori]);
    }
}

// Retour page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
