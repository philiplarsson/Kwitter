<?php

require "kwitter.php";

if ( $_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    print_r( filter_var( $email, FILTER_VALIDATE_EMAIL));
    if ( empty ($username) ||
         empty($name) ||
         empty($email) ||
         empty($password)) {
        $status = "Missing information.";
    } else if ( !valid_email($email)) {
        $status = "Please enter a correct email.";
    } else {
        // Register user
        $status = "You have been registered.";
    }
}

if ( isset($status) ) {
    view("register",
         array("status" => $status));
} else {
    view("register");
}

?>
