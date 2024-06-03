<form id="delete_form" action="pages/delete_account.php" method="POST">
            <input type="submit" value="Confirmer la suppression" style="color:green;">
            <input type="hidden" id="id" name="id" value="<?=$user['id']?>">
</form>
<form action="../index.php?page=profil" method="POST">
            <input type="submit" value="Annuler la suppression" style="color:red;">
</form>