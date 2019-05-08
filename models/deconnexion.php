<?php
//Déconnexion de l'administrateur
    $_SESSION['admin']=0; //Changement de la valeur de 'admin' = 0 = UTILISATEUR
    header('Location:'.$_SESSION["link"]); //Redirection vers la page d'accueil
?>