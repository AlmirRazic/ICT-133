<?php
/**
 * ETML
 * Auteur: Mathias Groux
 * Date: 24.03.2017
 * Description : Affichage des infos de l'enseignant
 */

#Liaison du Header et de la naviguation, ainsi que le fichier de connexion à la BD
include "PDOlink.php";

#Ouverture de la liaison à la base de données et récupération des données nécessaires
$id = $_GET['id'];

$PDO = new PDOlink();
$query = 'DELETE FROM `t_teacher` WHERE `t_teacher`.`idteacher` =' . $id;
$req = $PDO->exectueQuery($query);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Page d'accueil</title>
        <!--Liaison du fichier Stylesheet-->
        <link rel="stylesheet" type="text/css" href="../../resources/css/common.css">
        <meta http-equiv="refresh" content="3;url=index.php" />
    </head>
    <body>
        <div id="message">
            <p>Enseignant supprimé !</p>
            <button>Redirection dans 3 secondes</button>
        </div>
    </body>
</html>

<?php
#Fermeture de la laison à la base de données
$PDO->closeCursor($req);
$PDO->destroyObject();
?>




