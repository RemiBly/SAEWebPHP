<!DOCTYPE html>
<html lang="fr">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="variables.css" />
    <title>Connexion - Inscription</title>
    <script src="JS/login.js" defer></script>
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
			<form action="{{ url_for('connexion') }}" method="post">
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
