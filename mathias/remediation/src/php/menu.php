<?php

//*********************************************************
// Company      : ETML
// Author       : Mathias Groux
// Date         : 18.05.2017
// Summary      : Menu
//*********************************************************
// Modifications: -
// Date   : -
// Author : -
// Reason : -
//*********************************************************



// Session start and login = false
session_start();
?>
<html>
    <body>
        <menu>
            <a href="index.php"><div class="menu">Accueil</div></a>
            <a href="section.php"><div class="menu">Sections</div></a>
            <a href="teachers.php"><div class="menu">Enseignants</div></a>
            <?php
            // If session value is empty or not and define menu link
            if( isset($_SESSION['name']))
            {
                echo "<a href=\"addTeacher.php\"><div class=\"menu\">+ Ajouter un enseignant</div></a>";
                echo "<a href=\"logout.php\"><div class=\"menu\">Deconnexion</div></a>";
            }
            else
            {
                echo "<a href=\"login.php\"><div class=\"menu\">Connexion</div></a>";
            }
            ?>
        </menu>
    </body>
</html>