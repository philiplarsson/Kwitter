<?php
/**
* Functions not related to db.
*
*/

/* 
   #------------------------------------------------------------------ 
   # Include view from path.
   #------------------------------------------------------------------ 
 */
function view($path)
{
    global $my_title;
    $path =  $path . ".view.php";
    include "views/layout.php";
}

?>
