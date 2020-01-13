<?php
//*********************************************************
// Company  : ETML
// Author   : Mathias Groux
// Date     : 18.05.2017
// Summary  : Display teacher details
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
        <title>Nickname</title>

        <!-- CSS -->
        <link href="../../resources/css/style.css" type="text/css" rel="stylesheet" media="all">

    </head>
        <body>
            <section>
                <table style="width:100%">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Surnom</th>
                        <th>Origine</th>
                        <th>Genre</th>
                        <th>Section</th>
                    </tr>
                    <!-- Display the db list-->
                    <?php

                    //Define variables from GET method
                    $id = $_GET['id'];

                    // Research Teacher values
                    $db = new DBAccess();
                    $teacher = $db->getTeacher($id);

                    // Display values for each
                    echo "<tr>
                            <td>$teacher[teaLastName]</td>
                            <td>$teacher[teaFirstName]</td>
                            <td>$teacher[teaNickname]</td>
                            <td>$teacher[teaOrigin]</td>
                            <td>$teacher[teaGender]</td>
                            <td>$teacher[secName]</td>
                        </tr>";
                    ?>

                </table>
            </section>
        </body>
    </html>

<?php

// Includes footer
include_once ("footer.php");