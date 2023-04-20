<?php

session_start();
require_once('config.php');

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

// Vérifier que la variable de session "id" est initialisée et correspond à l'ID de l'utilisateur connecté
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Votre code de gestion de formulaire ici...
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['modifier-email'])) {
        $nouvel_email = trim($_POST['nouvel-email']);

        // Vérification que l'email est valide
        if (!filter_var($nouvel_email, FILTER_VALIDATE_EMAIL)) {
            $message = "L'email est invalide.";
        } else {
            $stmt = $bdd->prepare('UPDATE utilisateur SET email = ? WHERE id = ?');
            $stmt->execute([$nouvel_email, $_SESSION['id']]);
            $message = "L'email a été modifié avec succès.";
        }
    } elseif (isset($_POST['modifier-motdepasse'])) {
        $mot_de_passe_actuel = $_POST['motdepasse-actuel'];
        $nouveau_mot_de_passe = $_POST['nouveau-motdepasse'];
        $confirmation_mot_de_passe = $_POST['confirmation-motdepasse'];

        // Vérification que le mot de passe actuel est correct
        $stmt = $bdd->prepare('SELECT mot_de_passe FROM utilisateur WHERE id = ?');
        $stmt->execute([$_SESSION['id']]);
        $resultat = $stmt->fetch();
        if (!password_verify($mot_de_passe_actuel, $resultat['mot_de_passe'])) {
            $message = "Le mot de passe actuel est incorrect.";
        } else {
            // Vérification que les nouveaux mots de passe correspondent et qu'ils respectent les critères de sécurité
            if ($nouveau_mot_de_passe !== $confirmation_mot_de_passe) {
                $message = "Les nouveaux mots de passe ne correspondent pas.";
            } elseif (strlen($nouveau_mot_de_passe) < 8 || !preg_match("#[0-9]+#", $nouveau_mot_de_passe) || !preg_match("#[A-Z]+#", $nouveau_mot_de_passe)) {
                $message = "Le nouveau mot de passe doit contenir au moins 8 caractères, un chiffre et une lettre majuscule.";
            } else {
                $nouveau_mot_de_passe_hache = password_hash($nouveau_mot_de_passe, PASSWORD_DEFAULT);
                $stmt = $bdd->prepare('UPDATE utilisateur SET mot_de_passe = ? WHERE id = ?');
                $stmt->execute([$nouveau_mot_de_passe_hache, $_SESSION['id']]);
                $message = "Le mot de passe a été modifié avec succès.";
            }
        }
    }
}

?>
