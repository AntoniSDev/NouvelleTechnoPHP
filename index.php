<?php  
    // include functions file
    include_once "includes/functions.php";
    
    //require is doing fatal error if problem
    //require_once can be used only one time

    // define title
$title ="Main Page";

   // Include files
   // @Include to hide errors
   // include_once is better to avoid errors

   include "includes/header.php";   
   include "includes/navbar.php";

    //page content
    ?>

    <p>Main page content</p>

    <?php
    verifForm();
   include "includes/footer.php";


