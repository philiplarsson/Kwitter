<?php
/**
 * Helper functions.
 *
 * All functions that helps the view to display its data should 
 * be in this file. 
 * These functions should be somewhat common across the application.
 */


/*
   #------------------------------------------------------------------
   # Returns title of page using title stored in config array.
   #------------------------------------------------------------------
 */
function get_title($title = "")
{
    global $config;
    $base_title = $config["title"];
    if ( empty($title) ) {
        return $base_title;
    } else {
        return $base_title . " | " . $title;
    }
}

/*
   #------------------------------------------------------------------
   # Returns link to user image from gravatar
   #------------------------------------------------------------------
 */
function getGravatarImage($email)
{
    $gravatar_base_url = "http://www.gravatar.com/avatar/";
    $email = trim($email);
    $email = strtolower($email);
    $email_md5 = md5($email);
    $grav_url = $gravatar_base_url . $email_md5;
    return $grav_url;
}



?>
