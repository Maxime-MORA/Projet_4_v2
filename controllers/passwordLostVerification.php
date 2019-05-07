<?php
$title="E-mail envoyé";
include_once('./templates/startRequire.php');
include_once('./templates/navBar.php');
//Connexion à la base de donnéees
include_once('./models/databaseConnect.php');
$database = new dataBase;
$database->connectTo();
include_once('./models/passwordGeneration.php');
$comment = new password;
$comment->emailVerification($_POST['recovery-email']);
include_once('./templates/endRequire.php');