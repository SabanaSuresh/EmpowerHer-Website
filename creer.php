<?php
$host = "localhost";
$dbname = "empowerher_db";
$user = "root"; 
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => "Erreur de connexion : " . $e->getMessage()]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $prenom = $_POST["prenom"] ?? '';
    $nom = $_POST["nom"] ?? '';
    $username = $_POST["username"] ?? '';
    $email = $_POST["email"] ?? '';
    $telephone = $_POST["telephone"] ?? '';
    $sexe = $_POST["sexe"] ?? '';
    $pays = $_POST["pays"] ?? '';
    $profession = $_POST["profession"] ?? '';
    $password = $_POST["password"] ?? '';
    $confirm_password = $_POST["confirm_password"] ?? '';

    if (empty($prenom) || empty($nom) || empty($username) || empty($email) || empty($telephone) || empty($sexe) || empty($pays) || empty($profession) || empty($password)) {
        echo json_encode(['success' => false, 'message' => "Veuillez remplir tous les champs."]);
        exit();
    }

    if (!preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.(com)$/', $email)) {
        echo json_encode(['success' => false, 'message' => "L'email doit se terminer par @gmail.com"]);
        exit();
    }
    
    if (!preg_match('/^0[0-9]{9}$/', $telephone)) {
        echo json_encode(['success' => false, 'message' => "Le numéro de téléphone doit contenir 10 chiffres et commencer par 0"]);
        exit();
    }
    
    if ($password !== $confirm_password) {
        echo json_encode(['success' => false, 'message' => "Les mots de passe ne correspondent pas."]);
        exit();
    }    

    // unicité
    $checks = [
        ['champ' => 'username', 'label' => "Nom d'utilisateur"],
        ['champ' => 'email', 'label' => "Email"],
        ['champ' => 'telephone', 'label' => "Téléphone"],
    ];

    foreach ($checks as $check) {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM utilisateurs WHERE {$check['champ']} = ?");
        $stmt->execute([$_POST[$check['champ']]]);
        if ($stmt->fetchColumn() > 0) {
            echo json_encode(['success' => false, 'message' => "Erreur : {$check['label']} déjà utilisé."]);
            exit();
        }
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilisateurs (prenom, nom, username, email, telephone, sexe, pays, profession, password) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute([$prenom, $nom, $username, $email, $telephone, $sexe, $pays, $profession, $hashed_password]);

    if ($success) {
        echo json_encode(['success' => true, 'message' => "Compte créé avec succès !"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Erreur lors de la création du compte."]);
    }
}
?>
