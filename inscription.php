<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inscription</title>
	<link rel="stylesheet" href="styleinscription.css">
</head>
<body>
	<?php
		// Vérification des données entrées par l'utilisateur
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Récupération des valeurs des champs
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$email = $_POST['email'];
			$mot_de_passe = $_POST['mot_de_passe'];
			$mot_de_passe_confirm = $_POST['mot_de_passe_confirm'];

			// Vérification du format de l'adresse email
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "<p class='error'>Adresse email invalide</p>";
			}
			// Vérification de la confirmation du mot de passe
			elseif ($mdp != $mot_de_passe_confirm) {
				echo "<p class='error'>Les mots de passe ne sont pas identiques</p>";
			}
			// Enregistrement de l'utilisateur dans la base de données
			else {
				// Connexion à la base de données
				$host = "localhost";
				$user = "admin";
				$password = "root";
				$database = "sneaklock";
				$connexion = mysqli_connect($host, $user, $password, $database);

				// Vérification de la connexion
				if (!$connexion) {
				    die("Connexion à la base de données échouée : " . mysqli_connect_error());
				}

				// Préparation de la requête SQL d'insertion des données
				$sql = "INSERT INTO utilisateur (nom, prenom, email, mot_de_passe) VALUES ('$nom', '$prenom', '$email', '$mot_de_passe')";

				// Exécution de la requête SQL
				if (mysqli_query($connexion, $sql)) {
				    echo "<p class='success'>Inscription réussie !</p>";
				} else {
				    echo "<p class='error'>Erreur lors de l'inscription : " . mysqli_error($connexion) . "</p>";
				}

				// Fermeture de la connexion à la base de données
				mysqli_close($connexion);
			}
		}
	?>

	<title>Inscription</title>
<body>
	<div class="container">
		<form action="inscription.php" method="post">
			<h2>Inscription</h2>
			<div class="form-group">
				<label for="nom">Nom :</label>
				<input type="text" id="nom" name="nom" required>
			</div>
			<div class="form-group">
				<label for="prenom">Prénom :</label>
				<input type="text" id="prenom" name="prenom" required>
			</div>
			<div class="form-group">
				<label for="email">Email :</label>
				<input type="email" id="email" name="email" required>
			</div>
			<div class="form-group">
				<label for="mot_de_passe">Mot de passe :</label>
				<input type="password" id="mot_de_passe" name="mot_de_passe" required>
			</div>
			<div class="form-group">
				<label for="confirmer_mot_de_passe">Confirmer mot de passe :</label>
				<input type="password" id="confirmer_mot_de_passe" name="confirmer_mot_de_passe" required>
			</div>
			<button type="submit">S'inscrire</button>
		</form>
	</div>
</body>
</html>

