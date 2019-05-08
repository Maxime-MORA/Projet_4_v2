<?php
$title="E-mail envoyé"; //Titre de la page
include_once('./templates/startRequire.php'); //Prérequis HTML
include_once('./templates/navBar.php'); //Menu horizontal
include_once('./models/databaseConnect.php'); //Connexion à la base de donnéees
$database = new dataBase;
$database->connectTo();
include_once('./models/passwordGeneration.php'); //Génération d'un nouveau mot de passe
$comment = new password;
$comment->emailVerification($_POST['recovery-email']); //Vérification de l'email ( e-mail saisi = e-mail de l'admin)
include_once('./templates/endRequire.php'); //Fermeture des balises HTML