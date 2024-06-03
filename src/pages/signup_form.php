<?php if(!empty($_SESSION["emailAlreadyUsed"]) || !empty($_SESSION["pseudoAlreadyUsed"])){
$first_name = $_SESSION["first_name"];
$last_name = $_SESSION["last_name"];
$pseudo = $_SESSION["pseudo"];
$email = $_SESSION["email"];
$password = $_SESSION["password"];
$date_of_birth = $_SESSION["date_of_birth"];

}
else{
$first_name = "";
$last_name = "";
$pseudo = "";
$email = "";
$password = "";
$date_of_birth = "";

}
?>

<main class="signup">
    <h1>Formulaire d'inscription</h1>
    <form action="pages/signup.php" method="POST">
        <input type="text" required name="first_name" id="first_name" placeholder="Prénom" value="<?= $first_name?>">
        <input type="text" required name="last_name" id="last_name" placeholder="Nom" value="<?= $last_name?>">
        <input type="text" required name="pseudo" id="pseudo" placeholder="Pseudo" value="<?= $pseudo?>">
        <input type="email" required name="email" id="email" placeholder="Votre adresse email" value="<?= $email?>">
        <div class="password_input_containeur"><input type="password" required name="password" id="password" class="passwordInputSignup" placeholder="Votre mot de passe" value="<?= $password?>"><img id="showPasswordImage" src="../images/showPassword.png"></div>
        <div class="password_input_containeur"><input type="password" required name="passwordRetyped" id="passwordRetyped" class="passwordInputSignup" placeholder="Retaper mot de passe" value="<?= $password?>"><img id="showPasswordImageRetyped" src="../images/showPassword.png"></div>
        <input type="date" required name="date_of_birth" id="date_of_birth" min="1900-01-01" max="2035-01-01" value="<?= $date_of_birth?>">
        <input id="signup_submit" type="submit" value="Valider">
    </form>
</main>
<script src="../JS/signup_form.js" defer></script>
