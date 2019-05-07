<div class="container" style="padding-top:50px;">
    <h1 style="text-transform:uppercase;text-align:center;">Publier un article</h1>
    <form method="post" action="<?=$_SESSION["link"]?>send-article"style="padding:50px;;">
        <label>Titre de l'article</label>
        <input type="text" name="article-title" class="form-control input_user" value="" placeholder="Titre de l'article" style="margin-bottom:25px;">
        <label>Contenu de l'article</label>
        <textarea id="mytextarea" style="height:60vh;" name="article-content"></textarea>
        <button type="submit" style="margin-top:25px;" class="btn btn-primary btn-lg btn-block">Publier l'article</button>
    </form>
</div>