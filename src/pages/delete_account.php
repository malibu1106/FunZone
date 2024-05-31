<?php
session_start();
$id = strip_tags($_POST['id']);


require_once ('../elements/connexion_bdd.php');

$sql = "DELETE FROM users WHERE id=:id";

    // Préparation de la requête
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);

    // Exécution de la requête
    $query->execute();
    
    
    require_once("../elements/close_bdd.php");
    session_destroy();
    session_start();
    $_SESSION["message"] = "<div id='message'>Votre compte a été supprimé.</div>";
    header('Location: ../index.php');


?>