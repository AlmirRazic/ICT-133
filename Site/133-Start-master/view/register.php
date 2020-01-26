<!--/*
name: Almir Razic
title:register
date: 20.01.2020
version: 1.0
*/-->
<?php
ob_start();
$titre = "Rent A Snow - register";
?>
<form action="index.php?action=tryregister" method="post">

    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="login" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">register</button>
    </div>
</form>
<?php
$content = ob_get_clean();
require_once "gabarit.php";


?>


