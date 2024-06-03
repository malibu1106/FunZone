<?php
session_start();
$id = strip_tags($_POST['id']);


require_once ('../elements/connexion_bdd.php');

$sql = "UPDATE users SET avatar_filename=NULL WHERE id=:id";

    // Préparation de la requête
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);

    // Exécution de la requête
    $query->execute();
    
    
    require_once("../elements/close_bdd.php");
    $_SESSION["message"] = "<div id='message'>Votre avatar a été supprimé.</div>";
    header('Location: ../index.php?page=profil');


?>