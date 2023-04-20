<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login-box">
        <h2>Connexion</h2>
        <form action="accueil.php" method="post">
            <div class="user-box">
                <input type="email" name="email" required="">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Mot de passe</label>
            </div>
            <button type="submit">Se connecter</button>
            <a href="inscription.php">Pas inscrit ?</a>
        </form>
    </div>
    <?php
session_start();

// Paramètres de connexion à la base de données
$host = "localhost"; 
$user = "admin"; 
$password = "root"; 
$database = "sneaklock"; 

// Connexion à la base de données
$connexion = mysqli_connect($host, $user, $password, $database);

// Vérification de la connexion
if (!$connexion) {
    die("Connexion à la base de données échouée : " . mysqli_connect_error());
} else {
    echo "Connexion à la base de données réussie !";
}

// Vérifier si l'utilisateur est déjà connecté
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: accueil.php");
    exit;
}

// Initialiser les variables
$email = $password = "";
$email_err = $password_err = "";

// Traitement des données du formulaire lorsque le formulaire est soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Valider l'adresse email
    if(empty(trim($_POST["email"]))){
        $email_err = "Veuillez entrer votre adresse email.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Valider le mot de passe
    if(empty(trim($_POST["password"]))){
        $password_err = "Veuillez entrer votre mot de passe.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Vérifier les erreurs de saisie avant de valider les informations de connexion
    if(empty($email_err) && empty($password_err)){
        // Préparer une instruction SELECT
        $sql = "SELECT id, email, password FROM utilisateur WHERE email = ?";

        if($stmt = $connexion->prepare($sql)){
            // Lier les variables à l'instruction préparée en tant que paramètres
            $stmt->bind_param("s", $param_email);

            // Définir les paramètres
            $param_email = $email;

            // Exécuter l'instruction préparée
            if($stmt->execute()){
                // Stocker le résultat
                $stmt->store_result();

                // Vérifier si l'adresse email existe, si oui, vérifier le mot de passe
                if($stmt->num_rows == 1){
                    // Lier les variables de résultat
                    $stmt->bind_result($id, $email, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Démarrer une session
                            session_start();

                            // Stocker les données dans les variables de session
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            // Rediriger l'utilisateur vers la page de bienvenue
                            header("location: accueil.php");
                            exit();
                        } else{
                            // Message d'erreur de mot de passe incorrect
                            $password_err = "Le mot de passe que vous avez entré n'est pas valide.";
                        }
                    }
                } else{
                    // Message d'erreur d'adresse email non trouvée
                    $email_err = "Aucun compte trouvé avec l'adresse email fournie.";
                }
                } else{
                echo "Oops! Quelque chose s'est mal passé. Veuillez réessayer ultérieurement.";
                }
                        // Fermer l'instruction
        $stmt->close();
    }
}

// Fermer la connexion
mysqli_close($connexion);
}
?>
</body>
</html>

