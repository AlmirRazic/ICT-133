<?php
//*********************************************************
// Company      : ETML
// Author       : Mathias Groux
// Date         : 18.05.2017
// Summary      : Logout the user
//*********************************************************
// Modifications: -
// Date   : -
// Author : -
// Reason : -
//*********************************************************


// Call sestion
session_start();

// Erase the session tab
session_unset();

// Destroy section to logout
session_destroy();

// Redirect index.php
echo '<meta http-equiv="Refresh" content="0;URL=index.php">';