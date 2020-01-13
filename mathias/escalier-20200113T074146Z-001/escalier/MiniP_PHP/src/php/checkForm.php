<?php
/**
 * ETML
 * Auteur: Jérôme Wassenberg
 * Date: 20.03.2017
 * Description : Vérifie les informations du formulaire d'insértion d'enseignants
 */
session_start();

#Liaison du Header et de la naviguation, ainsi que le fichier de connexion à la BD
include "PDOlink.php";
$PDO = new PDOlink();

#Récupération des infos du formulaire
$name = trim(htmlspecialchars($_POST['name']));
$lastName = trim(htmlspecialchars($_POST['lastName']));
$nickName = trim(htmlspecialchars($_POST['nickName']));
$desc = trim(htmlspecialchars($_POST['description']));
$sex = ($_POST['gender']);
$section = trim(htmlspecialchars($_POST['section']));
$type = $_GET['type'];
$id = $_GET['id'];

if ($_SESSION['login'] == 0)
{
    $validate = 0;
}
elseif($_SESSION['login'] == 1)
{
    $validate = 1;
}

#Expression régulière
$regex = '/^[a-zA-Z \é\è\ö\ô\ê]+$/';

    #Stockage de la fonction d'insertion des données

#Si le formulaire est envoyé en mode INSERT, il va insérer les données dans la BD
if ($type == 'insert')
{
    $query = "INSERT INTO `t_teacher` (`idteacher`, `teaFirstname`, `teaLastname`, `teaGender`, `teaNickname`, `teaOriginNickname`, `idSection`, `teaValidate`) VALUES ('NULL', '$name' , '$lastName', '$sex', '$nickName', '$desc', '$section', '$validate')";
}

#Si le formulaire est envoyé en mode EDIT, il va modifier les informations de la BD
elseif ($type == 'edit')
{
    $query = "UPDATE `t_teacher` SET `teaFirstname` = '$name', `teaLastname` = '$lastName' , `teaGender` = '$sex', `teaNickname` = '$nickName', `teaOriginNickname` = '$desc', `teaValidate` = '$validate' WHERE `t_teacher`.`idteacher` = $id";
}

$temp = 0;
#Vérification de la validité des informations
if ($temp == 0)
{
    #Vérification que les champs ne sont pas vides
    if ($name == "" || $lastName == "" || $nickName == "" || $desc == "" || $sex == "")
    {
        $temp = 1;
        ?>
        <meta http-equiv="refresh" content="3;url=insertForm.php">

            <div id="message">
                <p>Formulaire non terminé !</p>
                <p>Retour au formulaire dans 3 secondes</p>
            </div>
        <?php
    }

    if ($temp == 0 && $section == "0")
    {
        $temp = 1;
        ?>
        <meta http-equiv="refresh" content="3;url=insertForm.php">

            <div id="message">
                <p>Veuillez sélectionner une séction</p>
                <p>Retour au formulaire dans 3 secondes</p>
            </div>
        <?php
    }
    #Vérifications des champs à l'aide du regex
    if(!(preg_match($regex, $name) && preg_match($regex, $lastName)))
    {
        $temp = 1;
        ?>
        <meta http-equiv="refresh" content="3;url=insertForm.php">

        <div id="message">
            <p>Champs nom ou prénom non valide</p>
            <p>Retour au formulaire dans 3 secondes</p>
        </div>
        <?php
    }
}

if ($temp == 0)
{
    echo $query;
    #Insértion d'un enseigant dans la BD
    $req = $PDO->exectueQuery($query);
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Ajout</title>
            <!--Liaison du fichier Stylesheet-->
            <link rel="stylesheet" type="text/css" href="../../resources/css/common.css">
            <meta http-equiv="refresh" content="3;url=index.php" />
        </head>
        <body>
            <div id="message">
                <p>Enseignant ajouté !</p>
                <button>Redirection dans 3 secondes</button>
            </div>
        </body>
    </html>
    <?php
}

#Fermeture de la connexion à la BD
$PDO->destroyObject();
?>