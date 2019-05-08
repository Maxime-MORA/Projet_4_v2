<?php
$title="Mise à jour de l'article - ".$idArticle; //Titre de la page
include_once('./templates/startRequire.php'); //Prerequis HTML
include_once('./templates/navBar.php'); //Menu horizontal
include_once('./models/databaseConnect.php'); //Connexion à la base de donnéees
$database = new dataBase;
$database->connectTo();
require_once('./models/postManager.php');
$post = new Post;
$post->updateOne($idArticle); //Mise à jour de l'article dont l'id = $idArticle
if($_SESSION['admin']==1){ //Si l'administrateur est connecté
     require_once './views/update.php'; //Chargement de la vue de modification d'article
}
if($_SESSION['admin']==0){ //Si l'administrateur n'est pas connecté
     header('Location:'.$_SESSION["link"].'connexion'); //Redirection vers la page de connexion
}


