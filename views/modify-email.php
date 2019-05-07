<div class="container" style="padding-top:50px;">
    <h1 style="text-transform:uppercase;text-align:center;">Modifier votre adresse e-mail</h1>
    <form method="post" action="<?=$_SESSION["link"]?>mon-compte-5"style="padding:50px;">
        <label>Votre nouvelle adresse e-mail</label>
         <input id ="modify-email" type="email" name="modify-email" class="form-control input_user" value="" placeholder="Votre nouvelle adresse e-mail" style="margin-bottom:25px;">
        <button type="submit" style="margin-top:25px;" class="btn btn-primary btn-lg btn-block">Valider la modification</button>
    </form>
</div>
