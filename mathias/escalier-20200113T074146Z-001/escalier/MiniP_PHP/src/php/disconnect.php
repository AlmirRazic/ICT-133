<?php
/**
 * ETML
 * Auteur: Jérôme Wassenberg
 * Date: 20.03.2017
 * Description : Déconnecte l'utilisateur
 */
session_start();
unset($_SESSION['login']);
unset($_SESSION['username']);
#$_SESSION['login'] = "123";
echo "<meta http-equiv='refresh' content='0; URL=index.php'>";
?>