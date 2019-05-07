<?php
$title="Mise à jour de l'article - ".$idArticle;
include_once('./templates/startRequire.php');
include_once('./templates/navBar.php');
//Connexion à la base de donnéees
include_once('./models/databaseConnect.php');
$database = new dataBase;
$database->connectTo();
require_once('./models/postManager.php');
$post = new Post;
$post->updateOne($idArticle);
if($_SESSION['admin']==1){ //Si l'administrateur est connecté
     require_once './views/update.php';   
}
if($_SESSION['admin']==0){ //Si l'administrateur n'est pas connecté
     header('Location:'.$_SESSION["link"].'connexion'); 
}


