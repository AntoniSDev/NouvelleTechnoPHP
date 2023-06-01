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

// include connect

require_once "includes/connect.php";





// upload image process
// check if file is sent and if error uplaod = 0
if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {

    // we have the file
    // now -> file security
    // always verify file extension and Mime type
        //add any other type files Mime here, and also in /uploads/.htacess
        $allowed = [
            "jpg"  => "image/jpg",
            "jpeg" => "image/jpeg",
            "png"  => "image/png"            
        ];

        //recover filename
        $filename = $_FILES["image"]["name"];
        //recover type file
        $filetype = $_FILES["image"]["type"];
        //recover file size
        $filesize = $_FILES["image"]["size"];

        //recover extension file
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        // checking if extension / Mime is not correct
        if (!array_key_exists($extension, $allowed) || !in_array($filetype, $allowed)) {
            // extension or type is not correct
            die("file is not an image");
        }

        // file is correct

        // checking size 1mo
        if ($filesize > 1024 * 1024) {
            die("file too big");
        }

    // NOW create the uploads Folder and his .htaccess

        // generate unique name
        $newname = md5(uniqid());
        // generate path :  __DIR__ = recover path of this php file
        $newfilename = __DIR__ . "/uploads/$newname.$extension";

        //move file from temp folder -> ["tmp_name"] of image array, to upload folder ->  /uploads and rename it
        if(!move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename)){
            die("upload failed");
        }      

        //644 to forbidden files from execution, can be changed for other permissions
        chmod($newfilename, 0644);
        
            //upload image to db
            //$req = $db->prepare('INSERT INTO tablename (tablecolumn) VALUES (?)');
            //$req->execute([$newfilename]); 



        //var_dump($newfilename);
}

//echo "<pre>";
//var_dump($_FILES);
//echo "</pre>";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add File</title>
</head>

<body>
    <h1>Add file</h1>
    <!-- Encode form -->
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="fichier">File</label>
            <!-- For mulitple uploads : 
            array in name -> name="image[]"
            + input  multiple> -->
            <input type="file" name="image" id="fichier">
        </div>
        <button type="submit">send</button>


    </form>

</body>

</html>