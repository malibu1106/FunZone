<?php
require_once("elements/connexion_bdd.php");

$sql = "SELECT * FROM games";

// Préparation de la requête
$query = $db->prepare($sql);    
// Lier les valeurs


// Exécution de la requête
$query->execute();
$games = $query->fetchAll(PDO::FETCH_ASSOC);

require_once("elements/close_bdd.php");
?>

<main class="accueil">

<h1>Accueil</h1>
<section class="conteneur-jeu">



    <?php foreach($games as $game){    
    echo '<a href="index.php?page=jeu&jeu=' . $game['name'] . '#contentFrame"><article class="jeu">';
    echo '<p class="game_title">' . $game['name'] . '</p>';
    echo '<img src="' . $game['image_filename'] . '">';
    echo '</article></a>';
    }
?>


    

</section>

</main>