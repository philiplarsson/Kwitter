<?php

require "kwitter.php";

$my_title = "Login Page";

if ( $_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $username = $_POST["username"];
    if ( empty($password) || empty($username)) {
        $status = "Missing email or username.";
    } else {
        // log in user
        $status = "Thanks for logging in with $username and $password.";
    }
}

if (isset($status)) {
    view("login",
     array("status" => $status));
} else {
    view("login");
}
?>
