<?php
//*********************************************************
// Company  : ETML
// Author   : Mathias Groux
// Date     : 18.05.2017
// Summary  : Add and display the new entry
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

// Call class
$db = new DBAccess();

// Define variables from POST method
$varLName = $_POST['lastName'];
$varFName = $_POST['firstName'];
$varNName = $_POST['nickname'];
$varOrigin = $_POST['origin'];
$varGender = $_POST['gender'];
$varSection = $_POST['section'];

// Photo value detector
if(!empty($_POST['photo']))
{
    $varPhoto = $_POST['photo'];
}
else
{
    $varPhoto = 0;
}


// Convert value
$idSection = $db -> getSection($varSection);

// Creat new entry
$db -> getAddTeacher($varLName, $varFName, $varGender, $varNName, $varOrigin, $idSection, $varPhoto);

?>

    <html>
        <body>
            <section>
                <table style="...">
                    <tr>
                        <td>Nouvelle entrée ajoutée. Voulez-vous revenir à la liste ?</td>
                        <td><a href="teachers.php"><div class="button">Enseignants</div></td></a>
                    </tr>
                </table>
            </section>
        </body>
    </html>

<?php

// Includes header and menu
include_once ("footer.php");