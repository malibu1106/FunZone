<form action="pages/edit_password.php" method="POST">
            <input type="password" name="actualPassword" id="actualPassword" placeholder="Ancien mot de passe">
            <input type="password" name="newPassword" id="newPassword" placeholder="Nouveau mot de passe">
            <input type="password" name="newPasswordRetyped" id="newPasswordRetyped" placeholder="Retaper le nouveau mot de passe">
            <input type="submit" value="Modifier mot de passe" style="color:green">
            <input type="hidden" id="id" name="id" value="<?=$user['id']?>">
            
</form>
<a href="index.php?page=profil"><button style="color:red">Annuler</button></a>