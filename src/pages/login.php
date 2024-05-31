<?php
session_start();


if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email']) && !empty($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once("../elements/connexion_bdd.php");

    $sql = "SELECT * FROM users WHERE email = :email";

    // Préparation de la requête
    $query = $db->prepare($sql);    
    // Lier les valeurs
    $query->bindValue(':email', $email);
    
    // Exécution de la requête
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    require_once("../elements/close_bdd.php");
    if($user){

    $hashed_password = $user['password'];

     // Vérifier le mot de passe
     if (password_verify($password, $hashed_password)) {
        $_SESSION["message"] = "<div id='message' class='green'>Connexion réussie !</div>";
        $_SESSION["user"] = $user['first_name'];
        $_SESSION["pseudo"] = $user['pseudo'];
        $_SESSION["userid"] = $user['id'];
        header('Location: ../index.php');}
        else {
            $_SESSION["message"] = "<div id='message' class='red'>Adresse email ou mot de passe incorrect !</div>";
            header('Location: ../index.php?page=login');}
    } else {
        $_SESSION["message"] = "<div id='message' class='red'>Adresse email ou mot de passe incorrect !</div>";
        header('Location: ../index.php?page=login');}

}
?>