<?php
class password extends dataBase
{
    public function emailVerification($email){ //Vérification de l'e-mail saisi pour la récupération du MDP
         $db=$this->connectTo(); //Connexion à la BDD
         $retour = $db->prepare('SELECT email FROM users WHERE id=1'); //Récupération de l'e-mail 
        $retour->execute();
         while ($data = $retour->fetch())
         { 
             if ($email==$data['email']){ //Si l'email saisi = l'e-mail admin
                 $send = new password;
                 $send->generatePassword($email); //Generation et envoi du nouveau mot de passe par e-mail
             }
             else{
                 echo('<h3>Mauvaise adresse e-mail</h3>'); //Message d'erreur
                 header('Location:'.$_SESSION["link"].'password-lost'); //Redirection vers la page de MDP oublié
             }
         }
     }
     public function generatePassword($recoveryemail){ //Generation et envoi du nouveau mot de passe par e-mail
         $db=$this->connectTo(); //Connexion à la BDD
         $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@_$'; //Liste des caractéres pouvant être dans les MDP
         $mot_de_passe = str_shuffle($char); //Melange de tout les caracteres
         $pass = substr($mot_de_passe,0,8); //Raccourci du MDP à 8 caracteres
         $cryptpass = sha1($pass); //Chiffrement du MDP (sha1)
         $req = $db->prepare('UPDATE users SET password = ? WHERE id= 1'); //Envoie du nouveau MDP sur la BDD
         $req->execute(array($cryptpass));
         //Envouie de l'email
         ini_set( 'display_errors', 1 );
         error_reporting( E_ALL );
         $from = "reinitialisation@maximemora.com"; //Expéditeur
         $to = $recoveryemail; //E-mail de l'administrateur - Recepteur
         $subject = "Votre nouveau mot de passe :"; //Objet de l'e-mail
         $message = "Voici votre nouveau mot de passe : ".$pass; //Corp de l'e-mail
         $headers = "From:" . $from;
         mail($to,$subject,$message, $headers);
         //Affichage du message de validation
         echo('<div style="padding:100px;>');
         echo ('<p style="color:black;">Votre nouveau mot de passe à été envoyé.</p>');
         echo('<br/><a href="'.$_SESSION["link"].'connexion"><button type="button" class="btn btn-primary">Connexion</button></a>');
         echo('</div>');
     }
    
    public function updatePassword($newpass){ //Mise à jour du MDP
        $db=$this->connectTo(); //Connexion à la BDD
        $cryptnewpass = sha1($newpass); //Chiffrement du MDP (sha1) saisi
        $req = $db->prepare('UPDATE users SET password = ? WHERE id = 1'); //Mise à jour sur la BDD
        $req->execute(array($cryptnewpass));
        header('Location:'.$_SESSION["link"].'mon-compte-3'); //Redirection
    }
    public function updateEmail($newmail){ //Mise à jour de l'e-mail
        $db=$this->connectTo(); //Connexion à la BDD
        $req = $db->prepare('UPDATE users SET email = ? WHERE id = 1'); //Mise à jour sur la BDD
        $req->execute(array($newmail));
        header('Location:'.$_SESSION["link"].'mon-compte-6'); //Redirection
    }
    
}

?>