<?php
$title="suppréssion du signalement";
include_once('./templates/startRequire.php');
//Connexion à la base de donnéees
include_once('./models/databaseConnect.php');
$database = new dataBase;
$database->connectTo();
if($_SESSION['admin']==1){ //Si l'administrateur est connecté
     include_once('./models/commentsManager.php');
     $comment = new Comment;
     $comment->signalDelete($commentid);
     header('Location:'.$_SESSION["link"].'article');
}
if($_SESSION['admin']==0){ //Si l'administrateur n'est pas connecté
     header('Location:'.$_SESSION["link"].'connexion'); 
}
include_once('./templates/endRequire.php');