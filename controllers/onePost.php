<?php
$title = "Article - ".$idArticle." - Jean forteroche"; //Titre de la page
include_once('./templates/startRequire.php'); //Prerequis HTML
include_once('./templates/navBar.php'); //Menu horizontal
include_once('./models/databaseConnect.php'); //Connexion à la base de donnéees
$database = new dataBase;
$database->connectTo();
require_once('./views/onePost.php'); //Chargement de la vue d'un article seul
require_once('./models/postManager.php');
$post = new Post;
$post->getOne($idArticle); //Récupération de l'article dont l'id = $idArticle
require_once('./views/commentView.php');
require_once('./models/commentsManager.php');
$comment = new Comment;
$comment->getAllComment($idArticle); //Récuperation des commentaires liés à l'article (id_article = $idArticle)
require_once('./views/commentForm.php'); //Formulaire d'ajout de commentaire
include_once('./templates/footer.php'); //Intégration du footer
include_once('./templates/endRequire.php'); //Fermeture des balises HTML
