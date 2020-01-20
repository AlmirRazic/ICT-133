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
    if(isset($post['login']) && ($post['pwd']))
    {
        $userdata = array();
        $userdata['name'] = $post['login'];
        $userdata['password'] = $post['pwd'];

        $fichier = file_get_contents('model/Users.json');

        $fichier = json_encode($fichier, true);

        $fichier[] = $userdata;

        $fichier = json_encode($fichier);

        file_put_contents('model/Users.json', $fichier);
    }else
    {
        require "view/register.php";
    }
}


?>
