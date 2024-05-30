<?php
session_start();
if(!empty($_POST)
&& !empty($_POST['first_name']) && !empty($_POST['last_name'])
&& !empty($_POST['pseudo']) && !empty($_POST['email'])
&& !empty($_POST['password']) && !empty($_POST['date_of_birth'])
){

$first_name = strip_tags($_POST['first_name']);
$last_name = strip_tags($_POST['last_name']);
$pseudo = strip_tags($_POST['pseudo']);
$email = strip_tags($_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$date_of_birth = strip_tags($_POST['date_of_birth']);
$date_of_registration = date('Y-m-d');


    




    require_once ('../elements/connexion_bdd.php');


    /* VERIF QUE L'EMAIL N'EXISTE PAS */
    $sql = "SELECT email FROM users where email = :email";
    $query = $db->prepare($sql);
    $query->bindValue(':email', $email);
    $query->execute();
    $newEmail = $query->fetchAll(PDO::FETCH_ASSOC);

    // print_r($email);

    if(!empty($newEmail)){
        require_once("../elements/close_bdd.php");
        $_SESSION["message"] = "<div id='message'>Cette adresse email est déjà utilisée !</div>";
        header('Location: ../index.php?page=inscription');
    }
    else{
        /* INSCRIPTION DE L'UTILISATEUR SI L'EMAIL N'EST PAS UTILISÉ */
    $sql = "INSERT INTO users (first_name, last_name, pseudo, email, password, date_of_birth, date_of_registration)
    VALUES (:first_name, :last_name, :pseudo, :email, :password, :date_of_birth, :date_of_registration)";

    // Préparation de la requête
    $query = $db->prepare($sql);
    $query->bindValue(':first_name', $first_name);
    $query->bindValue(':last_name', $last_name);
    $query->bindValue(':pseudo', $pseudo);
    $query->bindValue(':email', $email);
    $query->bindValue(':password', $password);
    $query->bindValue(':date_of_birth', $date_of_birth);
    $query->bindValue(':date_of_registration', $date_of_registration);

    // Exécution de la requête
    $query->execute();
    
    $_SESSION["message"] = "<div id='message'>Inscription réussie !</div>";
    require_once("../elements/close_bdd.php");
    header('Location: ../index.php?page=login');
    }
    
}
?>