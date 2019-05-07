<?php
$title = "Article - ".$idArticle." - Jean forteroche";
include_once('./templates/startRequire.php');
include_once('./templates/navBar.php');
//Connexion à la base de donnéees
include_once('./models/databaseConnect.php');
$database = new dataBase;
$database->connectTo();
require_once('./views/onePost.php');
require_once('./models/postManager.php');
$post = new Post;
$post->getOne($idArticle);
require_once('./views/commentView.php');
require_once('./models/commentsManager.php');
$comment = new Comment;
$comment->getAllComment($idArticle);
require_once('./views/commentForm.php');
include_once('./templates/footer.php');
include_once('./templates/endRequire.php');
