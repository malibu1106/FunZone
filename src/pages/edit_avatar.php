<?php
session_start();
$id = $_SESSION['userid'];

function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if(isset($_FILES['newAvatar']) && isset($_SESSION['pseudo'])){
    $uploadDir = '../storage/avatars/';
    $imageFileType = strtolower(pathinfo($_FILES['newAvatar']['name'], PATHINFO_EXTENSION));
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');

    // Check if the file is an allowed image type
    if(in_array($imageFileType, $allowedTypes)){
        // Create a new filename with the random string and the original file extension
        $newFileName = generateRandomString(20) . '.' . $imageFileType;
        $uploadFile = $uploadDir . $newFileName;
        require_once("../elements/connexion_bdd.php");

        $sql = "SELECT avatar_filename FROM users WHERE id=:id";

    // Préparation de la requête
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);


    // Exécution de la requête
    $query->execute();
    $oldFileName = $query->fetch(PDO::FETCH_ASSOC);



        // Move the uploaded file to the target directory
        if(move_uploaded_file($_FILES['newAvatar']['tmp_name'], $uploadFile)){

            require_once("../elements/connexion_bdd.php");
            $sql = "UPDATE users SET avatar_filename = :avatar_filename WHERE id=:id";

    // Préparation de la requête
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->bindValue(':avatar_filename', $newFileName);

    // Exécution de la requête
    $query->execute();
    require_once("../elements/close_bdd.php");


            $_SESSION["message"] = "<div id='message'>Avatar mis à jour !</div>";
            unlink("../storage/avatars/" . $oldFileName['avatar_filename']);
            header('Location: ../index.php?page=profil');
        } else {
            $_SESSION["message"] = "<div id='message'>Erreur lors du téléchargement de l'image.</div>";
            header('Location: ../index.php?page=profil');
        }
    } else {
        $_SESSION["message"] = "<div id='message'>Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.</div>";
            header('Location: ../index.php?page=profil');
    }
} else {
    $_SESSION["message"] = "<div id='message'>Erreur lors du téléchargement de l'image.</div>";
            header('Location: ../index.php?page=profil');
}
?>