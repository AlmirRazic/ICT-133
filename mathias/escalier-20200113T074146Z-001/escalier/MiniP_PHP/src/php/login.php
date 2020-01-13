<?php
/**
 * ETML
 * Auteur: Jérôme Wassenberg
 * Date: 28.04.2017
 * Description : Connexion au site
 */
include 'include/header.php';
include 'include/nav.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <!--Liaison du fichier Stylesheet-->
        <link rel="stylesheet" type="text/css" href="../../resources/css/common.css">
        <link rel="stylesheet" type="text/css" href="../../resources/css/login.css">
    </head>
    <body>
        <div id="form_login">
            <form action="checkLogin.php" method="POST">
                Nom d'utilisateur
                <input type="text" name="login">
                Mot de passe
                <input type="password" name="password">
                <button type="submit">Connexion</button>
            </form>
        </div>
    </body>
</html>

<?php
    include 'include/footer.php';
?>