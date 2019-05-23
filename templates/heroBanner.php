<div class="jumbotroh">
    <br />
    <br />
    <div style="padding:10px; background-color:rgba(255, 255, 255, 0.67);text-align:center;">
        <br />
        <h1 class="display-4">Billet simple pour l'alaska !</h1>
        <br />
        <p class="lead">LE NOUVEAU ROMAN DE JEAN FORTEROCHE<br />
            QUE SERIEZ-VOUS PRÊTS À FAIRE POUR SURVIVRE ?</p>

    </div>
    <br />
    <?php
      if($_SESSION["admin"]==0){
         echo('<p class="lead" style="width:60%; margin-left:20%; margin-right:20%;">
    <a class="btn btn-primary btn-lg btn-block"href="'.$_SESSION["link"].'article" role="button">Voir tous les articles</a></p>');
     }
     if($_SESSION["admin"]==1){
         echo('<p class="lead" style="width:60%; margin-left:20%; margin-right:20%;">
    <a class="btn btn-primary btn-lg btn-block"href="'.$_SESSION["link"].'publier" role="button">Publier un article</a>
</p>');
     }
     ?>



</div>