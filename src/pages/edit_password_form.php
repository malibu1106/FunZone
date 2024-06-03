<form action="pages/edit_password.php" method="POST">
<div class="password_input_containeur_edit"><input type="password" required name="actualPassword" id="actualPassword" class="passwordInputSignupEdit" placeholder="Ancien mot de passe"><img id="showPasswordImageActual" src="../images/showPassword.png"></div>
            <div class="password_input_containeur"><input type="password" required name="password" id="password" class="passwordInputSignup" placeholder="Nouveau mot de passe"><img id="showPasswordImage" src="../images/showPassword.png"></div>
            <div class="password_input_containeur"><input type="password" required name="passwordRetyped" id="passwordRetyped" class="passwordInputSignup" placeholder="Retaper mot de passe"><img id="showPasswordImageRetyped" src="../images/showPassword.png"></div>
            <input id="edit_password_submit"type="submit" value="Modifier mot de passe" style="color:green">
            <input type="hidden" id="id" name="id" value="<?=$user['id']?>">
            
</form>
<a href="index.php?page=profil"><button style="color:red">Annuler</button></a>