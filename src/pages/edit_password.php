<?php
session_start();
echo '<pre>';
print_r($_POST);
echo '</pre>';


?>

<?php



if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['actualPassword']) && !empty($_POST['newPassword']) && !empty($_POST['newPasswordRetyped']) &&!empty($_POST['id'])){
    $actualPassword = $_POST['actualPassword'];
    $newPassword = $_POST['newPassword'];
    $newPasswordRetyped = $_POST['newPasswordRetyped'];
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

    require_once("../elements/close_bdd.php");
    $hashed_password = $password['password'];
     // Vérifier le mot de passe
     if (password_verify($actualPassword, $hashed_password)) {
        echo 'password ok';
     }
     else {
        echo 'mot de passe incorrect';
     }
    }