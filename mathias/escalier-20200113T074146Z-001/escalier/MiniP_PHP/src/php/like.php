<?php
session_start();
/**
 * ETML
 * Auteur: Jérôme Wassenberg
 * Date: 20.03.2017
 * Description : Incrémente les like de l'enseignant
 */
#Liaison du Header et de la naviguation, ainsi que le fichier de connexion à la BD
include "PDOlink.php";

#Ouverture de la liaison à la base de données et récupération des données nécessaires
$id = $_GET['id'];

#Envoie de la requête
$PDO = new PDOlink();
$query = "UPDATE `t_teacher` SET `teaLike` = `teaLike` +1 WHERE `t_teacher`.`idteacher` = $id";
$req = $PDO->exectueQuery($query);
?>

<?php
#Fermeture de la laison à la base de données
$PDO->closeCursor($req);
$PDO->destroyObject();
?>

<!--Redirection sur la page d'accueil-->
<meta http-equiv="refresh" content="0; URL=index.php">







