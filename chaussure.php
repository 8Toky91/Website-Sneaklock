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
                    <li><a href="quisommesnous.html">Chaussures</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
    <div class="container">
        <h2>Liste de chaussures</h2>
        <a href="ajoutchaussure.php" class="button">Ajouter une paire</a>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Style</th>
                </tr>
            </thead>
            <tbody>
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

                // Requête pour récupérer les données de la table
                $sql = "SELECT * FROM chaussure";
                $result = mysqli_query($conn, $sql);

                // Vérification de la présence de résultats
                if (mysqli_num_rows($result) > 0) {
                    // Affichage des résultats
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td><img src='" . $row["marque"] . "' alt='" . $row["modele"] . "'></td>";
                        echo "<td>" . $row["marque"] . "</td>";
                        echo "<td>" . $row["modele"] . "</td>";
                        echo "<td>" . $row["style"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>0 résultats</td></tr>";
                }

                // Fermeture de la connexion
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</main>
</html>