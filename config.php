<?php

$db_host = "localhost";
$db_name = "sneaklock";
$db_user = "admin";
$db_password = "root";

try {
    $bdd = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    // configuration des options de PDO pour générer des exceptions en cas d'erreurs
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    die();
}

?>
