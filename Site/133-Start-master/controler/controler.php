<?php
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
session_start();
require_once "model/model.php";
function home()
{
    $_GET['action'] = "home";
    require_once "view/home.php";
}

function login()
{

    require_once 'view/login.php';
}

/**
 *
 */
function trylogin()
{
    $uservar = getUsers();

    if (isset($_POST['login'])) {

        foreach ($uservar as $user) {

            {
                if ($_POST['login'] == $user["name"] && $_POST['psw'] == $user["password"]) {
                    $_SESSION['login'] = $_POST['login'];

                    require "view/home.php";
                }
            }


        }
    } else {
        login();
    }
return $_SESSION;
}

/*_*/
function logout()
{
// Erase the session tab
    session_unset();
// Destroy section to logout
    session_destroy();
    home();
}

function register()
{
    require_once 'view/register.php';
}

function account()
{
    require_once 'view/account.php';
}
function snows()
{
    $snows = getSnows();
    require_once 'view/snows.php';
}

function tryregister()
{
    require_once "model/model.php";
    $post = $_POST;
    if (isset($post)) {
        checkuserlog($post);
        $_SESSION['login'] = $_POST['login'];
        home();
    } else {
        require_once "view/register.php";
    }
}

?>
