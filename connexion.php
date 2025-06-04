<?php
session_start();

$host = 'localhost';
$dbname = 'empowerher_db';
$username_db = 'root';
$password_db = '';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username_db, $password_db);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION["username"] = $username; 

        header("Location: site.php?login=success");
        exit();
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>
