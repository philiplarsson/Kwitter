<?php

require "kwitter.php";
session_start();

$db = new Database($config);
$kweets = $db->getKweets();
$my_title = "Posts";


// Add username to each tweet
if ($kweets) {
    foreach ($kweets as &$kweet) {
        $user = $db->getUserById($kweet["user_id"]);
        $username = $user["username"];
        $kweet["username"] = $username;
        $kweet[] = $db->getUserById($kweet["user_id"])["username"];
    }
    view("posts", $kweets, false);
} else {
    view("posts");
}





?>
