<?php
//*********************************************************
// Company  : ETML
// Author   : Mathias Groux
// Date     : 18.05.2017
// Summary  : Add teacher by a form
//*********************************************************
// Modifications: -
// Date   : -
// Author : -
// Reason : -
//*********************************************************



// Include Database
include_once ("DBAccess.php");

// Call class
$db = new DBAccess();

// Define variables from POST method
$varTeacher = $_POST['idTeacher'];
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
$db -> getUpdateTeacher($varTeacher, $varLName, $varFName, $varGender, $varNName, $varOrigin, $idSection, $varPhoto);

header('Location: teachers.php');
