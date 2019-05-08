<?php
$title="Vérification"; //Titre de la page
include_once('./templates/startRequire.php'); // Prérequis
include_once('./templates/navBar.php'); // Menu horizontal
include_once('./models/databaseConnect.php'); //Connexion à la base de donnéees
$database = new dataBase;
$database->connectTo();
require_once ('./models/adminVerification.php'); //Vérification des informations de l'administrateur
$email = $_POST['email']; // Récupération de l'e-mail saisi
$password = $_POST['password']; //Récupération du MDP saisi
$verif = new Admin;
$verif->verif($email, $password); //Lance la vérification avec les infos récupérées