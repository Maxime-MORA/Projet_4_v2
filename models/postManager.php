<?php

class Post extends dataBase
{
    public function getAll(){ //Recuperation de tout les articles
         $db=$this->connectTo(); //Connexion à la BDD
         echo ('<h1 style="text-align:center;margin-top:40px;margin-bottom:35px;text-transform:uppercase;font-size:25px;">Tout les articles</h1>');  
         $retour = $db->prepare('SELECT id, title, content, date, author FROM posts ORDER BY date DESC'); //Récupération de tout les articles sur la BDD
         $retour->execute();
         $view = new Allview;
         $view->viewAll($retour); //Création de la vue de tout les articles
    }
    public function getLast($numberArticle){ //Recuperation des derniers articles
         $db=$this->connectTo();//Connexion à la BDD
         echo ('<h1 style="text-align:center;margin-top:40px;margin-bottom:35px;text-transform:uppercase;font-size:25px;">Les 3 derniers articles</h1>');
         $retour = $db->prepare('SELECT id, title, content, date, author FROM posts ORDER BY date DESC LIMIT 0, '.$numberArticle.''); //Recuperation des derniers articles
         $retour->execute();
         $view = new Lastview;
         $view->viewLast($retour); //Création de la vue des derniers articles
    }
    public function getOne($idArticle){ //Recuperation d'un seul article
         $db=$this->connectTo();//Connexion à la BDD
         $retour = $db->prepare('SELECT id, title, content, date, author, visible FROM posts WHERE id='.$idArticle.''); //Récupération d'un seul article
         $retour->execute();
         $view = new OneView;
         $view->viewOne($retour); //Création de la vue d'un article seul
         return $idArticle;
    }
    public function updateOne($idArticle){ //Récupération de l'article a modifier
         $db=$this->connectTo();//Connexion à la BDD
         $retour = $db->prepare('SELECT id, title, content, date, author, visible FROM posts WHERE id='.$idArticle.''); //Recuperation d'un seul article
         $retour->execute();
         while ($data = $retour->fetch())
         { 
             $_POST['update-id'] = $data['id']; //Récupération de l'id
             $_POST['update-title'] = $data['title']; //Récupération du titre
             $_POST['update-content'] = $data['content']; //Récupération du contenu
         }
    }
    public function modifyArticle($title, $content, $id){ //Mise à jour de l'article sur la BDD
         $db=$this->connectTo(); //Connexion à la BDD           
         $req = $db->prepare('UPDATE posts SET title = ?,content=? WHERE id=' .$id); //Envoi des informations de l'article modifié sur la BDD
         $req->execute(array($title, $content));
         header('Location:'.$_SESSION["link"].'article-'.$id); //Redirection vers la page de l'article
    }
    public function publishArticle(){ //Publication d'un article
         $db=$this->connectTo();//Connexion à la BDD 
         $req = $db->prepare('INSERT INTO posts (title, content) VALUES(?, ?)'); //Envoie de l'article sur la BDD
         $req->execute(array($_POST['article-title'], $_POST['article-content']));
    }  
    public function deleteArticle($id){ //Suppression d'un article
         $db=$this->connectTo(); //Connexion à la BDD
         $db->exec('DELETE FROM posts WHERE id='.$id.''); //Suppression de l'article de la BDD
         $db->exec('DELETE FROM comments WHERE id_article='.$id.''); //Suppression des commentaires liés à l'article sur la BDD
    }  
}



?>