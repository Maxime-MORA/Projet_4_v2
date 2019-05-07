<?php

require_once('./models/postManager.php');
require_once('./models/troncatureTexte.php');
 class LastView extends Post
{
     function viewLast($retour){
         while ($data = $retour->fetch())
         { //Pour chaques articles :
             $db=$this->connectTo();
             //Compter les commentaires
             $res = $db->query('select count(*) as nb FROM comments WHERE id_article='.$data['id']);
             $resu = $res->fetch();
             //Nombre de commentaires
             $nb = $resu['nb'];
             //Compter les commentaires signalés
            $sql = $db->query("SELECT COUNT(*) as signals FROM comments WHERE signals = 1 AND id_article=".$data['id']);
            $sig = $sql->fetch();
             //Nombre de commentaires signalés
            $signalsnb = $sig['signals'];
?>
<div class="container" style="background-color:#e8e8e8; padding:20px;">
    <h1>
        <?=  $data['title']; ?>
    </h1>
    <p>
        <?php
            $id = $data['id'];
            if(strlen($data['content']) >250){
             $troncature = new Troncature;
             $troncature->truncateHtml($id, $data['content'], 250);   
            }
            else{
                echo ('<p>'.$data['content'].'</p>');
            }
             if($_SESSION["admin"]==1){
                 echo('<div class="btn-group" role="group" aria-label="Basic example">');  
                 echo('<a href="'.$_SESSION["link"].'modifier-'.$data['id'].'"><button type="button" class="btn btn-outline-danger">Modifier</button></a>'); 
                 echo('<a href="'.$_SESSION["link"].'deleteart-'.$data['id'].'"><button type="button" class="btn btn-outline-danger">Supprimer</button></a>');
                 echo('</div>'); 
             }
        ?>
    </p>
    <div>

    </div>
    <p style="font-size:12.5px;">Publié par
        <?= $data['author'] ?> le
        <?= $data['date'] ?>
    </p>
    <a class="btn btn-primary  btn-block" style="margin:2.5px;" href="<?= $_SESSION["link"] ?>article-
        <?=$data['id']?>">Lire en entier</a>
    <?php
    if ($nb==0){
        echo ('<a class="btn btn-dark btn-block" style="margin:2.5px;" href="'.$_SESSION["link"].'article-'.$data['id'].'#comments">Publier le premier commentaire</a>');
    }
         elseif($nb>=1){
        echo ('<a class="btn btn-dark btn-block" style="margin:2.5px;" href="'.$_SESSION["link"].'article-'.$data['id'].'#comments">Voir les commentaires ( '.$nb.' ) dont ( '.$signalsnb.' ) signalé(s)</a>');
    }
    ?>

</div>
<br>
<?php
         }
      
     }
 }

     
?>