<?php
$title="Envoie de l'article modifié"; //Titre de la page
include_once('./templates/startRequire.php'); //Prerequis HTML
include_once('./templates/navBar.php'); //Menu horizontal
include_once('./models/databaseConnect.php'); //Connexion à la base de donnéees
$database = new dataBase;
$database->connectTo();
if($_SESSION['admin']==1){ //Si l'administrateur est connecté
     require_once './models/postManager.php';
     $post = new Post;
     $post->publishArticle(); //Envoie de l'article sur la BDD
     header('Location:'.$_SESSION["link"].'article'); //Redirection vers la page d'articles
}
if($_SESSION['admin']==0){ //Si l'administrateur n'est pas connecté 
     header('Location:'.$_SESSION["link"].'connexion'); //Redirection vers la page de connexion
}
include_once('./templates/endRequire.php'); //Fermeture des balises HTML