<?php
session_start();

// Destroy the session to log the user out
session_destroy();

// Redirect to the login or home page after logging out
header("Location: index.php");
exit;
?>
