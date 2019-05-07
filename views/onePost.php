<?php

require_once('./models/postManager.php');
 class OneView extends Post
{
     function viewOne($retour){
         while ($data = $retour->fetch())
     { 
         ?>
<div class="jumbotroh">
    <br />
    <br />
    <div style="padding:10px; background-color:rgba(255, 255, 255, 0.67);">

        <br />
        <h1 class="display-4" style="text-align:center;">
            <?=  $data['title']; ?>
        </h1>
        <br />
    </div>
    <br />
</div>
<div class='container'>
    <?php
if($_SESSION["admin"]==1){
                              echo('<div class="btn-group" role="group" aria-label="Basic example">');  
                     echo('<a href="'.$_SESSION["link"].'modifier-'.$data['id'].'"><button type="button" class="btn btn-outline-danger">Modifier</button></a>'); 
                     echo('<button type="button" class="btn btn-outline-danger">Supprimer</button>');
                     echo('</div><hr>'); 
                 }
             ?>
    <p>
        <?= $data['content']; ?>
    </p>
    <button type="button" class="btn btn-secondary btn-block" style="margin:2.5px;font-size:12.5px;">Publié par
        <?= $data['author'] ?> le
        <?= $data['date'] ?></button>
</div>





<hr>
<?php
     }  
     }
 }
     
?>