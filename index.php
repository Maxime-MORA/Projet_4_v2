<?php
$url = '';
if(isset($_GET['url'])) {
    $url = $_GET['url'];
}
//Page d'accueil
if($url == '') {
    require 'controllers/homePage.php';
}
//Page 'Tous les articles'
elseif($url == 'article') {
    require 'controllers/allPost.php';
}
//Page d'article unique
elseif(preg_match('#article-([0-9]+)#', $url, $params)) {
    $idArticle = $params[1];
    require 'controllers/onePost.php';
}
//Suppression d'article
elseif(preg_match('#deleteart-([0-9]+)#', $url, $params)) {
    $id = $params[1];
    require 'controllers/deleteArticle.php';
}
//Page 'bibliographie'
elseif($url == 'bibliographie') {
    require 'controllers/bibliographiePage.php';
}
//Page de connexion
elseif($url == 'connexion') {
    require 'controllers/loginPage.php';
}
//Page de déconnexion
elseif($url == 'deconnexion') {
    require 'controllers/adminDisconnect.php';
}
//Page de vérification - Administrateur
elseif($url == 'verification-administrateur') {
    require 'controllers/adminVerify.php';  
}
//Page 'Mon compte' - Administrateur
elseif(preg_match('#mon-compte-([0-9]+)#', $url, $params)) {
    $action = $params[1];
    require 'controllers/account.php';
} 
//Page de publication d'article
elseif($url == 'publier') {
            require 'controllers/publishArticle.php';
}
//Envoi de la'rticle sur la BDD
elseif($url == 'send-article') {
            require 'controllers/publishArticleSend.php';
}
//Page - Mot de passe oublié
elseif($url == 'password-lost') {
            require 'controllers/passwordLost.php';
} 
//Vérification de l'email + envoie du nouveau MDP
elseif($url == 'password-lost-verification') {
            require 'controllers/passwordLostVerification.php';
} 
//Envoie de commentaire
elseif(preg_match('#sendComment-([0-9]+)#', $url, $params)) {
    $idArticle = $params[1];
    require 'controllers/sendComment.php';
} 
//Signalement d'un commentaire
elseif(preg_match('#signalComment-([0-9]+)#', $url, $params)) {
    $commentid = $params[1];
    require 'controllers/signalComment.php';
} 
//Suppréssion du signalement par l'administrateur
elseif(preg_match('#signDel-([0-9]+)#', $url, $params)) {
    $commentid = $params[1];
    require 'controllers/deleteSignal.php';
} 
//Rendre visible un commentaire
elseif(preg_match('#visibleComment-([0-9]+)#', $url, $params)) {
    $commentid = $params[1];
   require 'controllers/visibleComment.php';
} 
//Masquer un commentaire
elseif(preg_match('#maskComment-([0-9]+)#', $url, $params)) {
    $commentid = $params[1];
    var_dump($url);
    require 'controllers/invisibleComment.php';
} 
//Supprimer un commentaire
elseif(preg_match('#deleteComment-([0-9]+)#', $url, $params)) {
    $commentid = $params[1];
    require 'controllers/deleteComment.php';
} 
//Page - Modifier un article
elseif(preg_match('#modifier-([0-9]+)#', $url, $params)) {
    $idArticle = $params[1];
    require 'controllers/updateArticle.php';
} 
//Envoi de l'article modifié sur la BDD
elseif(preg_match('#modifyarticl-([0-9]+)#', $url, $params)) {
    $idArticle = $params[1];
    require 'controllers/modifyArticleSend.php';
}
//Page d'erreur 404
else {
    require 'controllers/error404.php';
}