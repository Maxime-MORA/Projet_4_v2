<div class="container" style="padding-top:50px;">
    <h1 style="text-transform:uppercase;text-align:center;">Mot de passe oublié</h1>
    <form method="post" action="<?=$_SESSION["link"]?>password-lost-verification"style="padding:50px;;">
        <label>Entrez votre adresse e-mail</label>
        <input type="email" name="recovery-email" class="form-control input_user" value="" placeholder="exemple@email.com" style="margin-bottom:25px;">
        <button type="submit" style="margin-top:25px;" class="btn btn-primary btn-lg btn-block">Recevoir un nouveau mot de passe</button>
        <br />
        <p style="text-align:center">Un nouveau mot de passe vous sera envoyé sur votre adresse e-mail.<br /><strong>Attention !</strong> Votre adresse e-mail doit-être celle avec laquelle vous vous êtes inscrit</p>
    </form>
</div>