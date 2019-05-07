<?php
class password extends dataBase
{
    public function emailVerification($email){
         $db=$this->connectTo(); 
         $retour = $db->prepare('SELECT email FROM users WHERE id=1');
        $retour->execute();
         while ($data = $retour->fetch())
         { 
             if ($email==$data['email']){
                 $send = new password;
                 $send->generatePassword($email);
             }
             else{
                 echo('<h3>Mauvaise adresse e-mail</h3>'); 
                header('Location:'.$_SESSION["link"].'password-lost'); 
             }
         }
     }
     public function generatePassword($recoveryemail){
         $db=$this->connectTo(); 
         $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@_$';
         $mot_de_passe = str_shuffle($char);
         $pass = substr($mot_de_passe,0,8);
         $cryptpass = sha1($pass);
         $req = $db->prepare('UPDATE users SET password = ? WHERE id= 1');
         $req->execute(array($cryptpass));
         ini_set( 'display_errors', 1 );
         error_reporting( E_ALL );
         $from = "reinitialisation@maximemora.com";
         $to = $recoveryemail;
         $subject = "Votre nouveau mot de passe :";
         $message = "Voici votre nouveau mot de passe : ".$pass;
         $headers = "From:" . $from;
         mail($to,$subject,$message, $headers);
         echo('<div style="padding:100px;>');
         echo ('<p style="color:black;">Votre nouveau mot de passe à été envoyé.</p>');
         echo('<br/><a href="'.$_SESSION["link"].'connexion"><button type="button" class="btn btn-primary">Connexion</button></a>');
         echo('</div>');
     }
    
    public function updatePassword($newpass){
        $db=$this->connectTo(); 
        $cryptnewpass = sha1($newpass);
        $req = $db->prepare('UPDATE users SET password = ? WHERE id = 1');
        $req->execute(array($cryptnewpass));
        header('Location:'.$_SESSION["link"].'mon-compte-3');
    }
    public function updateEmail($newmail){
        $db=$this->connectTo(); 
        $req = $db->prepare('UPDATE users SET email = ? WHERE id = 1');
        $req->execute(array($newmail));
        header('Location:'.$_SESSION["link"].'mon-compte-6');
    }
    
}

?>