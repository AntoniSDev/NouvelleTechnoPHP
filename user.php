<?php
  //opening php session
  session_start();

// define title
$title = "User Page";

// Include files
// @Include to hide errors
// include_once is better to avoid errors

include "includes/header.php";
include "includes/navbar.php";

//page content
?>

<h1>Welcome <?= $_SESSION["user"]["nick"] ?> </h1>
<p>Nickname: <?= $_SESSION["user"]["nick"] ?></p>
<p>Email: <?= $_SESSION["user"]["email"] ?></p>

<?php

//include footer
include "includes/footer.php";
