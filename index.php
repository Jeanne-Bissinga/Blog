<?php
require_once("config/functions.php");
$articles = getArticles();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Mon blog </h1>
    <?php foreach($articles as $article): ?>
    <h2><?= $article->title ?></h2>
    <time><?= $article->date ?></time> </br></br>
    <a href="article.php?id= <?= $article->id ?>">Lire la suite</a>
    <?php endforeach;?>
</body>

</html>