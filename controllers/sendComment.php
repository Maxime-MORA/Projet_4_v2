<?php
$title="Envoi du commentaire";
include_once('./templates/startRequire.php');
//Connexion à la base de donnéees
include_once('./models/databaseConnect.php');
$database = new dataBase;
$database->connectTo();
include_once('./models/commentsManager.php');
$comment = new Comment;
$comment->send($idArticle);
include_once('./templates/endRequire.php');
header('Location:'.$_SESSION["link"].'article-'.$idArticle.'');
