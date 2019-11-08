<?php


    include ('db_selects.php');
    
    $result = listEmployees1 ();
   // var_dump ($result);
    displayTable ($result);
?>

