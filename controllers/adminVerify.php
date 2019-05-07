<?php
$title="Vérification";
include_once('./templates/startRequire.php');
include_once('./templates/navBar.php');
//Connexion à la base de donnéees
include_once('./models/databaseConnect.php');
$database = new dataBase;
$database->connectTo();
require_once './models/adminVerification.php';
$email = $_POST['email'];
$password = $_POST['password'];
$verif = new Admin;
$verif->verif($email, $password);