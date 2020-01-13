<?php
session_start();
/**
 * ETML
 * Auteur: Jérôme Wassenberg
 * Date: 28.04.2017
 * Description : Vérifie les informations du formulaire de login
 */

#Liaison du Header et de la naviguation, ainsi que le fichier de connexion à la BD
include "PDOlink.php";
$PDO = new PDOlink();

#Récupération des infos du formulaire
$login = ($_POST['login']);
$password = ($_POST['password']);

#Récupération et préparation des informations de la base de données
$query = 'SELECT `useLogin`,`usePassword`,`useRole` FROM `t_user` WHERE `useLogin` = '.'"'.$login.'"' ;
$req = $PDO->exectueQuery($query);
$result = $PDO->prepareData($req);

foreach($result as $display)
{
    #Vérifie le mot de passe du compte ressortissant
    if ((password_verify($password, $display['usePassword'])))
    {
        #Si le compte est de rôle 0 (simple utilisateur)
        if ($display['useRole'] == 0)
        {
            $_SESSION['login'] = $display['useRole'];
            $_SESSION['username'] = $display['useLogin'];
            echo "Connecté en temps que " . $_SESSION['username']." role ". $_SESSION['login'];
            echo "<meta http-equiv='refresh' content='2; URL=index.php'>";
            break;
        }
        #Si le compte est de rôle 1 (Administrateur)
        elseif ($display['useRole'] == 1)
        {
            $_SESSION['login'] = $display['useRole'];
            $_SESSION['username'] = $display['useLogin'];
            echo "Connecté en temps que " . $_SESSION['username']." role ". $_SESSION['login'];
            echo "<meta http-equiv='refresh' content='2; URL=index.php'>";
            break;
        }
        #Si aucnun compte ne correspond à la requête
        else
        {
            echo "Login ou mot de passe incorrect !";
            echo "<meta http-equiv='refresh' content='2; URL=login.php'>";
            break;
        }
    }
}

#Fermeture de la connexion à la BD
$PDO->destroyObject();
?>
