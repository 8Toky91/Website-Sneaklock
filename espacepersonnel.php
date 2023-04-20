<?php
// Connexion à la base de données
$connexion = mysqli_connect("localhost", "admin", "root", "sneaklock");
 
// Vérifier la connexion
if($connexion === false){
    die("ERREUR : Impossible de se connecter à la base de données. " . mysqli_connect_error());
}
 
// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Récupérer les informations du formulaire
    $id = $_POST['id'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
 
    // Mettre à jour les informations dans la base de données
    $sql = "UPDATE utilisateur SET email='$email', mot_de_passe='$mot_de_passe' WHERE id=$id";
    if(mysqli_query($connexion, $sql)){
        echo "Les informations ont été mises à jour avec succès.";
    } else{
        echo "ERREUR : Impossible de mettre à jour les informations. " . mysqli_error($connexion);
    }
}
?>
 

 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de chaussures - SneakLock</title>
    <link rel="stylesheet" href="stylechaussure.css">
</head>
    <header>
        <div class="container">
            <h1>SneakLock</h1>
            <nav>
                <ul>
                    <li><a href="accueil.php">Accueil</a></li>
                    <li><a href="chaussure.php">Chaussures</a></li>
                    
                </ul>
            </nav>
        </div>
</header>
<body>
    <h2>Modification du mail ou du mot de passe</h2>
    <h3>Veuillez saisir votre ID et rentrez les informations que vous desirez changer</h3>
    <form method="post">
        <label>ID :</label>
        <input type="text" name="id"><br><br>
        <label>Email :</label>
        <input type="email" name="email"><br><br>
		<label>Nouveau mot de passe :</label>
        <input type="text" name="mot_de_passe"><br><br>
		
        <input type="submit" value="Mettre à jour">
    </form>
</body>
</html>

<?php
// Fermer la connexion à la base de données
mysqli_close($connexion);
?>
