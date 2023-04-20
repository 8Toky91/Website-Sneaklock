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

// Vérification que le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Récupération des données du formulaire
    $id = $_POST['id'];
    $statut = $_POST['statut'];

    // Requête pour mettre à jour le statut du produit
    $sql = "UPDATE stock SET statut='$statut' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Mise à jour réussie.";
    } else {
        echo "Erreur de mise à jour: " . mysqli_error($conn);
    }
}

// Fermeture de la connexion
mysqli_close($conn);
?>