<?php

require "kwitter.php";

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
            $status = "Login correct. Welcome $username!";
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
