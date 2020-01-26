<?php
/*
name: Almir Razic
title:
date: 16.12.2019
version: 1.0
*/
require_once "controler/controler.php";
session_start();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'home' :
            home();
            break;
        case 'contact':
            contact();
            break;
        case 'login':
            login();
            break;
        case 'trylogin':
            trylogin();
            break;
        case 'logout':
            logout();
            break;
        case 'register':
            register();
            break;
        case 'tryregister':
            tryregister();
            break;
        case 'account':
            account();
            break;
        case 'Snows':
            snows();
            break;
        default:
            home();
    }
} else {
    home();
}
?>
