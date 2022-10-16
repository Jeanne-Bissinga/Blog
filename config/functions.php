<?php 
    //fonction qui récupère touts les articles
    function getArticles(){
        require("config/connect.php");
        $req = $bdd->prepare("SELECT id, title, date FROM articles ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    //fonction qui récupère un article
    function getArticle($id){
        require("config/connect.php");
        $req = $bdd->prepare("SELECT * FROM articles WHERE id=?");
        $req->execute(array($id));
        if($req->rowCount() == 1){
            $data = $req->fetch(PDO::FETCH_OBJ);
            return $data;
        }
        else
            header("Location: index.php");
        $req->closeCursor();
    }

    //fonction qui ajoute un commentaire à la bdd
    function addComment($articleId, $author, $comment){
        require("config/connect.php");
        $req = $bdd->prepare("INSERT INTO comments (articleId, author, comment, date) VALUES (?,?,?,NOW())");
        $req->execute(array($articleId, $author, $comment));
        $req->closeCursor();
    }

    //fonction qui récupère les commentaires d'un article
    function getComments($id){
        require("config/connect.php");
        $req = $bdd->prepare("SELECT * FROM comments WHERE articleId = ?");
        $req->execute(array($id));
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        //$req->closeCursor();
    }
?>