<?php
// see all articles in db
//connect to DB
require_once "includes/connect.php";
//write request
$sql = "SELECT * FROM articles ORDER BY created_at DESC";
//execute request
$requete = $db->query($sql);
//recover datas
$articles = $requete->fetchAll();





// define title
$title = "Articles";

// Include files

include "includes/header.php";
include "includes/navbar.php";


//page content
?>

<h1>Articles list</h1>

<?php foreach($articles as $article): ?>

<section>
    <article>      
        <h1><a href="article.php?id=<?= $article["id"] ?>"><?= strip_tags($article["title"]) ?></a></h1>
        <p>Date <?= $article["created_at"]?></p>
        <div><?= $article["content"] ?></div>
    </article>    
</section>

<?php endforeach; ?>


<?php
include "includes/footer.php";
