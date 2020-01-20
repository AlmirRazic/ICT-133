<?php
session_start();

/*
name: Almir Razic
title:
date: 16.12.2019
version: 1.0
*/
/*
Function to redirect the user to the home page
(depending the action received by th index)
*/

function home(){
    $_GET['action']="home";
    require "view/home.php";
}



/**
 *
 */
function login($post){
    $_POST['action']="login";

    require "model/model.php";
    $login=@$_POST['login'];
    $psw=@$_POST['psw'];

    if (isset($post))
    {
        if (checkLogin($post))
        {
            $_SESSION['login'] = $post['login'];
            echo $_SESSION['login'];
        }
        require "view/login.php";
    }else
    {
        require "view/login.php";
    }
}
/*_*/
function logout($post)
{
    // Call sestion
    session_start();

// Erase the session tab
    session_unset();

// Destroy section to logout
    session_destroy();
}

function register($post)
{

    require "model/model.php";

    if (isset($post))
    {
        checkuserlog($post);
        require "view/home.php";
    }else
    {
        require "view/register.php";
    }
}





















?>
