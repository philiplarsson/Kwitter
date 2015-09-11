<?php

require "kwitter.php";

$my_title = "Login Page";

if ( $_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $username = $_POST["username"];
    if ( empty($password) || empty($username)) {
        echo "Missing email or username.";
    } else {
        // log in user
        echo "Thanks for logging in with $username and $password";
    }
}

view("login");

?>
