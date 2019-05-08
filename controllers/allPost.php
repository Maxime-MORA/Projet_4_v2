<?php
$title="Tout les articles"; //Titre de la page
include_once('./templates/startRequire.php'); //Prérequis
include_once('./templates/navBar.php'); //Menu horizontal
include_once('./models/databaseConnect.php'); //Connexion à la base de donnéees
$database = new dataBase;
$database->connectTo();
require_once('./views/allPost.php');
require_once('./models/postManager.php');
$post = new Post;
$post->getAll(); //Récupération de tout les articles
include_once('./templates/footer.php'); // Intégration du footer
include_once('./templates/endRequire.php'); //Fermeture des balises
