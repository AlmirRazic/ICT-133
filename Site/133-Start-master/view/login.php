<!--/*
name: Almir Razic
title:login
date: 06.01.2020
version: 1.0
*/-->
<?php

// tampon de flux stocké en mémoire
ob_start();
$titre = "Rent A Snow - login";
?>
<form action="index.php?action=trylogin" method="post">
    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="login" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">Login</button>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>

    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
</form>
<?php
$content = ob_get_clean();
require_once "gabarit.php";
?>