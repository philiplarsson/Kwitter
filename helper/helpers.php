<?php

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
   # Checks if email is valid
   #------------------------------------------------------------------
 */
function valid_email($email)
{
    return filter_var( $email, FILTER_VALIDATE_EMAIL );
}


?>
