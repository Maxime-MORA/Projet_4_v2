<?php
$title="Page d'accueil";
include_once('./templates/startRequire.php');
include_once('./templates/navBar.php');
include_once('./templates/heroBanner.php');
//Connexion à la base de donnéees
include_once('./models/databaseConnect.php');
$database = new dataBase;
$database->connectTo();
require_once('./views/lastPost.php');
require_once('./models/postManager.php');
$post = new Post;
$post->getLast(3);
include_once('./templates/footer.php');
include_once('./templates/endRequire.php');
