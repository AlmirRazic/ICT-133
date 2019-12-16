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
        default:
            home();
    }
}else{
    home();
}



















?>
