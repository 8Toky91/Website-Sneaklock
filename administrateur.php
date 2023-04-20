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
        <form action="connexionadmin" method="post">
            <div class="user-box">
                <input type="nom" name="nom" required="">
                <label>Nom</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Mot de passe</label>
            </div>
            <button type="submit">Se connecter</button>
            <a href="EspaceAdmin.php">Pas Admin ?</a>
        </form>
    </div>
</body>
</html>
