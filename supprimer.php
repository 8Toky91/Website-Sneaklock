<?php

// Connexion à la base de données
$servername = "localhost";
$username = "admin";
$password = "root";
$dbname = "sneaklock";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// Vérification si l'id utilisateur est spécifié dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Requête pour supprimer l'utilisateur avec l'id spécifié
    $sql = "DELETE FROM utilisateur WHERE id = $id";

    // Vérification de la réussite de la requête
    if (mysqli_query($conn, $sql)) {
        echo "Utilisateur supprimé avec succès";
    } else {
        echo "Erreur lors de la suppression de l'utilisateur: " . mysqli_error($conn);
    }
}

// Fermeture de la connexion
mysqli_close($conn);

?>
