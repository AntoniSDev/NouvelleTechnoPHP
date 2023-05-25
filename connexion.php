<?php
  //opening php session
  session_start();
 
if(isset($_SESSION["user"])){
    header("Location: user.php");  
    exit; 
};

//checking if form is sent
if(!empty($_POST)){
    //form is sent
    //checking all fields not empty
    if(isset($_POST["email"], $_POST["pass"])
    && !empty($_POST["email"]
    && !empty($_POST["pass"]))
    ){
      //checking email is real email
      if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        die("This is not a mail");
      }

      //connect db
      require_once "includes/connect.php";

      $sql = "SELECT * FROM users WHERE email = :email";

      $query = $db->prepare($sql);

      $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

      $query->execute();

      $user = $query->fetch();

      if(!$user){
        die("User/Password wrong");
      }

      // user exists , checking password

      if(!password_verify($_POST["pass"], $user["pass"])){
        die("User/Password wrong");
      }

      //user and password ok
      //connecting user 



      //inject user info in $_SESSION
      $_SESSION["user"] = [
        "id" => $user["id"],
        "nick" => $user["username"],
        "email" => $user["email"]
      ];

      //redirect on userpage
      header("Location: user.php");




    }
}
    







// define title
$title = "Connect";

// Include files
// @Include to hide errors
// include_once is better to avoid errors

include "includes/header.php";
include "includes/navbar.php";

//page content
?>

<h1>Connect</h1>
<form action="" method="post">  
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="pass">password</label>
        <input type="password" name="pass" id="pass">
    </div>
    <button type="submit">Connect now</button>
</form>


<?php

//include footer
include "includes/footer.php";
