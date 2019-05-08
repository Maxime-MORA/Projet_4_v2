<?php
$title="Page d'accueil"; //Titre de la page
include_once('./templates/startRequire.php'); //Prerequis HTML
include_once('./templates/navBar.php'); //Menu horizontal
include_once('./templates/heroBanner.php'); //Banniere
include_once('./models/databaseConnect.php'); //Connexion à la base de donnéees
$database = new dataBase;
$database->connectTo();
require_once('./views/lastPost.php'); //Vue des derniers articles
require_once('./models/postManager.php');
$post = new Post;
$post->getLast(3); //Chargement des derniers articles (3)
include_once('./templates/footer.php'); //Insertion du footer
include_once('./templates/endRequire.php'); //Fermeture des balises HTML
