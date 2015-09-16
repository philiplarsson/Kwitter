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
   #------------------------------------------------------------------ 
 */
function view($path, $data = null)
{
    if ( $data ) {
        extract($data);
    }
    global $my_title;
    $path =  $path . ".view.php";
    include "views/layout.php";
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


?>
