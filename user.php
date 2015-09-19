<?php
require "kwitter.php";
$db = new Database($config);

session_start();

if ( isset( $_SESSION["username"] ) ) {
    // Session is set, user logged in
    $username = $_SESSION["username"];
    $user = $db->getUserByUsername($username);
    $user_array = array(
        "username" => $user["username"],
        "email"    => $user["email"],
        "name"     => $user["name"]
    );
} else {
    // Send back to login page
    header("Location: login.php");
}



if (isset($user_array)) {
    view("user", $user_array);
} else {
    view("user");
}

?>

