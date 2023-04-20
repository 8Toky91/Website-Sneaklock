<?php
// Paramètres de connexion à la base de données
$host = "localhost"; // Le nom du serveur où se trouve la base de données
$user = "admin"; // Le nom d'utilisateur pour accéder à la base de données
$password = "root"; // Le mot de passe pour accéder à la base de données
$database = "sneaklock"; // Le nom de la base de données à laquelle vous souhaitez vous connecter

// Connexion à la base de données
$connexion = mysqli_connect($host, $user, $password, $database);

// Vérification de la connexion
if (!$connexion) {
    die("Connexion à la base de données échouée : " . mysqli_connect_error());
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $marque = $_POST["marque"];
    $pointure = $_POST["pointure"];
    $couleur = $_POST["couleur"];
    $style = $_POST["style"];
    $modele = $_POST["modele"];

    
    // Préparer une instruction d'insertion
    $sql = "INSERT INTO chaussure (marque, pointure, couleur, style, modele) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $connexion->prepare($sql)) {
        // Lier les variables à l'instruction préparée en tant que paramètres
        $stmt->bind_param("sssss", $marque, $pointure, $couleur, $style, $modele);
        
        // Exécuter l'instruction préparée
        if ($stmt->execute()) {
            // Les données ont été insérées avec succès
            echo "Les données ont été insérées avec succès.";
        } else {
            echo "Une erreur est survenue lors de l'insertion des données : " . $connexion->error;
        }
    } else {
        echo "Une erreur est survenue lors de la préparation de l'instruction : " . $connexion->error;
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
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">A propos</a></li>
                </ul>
            </nav>
        </div>
</header>
<body>
    <h1>Ajout d'une nouvelle paire</h1>
    <form method="post">
        <label for="nom">Marque :</label>
        <input type="text" name="marque" required><br>
        
        <label for="prenom">Pointure :</label>
        <input type="text" name="pointure" required><br>
        
        <label for="couleur">Couleur :</label>
        <input type="=text" name="couleur" required><br>

        <label for="style">Style :</label>
        <input type="text" name="style" required><br>

        <label for="modele">Modele :</label>
        <input type="text" name="modele" required><br>
        
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
