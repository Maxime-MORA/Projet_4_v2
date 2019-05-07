<?php
$title="Tout les articles";
include_once('./templates/startRequire.php');
include_once('./templates/navBar.php');
//Connexion à la base de donnéees
include_once('./models/databaseConnect.php');
$database = new dataBase;
$database->connectTo();
require_once('./views/allPost.php');
require_once('./models/postManager.php');
$post = new Post;
$post->getAll();
include_once('./templates/footer.php');
include_once('./templates/endRequire.php');
