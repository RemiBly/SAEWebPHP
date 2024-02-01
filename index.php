<?php
include 'creationBD.php';
include 'configBD.php';
session_start();

function redirectHome() {
    header('Location: ./pages/templates/accueil.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {

    if ($_POST['action'] == 'inscription') {
        $nom = $_POST['name'];
        $email = $_POST['mail'];
        $mdp = $_POST['mdp'];

        // Vérification si l'email existe déjà
        $stmt = $file_db->prepare("SELECT ID_Utilisateur FROM utilisateur WHERE Email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            echo "Un compte avec cette adresse email existe déjà.";
        } else {
            // Inscription
            $mdp_hache = password_hash($mdp, PASSWORD_DEFAULT);
            $stmt = $file_db->prepare("INSERT INTO utilisateur (Nom_Utilisateur, Email, Mot_de_Passe) VALUES (?, ?, ?)");
            $stmt->execute([$nom, $email, $mdp_hache]);

            // Enregistrement dans la session
            $_SESSION['user_id'] = $file_db->lastInsertId();
            $_SESSION['user_name'] = $nom;
            $_SESSION['user_email'] = $email;

            redirectHome();
        }
    } elseif ($_POST['action'] == 'connexion') {
        $email = $_POST['mail'];
        $mdp = $_POST['mdp'];

        // Connexion
        $stmt = $file_db->prepare("SELECT * FROM utilisateur WHERE Email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($mdp, $user['Mot_de_Passe'])) {
            // Enregistrement dans la session
            $_SESSION['user_id'] = $user['ID_Utilisateur'];
            $_SESSION['user_name'] = $user['Nom_Utilisateur'];
            $_SESSION['user_email'] = $user['Email'];

            redirectHome();
        } else {
            echo "Informations d'identification incorrectes.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./pages/static/CSS/login.css" />
    <link rel="stylesheet" href="./pages/static/CSS/variables.css" />
    <title>Connexion - Inscription</title>
    <script src="./pages/static/JS/login.js" defer></script>
    <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="{{ url_for('inscription') }}" method="post">
				<h1>Créer un compte</h1>
				<span>Crée ton compte en utilisant ton adresse mail</span>
				<input name="name" type="text" placeholder="Name" />
				<input name="mail" type="email" placeholder="Email" />
				<input name="mdp" type="password" placeholder="Password" />
				<button type="submit" name="action" value="inscription">S'inscrire</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
		<form action="index.php" method="post">
			<h1>Se connecter</h1>
			<span>Utilise ton email pour te connecter</span>
			<input name="mail" type="email" placeholder="Email" />
			<input name="mdp" type="password" placeholder="Password" />
			<button type="submit" name="action" value="connexion">Se connecter</button>
		</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1 class="titre-gradiant">Content de te revoir</h1>
					<p>Pour rester connecter avec nous, connectes-toi en entrant tes données personnelles</p>
					<button class="ghost" id="signIn">Se connecter</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1 class="titre-gradiant">Salut !</h1>
					<p>Si tu souhaites acheter des billets, entres tes données personnelles pour t'inscrire !</p>
					<button class="ghost" id="signUp">S'inscrire</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
