<?php
require_once("elements/connexion_bdd.php");

$sql = "SELECT * FROM users WHERE id = :id";
$id = $_SESSION['userid'];

// Préparation de la requête
$query = $db->prepare($sql);    
// Lier les valeurs
$query->bindValue(':id', $id);


// Exécution de la requête
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);

require_once("elements/close_bdd.php");
?>
<main>
    <h1>Mon profil</h1>

        
        <img class="avatar_image" src="storage/avatars/<?=$user['avatar_filename']?>">
        <form action="pages/edit_profile.php" method="POST">
            <input type="hidden" name="id" id="id" value="<?=$user['id']?>">
            <input type="text" required name="first_name" id="first_name" placeholder="Prénom" value="<?=$user['first_name']?>">
            <input type="text" required name="last_name" id="last_name" placeholder="Nom" value="<?=$user['last_name']?>">
            <input type="text" required name="pseudo" id="pseudo" placeholder="Pseudo" value="<?=$user['pseudo']?>">
            <input type="email" required name="email" id="email" placeholder="Votre adresse email" value="<?=$user['email']?>">
            <input type="date" required name="date_of_birth" id="date_of_birth" min="1900-01-01" max="2035-01-01" value="<?=$user['date_of_birth']?>">
            <input type="submit" value="Éditer mes informations">
        </form>

        <form action="pages/edit_password.php" method="POST">
            <input type="submit" value="Changer mot de passe">
            <input type="hidden" id="id" name="id" value="<?=$user['id']?>">
        </form>
        
        <?php
        if (isset($_POST['delete'])){
            include 'delete_account_confirmation.php';
        }
        else{
            echo '<form action="index.php?page=profil" method="POST">
            <input type="submit" value="Supprimer mon compte">
            <input type="hidden" id="delete" name="delete" value="delete">
        </form>';
        }
?>



</main>
<script src="../JS/edit_form.js" defer></script>