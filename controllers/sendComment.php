<?php
$title="Envoi du commentaire"; //Titre de la page
include_once('./templates/startRequire.php'); //Prerequis HTML
include_once('./models/databaseConnect.php'); //Connexion à la base de donnéees
$database = new dataBase;
$database->connectTo();
include_once('./models/commentsManager.php'); 
$comment = new Comment;
$comment->send($idArticle); //Envoie du commentaire sur la BDD
include_once('./templates/endRequire.php'); //Fermeture des balises HTML
header('Location:'.$_SESSION["link"].'article-'.$idArticle.''); //Redirection vers la page de l'article dont l'id = $idArticle
