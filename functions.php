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

?>
