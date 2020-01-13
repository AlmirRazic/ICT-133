<?php
//*********************************************************
// Company  : ETML
// Author   : Mathias Groux
// Date     : 18.05.2017
// Summary  : Delete db entry
//*********************************************************
// Modifications: -
// Date   : -
// Author : -
// Reason : -
//*********************************************************



// Includes header and menu
include_once ("header.php");
include_once ("menu.php");

// Include Database
include_once ("DBAccess.php");

?>

    <html>
    <head lang="en">
        <meta charset="utf-8">

        <!-- Title -->
        <title>Le nom de Nick</title>

        <!-- CSS -->
        <link href="../../resources/css/style.css" type="text/css" rel="stylesheet" media="all">
    </head>
        <body>
            <section>

                <h3>Voulez-vous effacer cette entrée de la base de données?</h3>
                <table style="...">
                    <?php

                    // Call the class and define id entry to delete
                    $db = new DBAccess();
                    $id = $_GET['id'];

                    // Delete Teacher values
                    $db->getDeleteTeacher($id);

                    echo "
                            <tr>
                                <td>Valeur supprimée, voulez-vous revenir aux ensaignants ?</td>
                                <td><a href=\"teachers.php\"><div class=\"button\">Enseignants</div></td></a>
                            </tr>";
                    ?>
                </table>
            </section>
        </body>
    </html>

<?php

// Includes header and menu
include_once ("footer.php");