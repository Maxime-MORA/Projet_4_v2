<?php
$title="Suppresion du commentaire"; //Titre de la page
include_once('./templates/startRequire.php'); //Prérequis HTML
include_once('./models/databaseConnect.php'); //Connexion à la base de donnéees
$database = new dataBase;
$database->connectTo();
if($_SESSION['admin']==1){ //Si l'administrateur est connecté
     include_once('./models/commentsManager.php');
     $comment = new Comment;
     $comment->deleteComment($commentid); //Supprimer le commentaire dont l'id = $commentid
     header('Location:'.$_SESSION["link"].'article'); //Redirection vers la page d'articles
}
if($_SESSION['admin']==0){ //Si l'administrateur n'est pas connecté
     header('Location:'.$_SESSION["link"].'connexion');  //Redirection vers la page de connexion
}
include_once('./templates/endRequire.php'); //Fermeture des balises HTML