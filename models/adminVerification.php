<?php
class Admin extends dataBase
{
public function verif($email, $password){ //Vérification des données entrées lors de la connexion
$db=$this->connectTo(); 
//Récupération des informations utilisateurs
$retour = $db->prepare('SELECT email, password FROM users WHERE id=1');
$retour->execute();
while ($data = $retour->fetch())
     { 
   if($data["email"]==$email && $data["password"]== sha1($password)){ //Si l'e-mail et le mot de passe ( crypté en sha1 ) correspondent aux données de la BDD
       //L'administrateur est connecté
       $_SESSION['admin']=1; //Changement de la valeur admin = 1 = ADMINISTRATEUR
       header('Location:'.$_SESSION["link"]); //Redirection vers la page d'accuiel
       
   }
    else{//Si les informations sont mauvaises / L'administrateur n'est pas connecté
        $_SESSION['admin']=0;
        // + Messages d'erreurs
        echo('<div class="container" style="text-align:center;padding-top:100px;">');
        echo('<h1>Mauvais identifiants</h1>'); 
        echo('<a href="'.$_SESSION['link'].'connexion"><button class="btn btn-primary">Réessayer</button></a>');
        echo('<a href="'.$_SESSION['link'].'"><button class="btn btn-secondary">Retour</button></a>');
        echo('</div>');
    }
}
   }
}
?>