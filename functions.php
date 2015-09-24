<?php
/**
 * Functions not related to db.
 *
 */



/* 
   #------------------------------------------------------------------ 
   # Include view from path.
   # If data is included, that will be extracted:
   # extract(array("color" => "blue")) => $color = blue
   # If second parameter is false, data wont be extracted.
   # By not extracting data, the specified data will just be passed
   # allong to the view.
   #------------------------------------------------------------------ 
 */
function view($path, $data = null, $extract_data = true)
{
    if ( $data  && $extract_data ) {
        extract($data); 
    }
    global $my_title;
    $path =  $path . ".view.php";
    require "views/layout.php";
}

/*
   #------------------------------------------------------------------
   # Checks if email is valid
   #------------------------------------------------------------------
 */
function validEmail($email)
{
    return filter_var( $email, FILTER_VALIDATE_EMAIL );
}

/* 
   #------------------------------------------------------------------ 
   # Register user in specified db.
   # Returns status message.
   # NOTE: This function won't hash password. Expects password to 
   # already be hashed.
   #------------------------------------------------------------------ 
 */
function registerUser($username, $email, $password, $name, $db)
{
    $result = $db->createUser($username, $email, $password, $name);
    if ($result) {
        $status = "You have been registered.";
        // Send to user page.
    } else {
        // User was not created.
        if ($db->getMessage()[1] == 1062) {
            // Duplicate entry/entries.
            $status = "User already exists";
        }
    }
    return $status;
}

/* 
   #------------------------------------------------------------------ 
   # Controlls the specified credentials with the db. 
   # The specified password is hashed and checked against stored 
   # password (via password_verify()).
   #------------------------------------------------------------------ 
 */
function authenticateUser($username, $password, $db)
{
    $user = $db->getUserByUsername($username);
    if ($user) {
        // User exists
        if (password_verify($password, $user["password"]))  {
            // Login correct
            return true;
        } else {
            // Wrong password
            return false;
        }
    } else {
        // User doesn't exist
        return false;
    }
}



?>
