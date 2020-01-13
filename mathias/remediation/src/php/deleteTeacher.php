<?php
//*********************************************************
// Company  : ETML
// Author   : Mathias Groux
// Date     : 18.05.2017
// Summary  : Confirm delete one db entry
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

// If session value is empty or not and define menu link
if( !isset($_SESSION['name']))
{
    echo "Resource non accessible";
}
else
{

    ?>

    <html>
        <body>
            <section>

                <h3>Voulez-vous effacer cette entrée de la base de données?</h3>
                <table style="...">
                    <?php

                    // Call the class and define id entry to delete
                    $db = new DBAccess();
                    $id = $_GET['id'];

                    // Research Teacher values
                    $db = new DBAccess();
                    $teacher = $db->getTeacher($id);

                    echo "
                                <tr>
                                    <td>
                                        $teacher[teaLastName]
                                        $teacher[teaFirstName]
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=\"deleted.php?id=$teacher[idTeacher]\"><div class=\"button\">Oui</div ></a>
                                        <a href=\"teachers.php\"><div class=\"button\">Non</div></a>
                                    </td>
                                </tr>";

                    ?>
                </table>
            </section>
        </body>
    </html>

    <?php
}
// Includes header and menu
include_once ("footer.php");