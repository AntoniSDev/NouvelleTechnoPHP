<?php
  //opening php session
  session_start();

  if(!isset($_SESSION["user"])){
    header("Location: connexion.php");  
    exit; 
};

// include functions file
include_once "includes/functions.php";

//require is doing fatal error if problem
//require_once can be used only one time

// define title
$title = "Main Page";

// Include files
// @Include to hide errors
// include_once is better to avoid errors

include "includes/header.php";
include "includes/navbar.php";

//page content
?>

<p>Main page content</p>

<?php
// include connect
require_once "includes/connect.php";

$username = "admin";
$pass = "lolpass";

$sql = "SELECT * FROM users WHERE username =:username AND pass=:pass";

// PREPARE request
$requete = $db->prepare($sql);

// INJECT VALUES "bindvalue"
$requete->bindvalue(":username", $username, PDO::PARAM_STR);
$requete->bindvalue(":pass", $pass, PDO::PARAM_STR);


// execute request
$requete->execute();


$user = $requete->fetchAll();

echo"<pre>";
var_dump($user);
echo"</pre>";

//include footer
include "includes/footer.php";
