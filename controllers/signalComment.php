<?php
$title="Signalement du commentaire"; //Titre de la page
include_once('./templates/startRequire.php'); //Prerequis HTML
include_once('./models/databaseConnect.php'); //Connexion à la base de donnéees
$database = new dataBase;
$database->connectTo();
include_once('./models/commentsManager.php');
$comment = new Comment;
$comment->signalComment($commentid); //Signalement du commentaire dont l'id = $commentid
include_once('./templates/endRequire.php'); //Fermeture des balises HTML
header('Location:'.$_SESSION["link"].'article'); //Redirection vers la page des articles