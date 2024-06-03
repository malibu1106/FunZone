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
<main class="profile">
    <a href="../index.php?page=profil"><h1>Mon profil</h1></a>
        <div class="profile_avatar">

    <?php 
if (!empty($user['avatar_filename'])) {
    echo '<img class="avatar_image" src="storage/avatars/' . $user['avatar_filename'] . '">';
} else {
    echo '<img class="avatar_image" src="storage/avatars/default.png">';
}
?>
            <div class="avatar_buttons_container">


            <?php
            if(isset($_POST['edit_avatar'])){
                echo '<form method="POST" action="pages/edit_avatar.php" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                <input type="file" id="newAvatar" name="newAvatar">
                <input id="confirm_avatar_edit" type="submit" value="Changer l\'avatar" style="color:green">
            </form>';
            echo '<form action="../index.php?page=profil" method="POST">
                    <input type="submit" value="Annuler" style="color:red;">
                    
                    </form>';
            
            }
            else{
                echo '<form method="POST" action="../index.php?page=profil">
                    <input type="hidden" id="edit_avatar" name="edit_avatar" value="edit_avatar">
                    <input type="submit" value="Changer l\'avatar">
                    </form>';
                }
            ?>
                
                



                <?php
        if (isset($_POST['delete_avatar'])){
            include 'delete_avatar_confirmation.php';
        }
        elseif (!isset($_POST['delete_avatar']) && !isset($_POST['edit_avatar'])){
            echo '<form action="index.php?page=profil" method="POST">
            <input type="submit" value="Supprimer l\'avatar">
            <input type="hidden" id="delete_avatar" name="delete_avatar" value="delete_avatar">
        </form>';
        }
?>
            </div>
        </div>  

        <form action="pages/edit_profile.php" method="POST">
            <input type="hidden" name="id" id="id" value="<?=$user['id']?>">
            <input type="text" required name="first_name" id="first_name" placeholder="Prénom" value="<?=$user['first_name']?>">
            <input type="text" required name="last_name" id="last_name" placeholder="Nom" value="<?=$user['last_name']?>">
            <input type="text" required name="pseudo" id="pseudo" placeholder="Pseudo" value="<?=$user['pseudo']?>">
            <input type="email" required name="email" id="email" placeholder="Votre adresse email" value="<?=$user['email']?>">
            <input type="date" required name="date_of_birth" id="date_of_birth" min="1900-01-01" max="2035-01-01" value="<?=$user['date_of_birth']?>">
            <input type="submit" value="Éditer mes informations">
        </form>





        <?php
        if (isset($_POST['password'])){
            include 'pages/edit_password_form.php';
        }
        else{
            echo '<form action="index.php?page=profil#actualPassword" method="POST">
            <input type="submit" value="Changer mot de passe">
            <input type="hidden" id="password" name="password" value="password">
            </form>';
        }
?>







        
        <?php
        if (isset($_POST['delete'])){
            include 'delete_account_confirmation.php';
        }
        else{
            echo '<form action="index.php?page=profil#delete_form" method="POST">
            <input type="submit" value="Supprimer mon compte">
            <input type="hidden" id="delete" name="delete" value="delete">
        </form>';
        }
?>



</main>
<script src="../JS/edit_form.js" defer></script>