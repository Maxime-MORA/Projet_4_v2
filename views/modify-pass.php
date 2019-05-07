<div class="container" style="padding-top:50px;">
    <h1 style="text-transform:uppercase;text-align:center;">Modifier votre mot de passe</h1>
    <form method="post" action="<?=$_SESSION["link"]?>mon-compte-2"style="padding:50px;">
        <label>Mot de passe</label>
         <input id ="password" type="password" name="modify-password" class="form-control input_user" value="" placeholder="Votre nouveau mot de passe" style="margin-bottom:25px;">
         <label>Confirmez votre mot de passe</label>
         <input id ="confirm_password" type="password" name="confirm-password" class="form-control input_user" value="" placeholder="Confirmer votre mot de passe" style="margin-bottom:25px;">
        <button type="submit" style="margin-top:25px;" class="btn btn-primary btn-lg btn-block">Valider la modification</button>
    </form>
</div>
<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Les 2 mots de passes ne sont pas les mêmes");
  } else {
    confirm_password.setCustomValidity('');
  }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>