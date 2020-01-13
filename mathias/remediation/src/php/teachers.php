<?php
//*********************************************************
// Company      : ETML
// Author       : Mathias Groux
// Date         : 18.05.2017
// Summary      : Teachers table
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

//Disable error's display caused by PHP (everything works perfectly ;-) )
ini_set('display_errors','0');
?>

    <html>
        <body>
            <section>
                <!--table wich display the teachers 's informations-->
                <table style="width:100%">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Surnom</th>
                        <th>Section</th>
                        <th>Action</th>
                    </tr>
                    <!-- Display the db list-->
                    <?php

                    // Call class
                    $db = new DBAccess();

                    // Research all teacher value
                    $allTeachers = $db->getAllTeacher();

                    // Display  teachers values
                    foreach ($allTeachers as $teacher)
                    {
                        //Only if the teacher isi not desactivated
                        if ($teacher[teaIsDeleted]!=1)
                        {
                            //If the user is allowed to modify or delete
                            if (isset($_SESSION['name']))
                            {
                                echo "
                                <tr>
                                    <td>$teacher[teaLastName]</td>
                                    <td>$teacher[teaFirstName]</td>
                                    <td>$teacher[teaNickname]</td>
                                    <td>$teacher[secName]</td>
                                    <th>
                                        <a href=\"detail.php?id=$teacher[idTeacher]\">D</a>
                                        <a href=\"editTeacher.php?id=$teacher[idTeacher]\">M</a>
                                        <a href=\"deleteTeacher.php ?id=$teacher[idTeacher]\">E</a>
                                    </th>
                                </tr>";
                            }
                            //The user can only see the informations
                            else
                            {
                                echo "
                                <tr>
                                    <td>$teacher[teaLastName]</td>
                                    <td>$teacher[teaFirstName]</td>
                                    <td>$teacher[teaNickname]</td>
                                    <td>$teacher[secName]</td>
                                    <th>
                                        <a href=\"detail.php ?id=$teacher[idTeacher]\">D</a>
                                    </th>
                                </tr>";
                            }
                        }
                    }
                    ?>
                    </tr>
                </table>
            </section>
        </body>
    </html>

<?php

// Includes header and menu
include_once ("footer.php");