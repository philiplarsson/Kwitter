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
        $user = $db->getUserByUsername($username);
        if ($user) {
            // User exists
            $user_password = $user["password"];
            if (strcmp($user_password, $password) == 0) {
                // Login correct. Send to user page.
                $status = "Login correct. Welcome $username!";
            } else {
                $status = "Wrong password. Try again";
            }
            
        } else {
            $status = "User doesn't exist. Enter another username.";
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
