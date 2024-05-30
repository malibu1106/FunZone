<?php
session_start();
session_destroy();
session_start();
$_SESSION['message'] = "<div id='message'>Vous vous êtes bien déconnecté</div>";
header('Location: ../index.php'); // Rediriger vers la page de connexion après la déconnexion
exit();
?>