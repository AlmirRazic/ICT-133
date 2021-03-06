<?php
//*********************************************************
// Company  : ETML
// Author   : Mathias Groux
// Date     : 18.05.2017
// Summary  : Identify if users's informations are true
//*********************************************************
// Modifications: -
// Date   : -
// Author : -
// Reason : -
//*********************************************************


// Session start and login = false
session_start();
$loginMessage = false; // Default value

// Include the database and call class
include_once ("DBAccess.php");
$db = new DBAccess();

// Check if values is not empty

if ( isset($_POST) && (!empty($_POST['login'])) && (!empty($_POST['password']))) {
    // Values
    $login = $_POST['login'];
    $password = $_POST ['password'];
    //$password = password_hash($password,PASSWORD_DEFAULT);

    //echo $password;

    // Users login
    $data = $db->getUser($login);


    if (empty($data))
    {
        echo '<body onLoad="alert(\'Pseudo ou mot de passe incorrect\')">';
        echo '<meta http-equiv="Refresh" content="0;URL=login.php">';
    }
    else
    {
        // Password is correct
        if(password_verify($password, $data['usePassword']))
        //if ($password == $data['usePassword'])
        {
            // Session information
            $_SESSION['name'] = $login;

            // loginMessage add a true value for the verification
            echo "<body onLoad=\"alert('Bienvenue  $login ')\">";
            echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
        }
        else
        {
            echo '<body onLoad="alert(\'Pseudo ou mot de passe incorrect\')">';
            echo '<meta http-equiv="Refresh" content="0;URL=login.php">';
        }
    }
}
else
{
    echo '<body onLoad="alert(\'Pseudo ou mot de passe vide\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=login.php">';
}
