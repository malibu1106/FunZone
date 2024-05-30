<main>
    <h1>Formulaire d'inscription</h1>
    <form action="pages/signup.php" method="POST">
        <input type="text" name="first_name" id="first_name" placeholder="Prénom">
        <input type="text" name="last_name" id="last_name" placeholder="Nom">
        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
        <input type="email" name="email" id="email" placeholder="Votre adresse email">
        <input type="password" name="password" id="password" placeholder="Votre mot de passe">
        <input type="date" name="date_of_birth" id="date_of_birth" min="1900-01-01" max="2035-01-01">
        <input type="submit" value="Valider">
    </form>
</main>