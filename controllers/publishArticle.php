<?php
$title="Publier un article";
include_once('./templates/startRequire.php');
include_once('./templates/navBar.php');
//Connexion à la base de donnéees
include_once('./models/databaseConnect.php');
$database = new dataBase;
$database->connectTo();
if($_SESSION['admin']==1){ //Si l'administrateur est connecté
     require_once './views/publish.php';   
}
if($_SESSION['admin']==0){ //Si l'administrateur n'est pas connecté
     header('Location:'.$_SESSION["link"].'connexion'); 
}
include_once('./templates/endRequire.php');
