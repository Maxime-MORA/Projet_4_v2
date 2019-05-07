<!-- Navigation -->
<nav class="navbar navbar-expand-lg sticky-top navbar-dark navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="<?=$_SESSION["link"]?>">Jean FORTEROCHE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?=$_SESSION["link"]?>">Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$_SESSION["link"]?>article">Tous les articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$_SESSION["link"]?>bibliographie">Bibliographie</a>
                </li>
                <?php
      if($_SESSION["admin"]==1){echo('<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          administrateur
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align:center;">
          <a class="dropdown-item" href="'.$_SESSION["link"].'publier">publier un article</a>
          <a class="dropdown-item" href="'.$_SESSION["link"].'mon-compte-4">Modifier mon e-mail</a>
          <a class="dropdown-item" href="'.$_SESSION["link"].'mon-compte-1">Modifier mon mot de passe</a>
          <a class="dropdown-item" href="'.$_SESSION["link"].'deconnexion" style="color:red;">déconnexion</a>
        </div>
      </li>');} 
    ?>
                <li class="nav-item">
                    <a class="nav-link" href="
                        <?php if($_SESSION["admin"]==0){echo($_SESSION["link"].'connexion');}?>">
                           <span class="<?php if($_SESSION["admin"]==1){echo('admin');}?>">
                            <?php
          if($_SESSION["admin"]==1){echo('Connecté');}
          if($_SESSION["admin"]==0){echo('Connexion');}
          ?>
                        </span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>