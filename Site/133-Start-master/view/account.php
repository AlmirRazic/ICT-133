<!--/*
name: Almir Razic
title:account
date: 25.01.2020
version: 1.0
*/-->
<?php
ob_start();
$title = "RentASnow - account";

?>

<div>
    username:
    <?= $_SESSION['login'] ?>
    <br>
</div>
<a href="index.php?action=passwordchange">Changer de mot de passe</a>
<?php

$content = ob_get_clean();
require_once "gabarit.php";
?>