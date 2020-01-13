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




?>
