<?php
//*********************************************************
// Company  : ETML
// Author   : Mathias Groux
// Date     : 18.05.2017
// Summary  : Edit teacher by a form
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
        <!-- Title -->
        <h2>
            Ajouter un enseignant
        </h2>
            <!-- section initialise -->
            <section>
                <!-- Form and validation form initialise -->
                <form name="formEditTeacher.php" action="formEditTeacher.php" method="post">
                    <table style="...">
                        <?php

                        //Define variables from GET method
                        $id = $_GET['id'];

                        // Research Teacher values
                        $db = new DBAccess();
                        $teacher = $db->getTeacher($id);

                        print "
                                <!-- id entry -->
                                <input type=\"hidden\" value=\"$id\" name=\"idTeacher\">

                                <!-- Photo entry -->
                                <tr>
                                    <td>
                                        Photo
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input id=\"photo\" type=\"text\" name=\"photo\" size=\"1\" value=\"$teacher[teaImage]\">
                                    </td>
                                </tr>

                                <!-- Name entry -->
                                <tr>
                                    <td>
                                        Nom
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input id=\"name\" type=\"text\" name=\"lastName\" value=\"$teacher[teaLastName]\">
                                    </td>
                                </tr>

                                <!-- First name entry -->
                                <tr>
                                    <td>
                                        Prénom
                                </tr>
                                <tr>
                                    <td>
                                        <input id=\"firstName\" type=\"text\" name=\"firstName\" value=\"$teacher[teaFirstName]\">
                                    </td>
                                </tr>

                                <!-- Nickname entry -->
                                <tr>
                                    <td>
                                        Surnom
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input id=\"nickname\" type=\"text\" name=\"nickname\" value=\"$teacher[teaNickname]\">
                                    </td>
                                </tr>

                                <!-- Origin entry -->
                                <tr>
                                    <td>
                                        Origine
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input id=\"origin\" type=\"text\" name=\"origin\" value=\"$teacher[teaOrigin]\">
                                    </td>
                                </tr>

                                <!-- Gender selector -->
                                <tr>
                                    <td>
                                        Genre
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       <select name=\"gender\" size=\"1\">";

                        // Selected a option
                        if ($teacher['teaGender'] == "M") {
                            print "<option selected>M</option>";
                        } else {
                            print "<option>M</option>";
                        }

                        if ($teacher['teaGender'] == "W") {
                            print "<option selected>W</option>";
                        } else {
                            print "<option>W</option>";
                        }

                        if ($teacher['teaGender'] == "A") {
                            print "<option selected>A</option>";
                        } else {
                            print "<option>A</option>";
                        }

                        print "</select>
                                    </td>
                                </tr>

                                <!-- Section selector -->
                                <tr>
                                    <td>
                                        Section
                                </tr>
                                <tr>
                                    <td>
                                        <select name=\"section\" size=\"1\">";

                        // Research all teacher value
                        $allTeachers = $db->getAllSection();

                        // Display  teachers values
                        foreach ($allTeachers as $teacher) {
                            print "<option>$teacher[secName]</option>";
                        }
                        print " </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- Form sender -->
                                        <input class=\"button\" id=\"input\" type=\"submit\">
                                    </td>
                                </tr>";
                        ?>
                    </table>
                    <!-- // End table -->
                </form>
                <!-- // End forme -->
            </section>
        <!-- // End section -->
        </body>
    </html>

    <?php
}
// Includes header and menu
include_once ("footer.php");