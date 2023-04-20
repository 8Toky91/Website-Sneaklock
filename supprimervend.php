<?php
// Connexion à la base de données
$connexion = mysqli_connect("localhost", "admin", "root", "sneaklock");

// Vérifier la connexion
if($connexion === false){
    die("ERREUR : Impossible de se connecter à la base de données. " . mysqli_connect_error());
}

// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Récupérer l'ID de la ligne à supprimer
    $id = $_POST['id'];

    // Supprimer la ligne correspondante dans la base de données
    $sql = "DELETE FROM vendeur WHERE id_vendeur=$id";
    if(mysqli_query($connexion, $sql)){
        echo "La ligne a été supprimée avec succès.";
    } else{
        echo "ERREUR : Impossible de supprimer la ligne. " . mysqli_error($connexion);
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
<body>
    <header>
        <div class="container">
            <h1>SneakLock</h1>
            <nav>
                <ul>
                    <li><a href="accueil.php">Accueil</a></li>
                </ul>
            </nav>
        </div>
    </header>
<body>
    <h2>Supprimer un vendeur</h2>
    <h3>Pour supprimer un vendeur veuillez saisir son ID.</h3>
    <form method="post">
        <label>ID :</label>
        <input type="text" name="id"><br><br>
        <input type="submit" value="Supprimer">
    </form>
</body>
</html>

<?php
// Fermer la connexion à la base de données
mysqli_close($connexion);
?>
