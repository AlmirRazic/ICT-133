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

function home(){
    $_GET['action']="home";
    require "view/home.php";
}

















?>
