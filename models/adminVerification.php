<?php
class Admin extends dataBase
{
public function verif($email, $password){
$db=$this->connectTo(); 
//Récupération des informations utilisateurs
$retour = $db->prepare('SELECT email, password FROM users WHERE id=1');
$retour->execute();
while ($data = $retour->fetch())
     { 
     //Comparaison des informations utilisateurs
   if($data["email"]==$email && $data["password"]== sha1($password)){
       //Si les informations sont bonnes / L'administrateur est connecté
       $_SESSION['admin']=1;
       header('Location:'.$_SESSION["link"]);
       
   }
    else{
        //Si les informations sont mauvaises / L'administrateur n'est pas connecté
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