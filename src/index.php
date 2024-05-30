<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="JS/script.js" defer></script>
    <link rel="stylesheet" href="CSS/style.css">

    <title>FunZone</title>
</head>

<body>
    <!-- <div id="message">Test</div>     -->
    <?php 
    
    if (isset($_SESSION['message'])){
        echo $_SESSION['message'];
        $_SESSION['message'] ="";        
    }
    include 'elements/headerAndMenu.php';
    include 'elements/connexion_bdd.php';
    if (isset($_GET['page']) && $_GET['page'] === "inscription"){
        include 'pages/signup_form.php';}
    elseif (isset($_GET['page']) && $_GET['page'] === "login"){
        include 'pages/login_form.php';}
    else{
        include 'pages/accueil.php';}
    
    
?>

</body>

</html>