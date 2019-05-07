<div class="container">
    <form action="<?=$_SESSION["link"]?>sendComment-<?= $idArticle ?>" method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Votre pseudo" name="pseudo" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Votre commentaire" name="commentcontent" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Publier le commentaire</button>
    </form>

</div>