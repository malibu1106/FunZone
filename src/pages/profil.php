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
    <div class="profil_prez">
        
        <img class="avatar_image" src="storage/avatars/<?=$user['avatar_filename']?>">
        <h2><?=$user['pseudo']?></h2>
    </div>

</main>