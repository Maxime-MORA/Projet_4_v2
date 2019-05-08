<?php
class dataBase
{ //Connexion à la base de donnée
    public function connectTo(){
         //Informations de la BDD
         $servername='db341894-projet4.sql-pro.online.net';
         $username ='db109576';
         $password = 'Alexy1Maxime2';

        try {
             // Connexion à la base de donnée
             $db = new PDO('mysql:host='.$servername.'; dbname=db341894_projet4', $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
             $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch (Exception $e) {
             echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
        return $db;

    }
}