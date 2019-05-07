<?php

class Post extends dataBase
{
    public function getAll(){
         $db=$this->connectTo();
         echo ('<h1 style="text-align:center;margin-top:40px;margin-bottom:35px;text-transform:uppercase;font-size:25px;">Tout les articles</h1>');  
         $retour = $db->prepare('SELECT id, title, content, date, author FROM posts ORDER BY date DESC');
         $retour->execute();
         $view = new Allview;
         $view->viewAll($retour);
    }
    public function getLast($numberArticle){
         $db=$this->connectTo();
         echo ('<h1 style="text-align:center;margin-top:40px;margin-bottom:35px;text-transform:uppercase;font-size:25px;">Les 3 derniers articles</h1>');   
         $retour = $db->prepare('SELECT id, title, content, date, author FROM posts ORDER BY date DESC LIMIT 0, '.$numberArticle.'');
         $retour->execute();
         $view = new Lastview;
         $view->viewLast($retour);
    }
    public function getOne($idArticle){ 
         $db=$this->connectTo();
         $retour = $db->prepare('SELECT id, title, content, date, author, visible FROM posts WHERE id='.$idArticle.'');
         $retour->execute();
         $view = new OneView;
         $view->viewOne($retour);
         return $idArticle;
    }
    public function updateOne($idArticle){ 
         $db=$this->connectTo();
         $retour = $db->prepare('SELECT id, title, content, date, author, visible FROM posts WHERE id='.$idArticle.'');
         $retour->execute();
         while ($data = $retour->fetch())
         { 
             $_POST['update-id'] = $data['id'];
             $_POST['update-title'] = $data['title'];
             $_POST['update-content'] = $data['content'];
         }
    }
    public function modifyArticle($title, $content, $id){
         $db=$this->connectTo();            
         $req = $db->prepare('UPDATE posts SET title = ?,content=? WHERE id=' .$id);
         $req->execute(array($title, $content));
         header('Location:'.$_SESSION["link"].'article-'.$id);
    }
    public function publishArticle(){
         $db=$this->connectTo(); 
         $req = $db->prepare('INSERT INTO posts (title, content) VALUES(?, ?)');
         $req->execute(array($_POST['article-title'], $_POST['article-content']));
    }  
    public function deleteArticle($id){
         $db=$this->connectTo(); 
         $db->exec('DELETE FROM posts WHERE id='.$id.'');
         $db->exec('DELETE FROM comments WHERE id_article='.$id.'');
    }  
}



?>