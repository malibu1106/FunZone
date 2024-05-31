<?php
session_start();
$id = strip_tags($_POST['id']);
$first_name = strip_tags($_POST['first_name']);
$last_name = strip_tags($_POST['last_name']);
$pseudo = strip_tags($_POST['pseudo']);
$email = strip_tags($_POST['email']);
$date_of_birth = strip_tags($_POST['date_of_birth']);

require_once ('../elements/connexion_bdd.php');

$sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, pseudo = :pseudo, email = :email, date_of_birth = :date_of_birth WHERE id=:id";

    // Préparation de la requête
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->bindValue(':first_name', $first_name);
    $query->bindValue(':last_name', $last_name);
    $query->bindValue(':pseudo', $pseudo);
    $query->bindValue(':email', $email);
    $query->bindValue(':date_of_birth', $date_of_birth);


    // Exécution de la requête
    $query->execute();
    
    $_SESSION["message"] = "<div id='message'>Profil mis à jour !</div>";
    require_once("../elements/close_bdd.php");
    header('Location: ../index.php?page=profil');


?>