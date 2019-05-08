<?php
$title="Publier un article"; //Titre de la page
include_once('./templates/startRequire.php'); //Prerequis HTML
include_once('./templates/navBar.php'); //Menu horizontal
include_once('./models/databaseConnect.php'); //Connexion à la base de donnéees
$database = new dataBase;
$database->connectTo();
if($_SESSION['admin']==1){ //Si l'administrateur est connecté
     require_once './views/publish.php';   //Chargement du formulaire de mise en ligne d'un article - TinyMCE
}
if($_SESSION['admin']==0){ //Si l'administrateur n'est pas connecté
     header('Location:'.$_SESSION["link"].'connexion'); //Redirection vers la page de connexion
}
include_once('./templates/endRequire.php'); //Fermeture des balises HTML
