<?php
  //opening php session
  session_start();

//check if id 
if(!isset($_GET["id"]) || empty($_GET["id"])){
    // id not found
    header("Location: articles.php");
    exit;
}
// recover id
$id = $_GET["id"];

//connect to DB
require_once "includes/connect.php";

//recover article from db with id
$sql = "SELECT * FROM articles WHERE id = :id";

//prepare request
$requete = $db->prepare($sql);

//inject param
$requete->bindValue(":id", $id, PDO::PARAM_INT);

//execute request
$requete->execute();

//recover article fetch
$article = $requete->fetch();

//check if article empty
if(!$article){
    //article not found 404 error
    http_response_code(404);
    echo "Article not found";
    exit;
}



// define title
$title = strip_tags($article["title"]);

// Include files

include "includes/header.php";
include "includes/navbar.php";


//page content
?>

    <article>
        <!-- Strip Tags pour protéger -->
        
        <h1><?= strip_tags($article["title"]) ?></h1>
        <p>Date <?= $article["created_at"]?></p>
        <div><?= $article["content"] ?></div>
    </article>    




<?php
include "includes/footer.php";
