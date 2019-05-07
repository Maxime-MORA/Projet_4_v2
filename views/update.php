<div class="container" style="padding-top:50px;">
    <h1 style="text-transform:uppercase;text-align:center;">Modifier l'article
        <?= $idArticle ?>
    </h1>
    <form method="post" action="<?=$_SESSION["link"]?>modifyarticl-<?= $idArticle ?>"style="padding:50px;">
        <label>Titre de l'article</label>
        <input type="text" name="modify-title" class="form-control input_user" value="<?= $_POST['update-title']?>" placeholder="Titre de l'article" style="margin-bottom:25px;">
        <label>Contenu de l'article</label>
        <textarea id="mytextarea" style="height:60vh;" name="modify-content"><?= $_POST['update-content']?></textarea>
        <button type="submit" style="margin-top:25px;" class="btn btn-primary btn-lg btn-block">Valider la modification</button>
    </form>
</div>