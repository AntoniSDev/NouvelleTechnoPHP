<?php
  //opening php session
  session_start();

//form
if(!empty($_POST)){
    //post not empty, cheking all datas
    if(
        isset($_POST["title"], $_POST["content"])
        && !empty($_POST["title"])
        && !empty($_POST["content"])
    ){

        //form complete
        //recover and protect data ( XSS )
        //removing tag from title
        $title = strip_tags($_POST["title"]);

        //neutralize tags from content
        $content = htmlspecialchars($_POST["content"]);

        //register data
        //connect to db
        require_once "../../includes/connect.php";

        //writing request
        $sql = "INSERT INTO articles (title, content) VALUES (:title, :content)";

        //prepare request
        $query = $db->prepare($sql);

        //inject values
        $query->bindvalue(":title", $title, PDO::PARAM_STR);
        $query->bindvalue(":content", $content, PDO::PARAM_STR);

        //execute request
        if(!$query->execute()){
            die("Error");
        }

        //recover article id
        $id = $db->lastInsertId();

        die("article $id added");

    }else{
        die("Form empty");
    }
}
 

$title = "add article";
//include header
include_once "../../includes/header.php";

include_once "../../includes/navbar.php";
?>
<h1>Add article</h1>

<form action="" method="post">
<div>
    <label for="title">Title</label>
    <input type="text" name="title" id="title">
</div>
<div>
    <label for="content">content</label>
    <textarea name="content" id="content"></textarea>    
</div>
<button type="submit">ok</button>
</form>




<?php
include_once "../../includes/footer.php";
