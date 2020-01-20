<!--/*
name: Almir Razic
title:login
date: 06.01.2020
version: 1.0
*/-->



<?php

function checkLogin($post){
    if (@$post['psw'] == "123")
        return true;
    else
        return false;
}

function checkuserlog($post)
{
    if(isset($post['login']) && ($post['psw']))
    {
       /* $userdata = array();*/


        $fichier = file_get_contents('model/Users.json');

        $fichier = json_decode($fichier, true);

        $userdata['name'] = $post['login'];
        $userdata['password'] = $post['psw'];

        $fichier{0} = $userdata;

        $fichier = json_encode($fichier);

        file_put_contents('model/Users.json', $fichier);


           


    }else
    {
        require "view/register.php";
    }
}


?>
