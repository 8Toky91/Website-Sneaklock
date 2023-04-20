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
        <form method="post" action="update_stock.php">
        <table>
            <thead>
                <tr>
                    <th>quantite</th>
                    <th>marque</th>
                    <th>modele</th>
                    <th>pointure</th>
                    <th>couleur</th>
                    <th>quantite</th>
                    <th>statut</th>
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
                $sql = "SELECT * FROM stock";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // Affichage des résultats
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td><img src='" . $row["modele"] . "' alt='" . $row["marque"] . "'></td>";
                        echo "<td>" . $row["marque"] . "</td>";
                        echo "<td>" . $row["modele"] . "</td>";
                        echo "<td>" . $row["pointure"] . "</td>";
                        echo "<td>" . $row["couleur"] . "</td>";
                        echo "<td>" . $row["quantite"] . "</td>";
                        echo "<td>";
                        echo "<select name='statut[]'>";
                        echo "<option value='En stock'" . ($row['statut'] == 'En stock' ? ' selected' : '') . ">En stock</option>";
                        echo "<option value='Hors stock'" . ($row['statut'] == 'Hors stock' ? ' selected' : '') . ">Hors stock</option>";
                        echo "</select>";
                        echo "</td>";                              
                        echo "<td>" . $row["jour_de_vente"] . "</td>";
                        echo "<input type='hidden' name='id_stock[]' value='" . $row["id_stock"] . "'>";
                        echo "</tr>";
                    }
                    // Ajout d'un bouton de soumission pour le formulaire
                    echo "<tr><td colspan='8'><input type='submit' value='Mettre à jour'></td></tr>";
                } else {
                    echo "<tr><td colspan='8'>0 résultats</td></tr>";
                }

                // Fermeture de la connexion
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</main>
</html>


echo "<td>" . $row["statut"] . "</td>";
