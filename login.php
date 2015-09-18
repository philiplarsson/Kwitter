<?php

require "kwitter.php";
session_start();

$db = new Database($config);

$my_title = "Login Page";

if ( $_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $username = $_POST["username"];
    if ( empty($password) || empty($username)) {
        $status = "Missing email or username.";
    } else {
        // log in user
        if (authenticateUser($username, $password, $db)) {
            // Login correct. Send to user page.
            $_SESSION["username"] = $username;
            header("Location: user.php");
        } else {
            $status = "Wrong credentials. Please try again.";
        }
            
    }
}

if (isset($status)) {
    view("login",
         array("status" => $status));
} else {
    view("login");
}
?>
