<!--/*
name: Almir Razic
title:login
date: 06.01.2020
version: 1.0
*/-->


<?php
function getUsers()
{
    return json_decode(file_get_contents("model/Users.json"),true);
}
function getSnows()
{
    return json_decode(file_get_contents("model/snows.json"),true);
}


function checkLogin()
{

    $uservar = file_get_contents('model/Users.json');

    $uservar = json_decode($uservar, true);

    if (isset($_POST['login']) && isset($_POST['psw'])) {
        foreach ($uservar as $user) {

            $_SESSION['login'] = $_POST['login'];
            var_dump($_SESSION);
            die();

        }
    } else {
        login();
    }
}

function checkuserlog($post)
{
    if (isset($post['login']) && ($post['psw'])) {
        /* $userdata = array();*/


        $fichier = file_get_contents('model/Users.json');

        $fichier = json_decode($fichier, true);

        $userdata['name'] = $post['login'];
        $userdata['password'] = $post['psw'];

        $fichier[] = $userdata;
        file_put_contents('model/Users.json', json_encode($fichier));

        /*$fichier{0} = $userdata;

        $fichier = json_encode($fichier);

        file_put_contents('model/Users.json', $fichier);*/


    } else {
        require_once "view/register.php";
    }
}

?>