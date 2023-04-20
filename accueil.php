<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Page d'accueil</title>
	<link rel="stylesheet" type="text/css" href="styleaccueil.css">
</head>
<body>
	<header>
		<div id="logo">
			<img src="\image\logo.png" alt="Logo de l'entreprise">
		</div>
		<nav>
			<ul>
				<li><a href="#">Accueil</a></li>
				<li><a href="administrateur.php">Espace Administrateur</a></li>
				<li><a href="quisommesnous.html">Qui sommes nous ?</a></li>
				<li><a href="espacepersonnel.php">Espace personnel</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<div class="box">
			<a href="chaussure.php">
				<img src="https://i.etsystatic.com/28317189/r/il/805dd8/3600176721/il_570xN.3600176721_i0ac.jpg" alt="Bouton chaussures">
				<h2>Chaussures</h2>
			</a>
		</div>
		<div class="box">
			<a href="vendeur.php">
				<img src="data:image/png;base64,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" alt="Bouton vendeurs">
				<h2>Vendeurs</h2>
			</a>
		</div>
		<div class="box">
			<a href="stock.php">
				<img src="https://c8.alamy.com/compfr/2h8xat6/collection-de-sneakers-chaussures-de-sport-chaussures-de-sport-style-sportif-colore-garish-vector-decontracte-baskets-de-course-a-pied-pour-hommes-et-femmes-2h8xat6.jpg" alt="Bouton stock">
				<h2>Stock</h2>
			</a>
		</div>
	</main>
	<footer>
		<p>&copy; 2023 - Tous droits réservés</p>
	</footer>
</body>
</html>
