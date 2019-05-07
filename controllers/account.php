<?php
$title="Mise à jour des informations";
include_once('./templates/startRequire.php');
include_once('./templates/navBar.php');

if($_SESSION['admin']==1){ //Si l'administrateur est connecté
    if ($action ==1 ){
        require_once './views/modify-pass.php';
    }
    if ($action ==2 ){
        $newpass = $_POST['modify-password'];
        //Connexion à la base de donnéees
        include_once('./models/databaseConnect.php');
        $database = new dataBase;
        $database->connectTo();
        include_once('./models/passwordGeneration.php');
        $pass = new password;
        $pass->updatePassword($newpass);
    } 
    if ($action ==3 ){
        echo('<h1>Mot de passe modifié avec succés </h1>');
    }
    if ($action ==4 ){
        require_once './views/modify-email.php';
    }
    if ($action ==5 ){
        $emailupdate = $_POST['modify-email'];
        //Connexion à la base de donnéees
        include_once('./models/databaseConnect.php');
        $database = new dataBase;
        $database->connectTo();
        include_once('./models/passwordGeneration.php');
        $pass = new password;
        $pass->updateEmail($emailupdate);
    }
    if ($action ==6 ){
        echo('<h1>Adresse e-mail modifiée avec succés </h1>');
    }
}   
if($_SESSION['admin']==0){ //Si l'administrateur n'est pas connecté
     header('Location:'.$_SESSION["link"].'connexion'); 
}
include_once('./templates/endRequire.php');

