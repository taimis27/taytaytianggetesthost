<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session
session_destroy();
 
// Redirect to signin.html
header("location: signin.html");
exit;
?>
