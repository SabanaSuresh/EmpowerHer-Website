<?php
session_start();
$host = 'localhost';
$dbname = 'empowerher_db';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

$username = $_SESSION["username"];

$stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE username = ?");
$stmt->execute([$username]);
$userData = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $new_username = $_POST["username"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $pays = $_POST["pays"];
    $profession = $_POST["profession"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if (!empty($password)) {
        if ($password !== $confirm_password) {
            die("Les mots de passe ne correspondent pas.");
        }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $update = $pdo->prepare("UPDATE utilisateurs SET prenom = ?, nom = ?, username = ?, email = ?, telephone = ?, pays = ?, profession = ?, password = ? WHERE username = ?");
        $update->execute([$prenom, $nom, $new_username, $email, $telephone, $pays, $profession, $hashed_password, $username]);
    } else {
        $update = $pdo->prepare("UPDATE utilisateurs SET prenom = ?, nom = ?, username = ?, email = ?, telephone = ?, pays = ?, profession = ? WHERE username = ?");
        $update->execute([$prenom, $nom, $new_username, $email, $telephone, $pays, $profession, $username]);
    }
    $_SESSION["username"] = $new_username;

    header("Location: profil.php?updated=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowHer - Modifier mes infos</title>
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
        .main-content {
            text-align: center; 
            padding: 20px;
            flex-grow: 1; 
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
        .form-container {
            border: 3px solid #ca83f7;
            border-radius: 15px;
            padding: 30px;
            margin: 0 auto;
            max-width: 500px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(202, 131, 247, 0.2);
        }
        .form-line {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .form-line label {
            width: 40%;
            text-align: right;
            padding-right: 10px;
            font-weight: bold;
        }
        .form-line input {
            width: 55%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
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

<div class="main-content">
    <div class="form-container">
        <h2 style="text-align: center;">Modifier mes informations</h2>
        <form method="POST">
            <div class="form-line">
                <label>Prénom :</label>
                <input type="text" name="prenom" value="<?php echo htmlspecialchars($userData['prenom']); ?>" required>
            </div>
            <div class="form-line">
                <label>Nom :</label>
                <input type="text" name="nom" value="<?php echo htmlspecialchars($userData['nom']); ?>" required>
            </div>
            <div class="form-line">
                <label>Nom d'utilisateur :</label>
                <input type="text" name="username" value="<?php echo htmlspecialchars($userData['username']); ?>" required>
            </div>
            <div class="form-line">
                <label>Mot de passe :</label>
                <input type="password" name="password" placeholder="Laissez vide si inchangé">
            </div>
            <div class="form-line">
                <label>Confirmer :</label>
                <input type="password" name="confirm_password" placeholder="Confirmez le mot de passe">
            </div>
            <div class="form-line">
                <label>Email :</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($userData['email']); ?>" required>
            </div>
            <div class="form-line">
                <label>Téléphone :</label>
                <input type="text" name="telephone" value="<?php echo htmlspecialchars($userData['telephone']); ?>" required>
            </div>
            <div class="form-line">
                <label>Pays :</label>
                <input type="text" name="pays" value="<?php echo htmlspecialchars($userData['pays']); ?>" required>
            </div>
            <div class="form-line">
                <label>Profession :</label>
                <input type="text" name="profession" value="<?php echo htmlspecialchars($userData['profession']); ?>" required>
            </div>

            <div class="form-actions">
                <button type="submit" style="padding: 10px 20px; background-color: #ca83f7; color: white; border: none; border-radius: 5px;">Enregistrer</button>
                <a href="profil.php" style="text-decoration: none;">
                    <button type="button" style="padding: 10px 20px; background-color: #aaa; color: white; border: none; border-radius: 5px;">Retour</button>
                </a>
            </div>
        </form>
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
