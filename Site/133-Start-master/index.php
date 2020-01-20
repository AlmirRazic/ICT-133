<?php
/*
name: Almir Razic
title:
date: 16.12.2019
version: 1.0
*/
require "controler/controler.php";

if (isset($_GET['action'])){
    $action = $_GET['action'];
    switch ($action){
        case 'home' :
            home();
            break;
        case 'contact':
            contact();
            break;
        case 'login':
            login($_POST);
            break;
        case 'logout':
            logout($_POST);
            break;
        case 'register':
            register($_POST);
            break;
        default:
            home();
    }
}else{
    home();
}



















?>
