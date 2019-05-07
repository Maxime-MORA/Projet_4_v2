<?php
$title="Suppression d'article";
include_once('./templates/startRequire.php');
//Connexion à la base de donnéees
include_once('./models/databaseConnect.php');
$database = new dataBase;
$database->connectTo();
if($_SESSION['admin']==1){ //Si l'administrateur est connecté
     require_once('./models/postManager.php');
     $post = new Post;
     $post->deleteArticle($id); 
     header('Location:'.$_SESSION["link"].'article');
}
if($_SESSION['admin']==0){
     header('Location:'.$_SESSION["link"].'connexion'); 
}
include_once('./templates/endRequire.php');