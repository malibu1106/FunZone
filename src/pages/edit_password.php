<?php
session_start();




if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['actualPassword']) && !empty($_POST['password']) && !empty($_POST['passwordRetyped']) &&!empty($_POST['id'])){
    $actualPassword = $_POST['actualPassword'];
    $newPassword = $_POST['password'];
    $newPasswordRetyped = $_POST['passwordRetyped'];
    $id = $_POST['id'];

    require_once("../elements/connexion_bdd.php");

    $sql = "SELECT password FROM users WHERE id = :id";

    // Préparation de la requête
    $query = $db->prepare($sql);    
    // Lier les valeurs
    $query->bindValue(':id', $id);
    
    // Exécution de la requête
    $query->execute();
    $password = $query->fetch(PDO::FETCH_ASSOC);

   
    $hashed_password = $password['password'];
     // Vérifier le mot de passe
     if (password_verify($actualPassword, $hashed_password)) {
      $newPasswordHashed = password_hash($newPassword, PASSWORD_DEFAULT);

      $sql = "UPDATE users SET password = :newPasswordHashed WHERE id=:id";

    // Préparation de la requête
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->bindValue(':newPasswordHashed', $newPasswordHashed);

    // Exécution de la requête
    $query->execute();
    require_once("../elements/close_bdd.php");




      $_SESSION["message"] = "<div id='message'>Mot de passe modifié !</div>";
      header('Location: ../index.php?page=profil');
     }
     else {
      require_once("../elements/close_bdd.php");
      $_SESSION["message"] = "<div id='message'>Mot de passe incorrect !</div>";
      header('Location: ../index.php?page=profil');
     }
    }