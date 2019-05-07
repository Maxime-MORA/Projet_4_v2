<?php

class Comment extends dataBase
{
    public function send($idArticle){
         //Envoie des commentaires
         $db=$this->connectTo(); 
         $req = $db->prepare('INSERT INTO comments (id_article, content, author) VALUES(?, ?, ?)');
         $req->execute(array($idArticle, $_POST['commentcontent'], $_POST['pseudo']));
    } 
    public function getAllComment($idArticle){
         //Récupération des commentaires
         $db=$this->connectTo(); 
         $retour = $db->prepare('SELECT content, date, author, id, visible, signals FROM comments WHERE id_article='.$idArticle.' ORDER BY date DESC');
         $retour->execute();
         $view = new CommentView;
         $view->viewAllComments($retour);
    }
    public function signalComment($commentid){
         //Signalement de commentaires
         $db=$this->connectTo(); 
         $req = $db->prepare('UPDATE comments SET signals = ? WHERE id = ?');
         $req->execute(array(1, $commentid));
    } 
    public function signalDelete($commentid){
         //Suppréssion du signalement
         $db=$this->connectTo(); 
         $req = $db->prepare('UPDATE comments SET signals = ? WHERE id = ?');
         $req->execute(array(0, $commentid));
    } 
    public function visibleComment($commentid){
         //Rendre visible un commentaire
         $db=$this->connectTo(); 
         $req = $db->prepare('UPDATE comments SET visible = "1" WHERE id = ?');
         $req->execute(array($commentid));
    } 
    public function invisibleComment($commentid){
         //Masquer un commentaire
         $db=$this->connectTo(); 
         $req = $db->prepare('UPDATE comments SET visible = "0" WHERE id = ?');
         $req->execute(array($commentid));
    } 
    public function deleteComment($commentid){
         //supprimer un commentaire
         $db=$this->connectTo(); 
         $req = $db->prepare('DELETE FROM comments WHERE id = ?');
         $req->execute(array($commentid));
    }
}