<?php
require "kwitter.php";
session_start();

if ( isset( $_SESSION["username"] ) ) {
    // Session is set, user logged in
    $username = $_SESSION["username"];
} else {
    // Send back to login page
    header("Location: login.php");
}


// Just for now, this should be moved to a view
if (isset($username)) {
    echo "<h1>Welcome $username </h1>";
}

echo "Im on user page.";
echo "</br>";

echo "<a href='logout.php'>logout</a>";


?>

