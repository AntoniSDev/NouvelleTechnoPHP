<?php

//checking if form is sent
if(!empty($_POST)){
    //form is sent
    //checking all fields not empty
    if(isset($_POST["nickname"], $_POST["email"], $_POST["pass"])
        && !empty($_POST["nickname"])
        && !empty($_POST["email"])
        && !empty($_POST["pass"])

    ){
        //form complete
        //recover data and protect
        $nickname = strip_tags($_POST["nickname"]);

        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            die("adress mail wrong");
        }

        // hashing password
        $pass = password_hash($_POST["pass"], PASSWORD_ARGON2ID);

        //register in db
        require_once "connect.php";

        $sql = "INSERT INTO users (username, email, pass) VALUES  (:nickname, :email, '$pass')";

        //prepare request
        $query = $db->prepare($sql);

        $query->bindValue(":nickname", $nickname, PDO::PARAM_STR);
        $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

        $query->execute();




    }else{
        die("Form not complete");
    }
}













// define title
$title = "Register";

// Include files
// @Include to hide errors
// include_once is better to avoid errors

include "header.php";
include "navbar.php";

//page content
?>

<h1>register</h1>
<form action="" method="post">
    <div>
        <label for="nick">nickname</label>
        <input type="text" name="nickname" id="nick">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="pass">password</label>
        <input type="password" name="pass" id="pass">
    </div>
    <button type="submit">register now !</button>
</form>




<?php

//include footer
include "footer.php";
