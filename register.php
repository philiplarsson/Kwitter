<?php

require "kwitter.php";

$db = new Database($config);


if ( $_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    if ( empty ($username) ||
         empty($name) ||
         empty($email) ||
         empty($password)) {
        $status = "Missing information.";
    } else if ( !validEmail($email)) {
        $status = "Please enter a correct email.";
    } else {
        // Register user
        $status = registerUser($username, $email, $password, $name, $db);
    }
}


// Display view
if ( isset($status) ) {
    view("register",
         array("status" => $status));
} else {
    view("register");
}

?>
