<?php
session_start();
require "kwitter.php";
$db = new Database($config);

if ( isset($_GET["username"]) ) {
    $username = htmlspecialchars($_GET["username"]);
    $user = $db->getUserByUsername($username);
    $kweets = $db->getKweetsFrom($user);
    if (!$user) {
        // A user with that username couln't be found.
        header("Location: index.php");
    }
} else {
    // If the user goes to profile-page without a specified user, go
    // to index page
    // Should be changed to display a search bar in the future
    header("Location: index.php");
}

$my_title = "Profile page";

if ( isset($user) ) {
    $data = array(
        "user"   => $user,
        "kweets" => $kweets
    );
    view("profile", $data);
}
//else {
//view("profile");
//}

?>
