<?php
session_start();

session_destroy();
$_SESSION = array();

// delete cookies...

header("Location: index.php");

?>
