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
    $path =  $path . ".view.php";
    include "views/layout.php";
}

?>
