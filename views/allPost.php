<?php
require_once('./models/postManager.php');
require_once('./models/troncatureTexte.php');
 class AllView extends Post
{

     function viewAll($retour){
        while ($data = $retour->fetch())//Pour chaques articles :
        { 
             $db=$this->connectTo();
             //Compter les commentaires
             $res = $db->query('SELECT COUNT(*) as nb FROM comments WHERE id_article='.$data['id']);
             $resu = $res->fetch();
             //Nombre de commentaires
             $nb = $resu['nb'];
             $sql = $db->query("SELECT * FROM comments WHERE signals='1' AND id_article=".$data['id']);
             $signalsnb = 0;
             while ($comments = $sql->fetch())
             {
                 ++$signalsnb;
             }
         ?>
<div class="container" style="background-color:#e8e8e8; padding:20px;">
    <h1>
         <?= $data['title']; ?>
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
             //Création du résumé de l'article
             if($_SESSION["admin"]==1){
                echo('<div class="btn-group" role="group" aria-label="Basic example">');  
                echo('<a href="'.$_SESSION["link"].'modifier-'.$data['id'].'"><button type="button" class="btn btn-outline-danger">Modifier</button></a>'); 
                echo('<a href="'.$_SESSION["link"].'deleteart-'.$id.'"><button type="button" class="btn btn-outline-danger">Supprimer</button></a>');
                echo('</div>'); 
             }
        ?>
    </p>
    <p style="font-size:12.5px;">Publié par
        <?= $data['author'] ?> le
        <?= $data['date'] ?>
    </p>
    <a class="btn btn-primary  btn-block" style="margin:2.5px;" href="<?= $_SESSION["link"]."article-".$data['id'] ?>">Lire en entier</a>
    <?php
    if ($nb==0){
        echo ('<a class="btn btn-dark btn-block" style="margin:2.5px;" href="'.$_SESSION["link"].'article-'.$data['id'].'#comments">Publier le premier commentaire</a>');
    }
     elseif($nb>=1){
         echo ('<a class="btn btn-dark btn-block" style="margin:2.5px;" href="'.$_SESSION["link"].'article-'.$data['id'].'#comments">Voir les commenta ( '.$nb.' ) ');
         if ($signalsnb==0)
         {
             echo ('</a>');
         }
         elseif ($signalsnb==1)
         {
             echo ('dont ( '.$signalsnb.' ) signalé</a>');
         }
         elseif ($signalsnb>=2)
         {
             echo ('dont ( '.$signalsnb.' ) signalés</a>');
         }
         else
         {
             echo ('</a>');
        }
     }
    ?>

</div>
<br>
<?php
     }
?>
<button onclick="topFunction()" id="toTop" title="Go to top">Retour en haut</button>
<script type="text/javascript">
    function scrollFunction() {
        if (document.body.scrollTop > 25 || document.documentElement.scrollTop > 25) {
            document.getElementById("toTop").style.display = "flex";
        } else {
            document.getElementById("toTop").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };
</script>
<?php
     }
 }
     
?>