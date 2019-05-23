<?php
$title="Mise à jour des informations"; //Titre des pages
include_once('./templates/startRequire.php'); //Requis HTML ( head + ouverture des balises )
include_once('./templates/navBar.php'); //Menu de navigation horizontal

if($_SESSION['admin']==1){ //Si l'administrateur est connecté
    if ($action ==1 ){ //Modification du MDP - Etape 1 - Formulaire
        require_once './views/modify-pass.php';
    }
    if ($action ==2 ){ //Modification du MDP - Etape 2 - Envoie sur la BDD
        $newpass = $_POST['modify-password']; //Recuperation du mot de passe modifié
        include_once('./models/databaseConnect.php'); //Connexion à la base de donnéees
        $database = new dataBase;
        $database->connectTo();
        include_once('./models/passwordGeneration.php');
        $pass = new password;
        $pass->updatePassword($newpass); //Envoi du MDP sur la BDD
    } 
    if ($action ==3 ){ //Modification du MDP - Etape 3 - Message de succés
        include_once('./views/pass-success-change.php');
    }
    if ($action ==4 ){ //Modification de l'email - Etape 1 - Formulaire
        require_once './views/modify-email.php';
    }
    if ($action ==5 ){ //Modification de l'email - Etape 2 - Envoie sur la BDD
        $emailupdate = $_POST['modify-email']; //Recuperation de l'email de passe modifié
        include_once('./models/databaseConnect.php'); //Connexion à la base de donnéees
        $database = new dataBase;
        $database->connectTo();
        include_once('./models/passwordGeneration.php');
        $pass = new password;
        $pass->updateEmail($emailupdate); //Envoi de l'email sur la BDD
    }
    if ($action ==6 ){ //Modification de l'email - Etape 3 - Message de succés
        include_once('./views/email-success-change.php');
    }
}   
elseif($_SESSION['admin']==0){ //Si l'administrateur n'est pas connecté
     header('Location:'.$_SESSION["link"].'connexion');  //Redirection vers la page de connexion
}
include_once('./templates/endRequire.php'); //Requis HTML ( fermeture des balises )

