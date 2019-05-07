<?php
require_once('./models/commentsManager.php');
class CommentView extends Comment
{
    function viewAllComments($retour){
        echo '<div id="comments" style="margin-top:-80px;">';
        echo '<h3 style="padding-top:90px;padding-bottom:15px;text-transform:uppercase; text-align:center;">Tous les commentaires</h3>';
        while ($data = $retour->fetch())
        { 
            $commentid = $data['id'];
?>
<div class="container" style="background-color:#e8e8e8; padding:20px;">
    <h4> Publié par :
        <?=  $data['author']; ?>
    </h4>
    <p style="font-size:13px;"> Le
        <?= $data['date']; ?>
    </p>
    <p>
        <?php if($data['visible']==1) {echo($data['content']);} if($data['visible']==0) {echo('** Commentaire masqué **');}?>
    </p>
    <div class="justify-content-between">
        <?php
                if($_SESSION['admin']==0){
                    if($data['signals']==0){
                    echo('<a href="'.$_SESSION["link"].'signalComment-'.$commentid.'"><button type="button" class="btn btn-outline-danger">Signaler</button></a>'); }
                    if($data['signals']==1){
                    echo('<a href="#"><button type="button" class="btn btn-danger" disabled>Signalé</button></a>'); }
                }
                 
                elseif($_SESSION['admin']==1){
                     if ($data['signals']==1){
                        echo('<a href="#"><button type="button" class="btn btn-danger">Signalé</button></a>');
                        echo('<a href="'.$_SESSION["link"].'signDel-'.$commentid.'"><button type="button" class="btn btn-outline-danger">Supprimer le signalement</button></a>');   
                    }
                    if ($data['visible']==1){
                        echo('<a href="'.$_SESSION["link"].'maskComment-'.$commentid.'"><button type="button" class="btn btn-outline-danger">Masquer</button></a>');   
                    }
                    if ($data['visible']==0){
                        echo('<a href="'.$_SESSION["link"].'visibleComment-'.$commentid.'"><button type="button" class="btn btn-outline-danger">Rendre visible</button></a>');   
                    }
                   
                    echo('<a href="'.$_SESSION["link"].'deleteComment-'.$commentid.'"><button type="button" class="btn btn-outline-danger">Supprimer</button></a>');
                }
 
?>
    </div>
</div>
<br />
<?php
         echo '</div>';
 }
    }
}
     
?>