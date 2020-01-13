<?php
/**
 * Created by PhpStorm.
 * User: jerome-wassenberg
 * Date: 07.03.2017
 * Time: 16:50
 */

$sex = $_POST['sex'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$camp = $_POST['camp'];
$date = $_POST['date'];
$bouffe = $_POST['bouffe'];
$text = $_POST['text'];

if ($sex == "" || $nom == "" ||  $prenom == "" || $camp == "" || $date == "" || $bouffe == "")
{
    echo "Veuillez remplire le formulaire";
}

else{
    echo "Bonjour, merci de vous êtres inscrits au camp, vous êtes ";

    if ($sex == "homme")
    {
        echo "un homme";
    }

    else
    {
        echo "une femme";
    }

    echo ", vous vous appelez " . $nom . " " . $prenom . " et vous êtes affilié au camp " . $camp . ".";
    echo "<br><br>";
    echo "voici les dates de vos camps : ";
    echo "<br><br>";

    foreach ($_POST['date'] as $date){
        echo $date ."<br>";
    }
    echo "<br><br>";
    if ($bouffe == "tout")
    {
        echo "Vous mangez de tout";
    }

    else
    {
        echo "Vous êtes vegetarien";
    }
    
    echo "<br><br>";

    if ($text == "")
    {
        echo "Aucune recommendations";
    }

    else
    {
        echo "Voici une recommendation : " . $text;
    }
}

