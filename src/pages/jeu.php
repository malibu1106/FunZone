<?php
if(isset($_GET['jeu'])){
    $jeu = $_GET['jeu'];
   
    require_once("elements/connexion_bdd.php");
    
    $sql = "SELECT * FROM games WHERE name = :jeu";
    
    // Préparation de la requête
    $query = $db->prepare($sql);    
    // Lier les valeurs
    $query->bindValue(':jeu', $jeu);
    
    
    // Exécution de la requête
    $query->execute();
    $game = $query->fetch(PDO::FETCH_ASSOC);
    
    require_once("elements/close_bdd.php");}
    ?>

<main class="jeu">
<iframe
  id="contentFrame"
  scrolling="no"
  title="<?=$game['name'];?>"
  src="<?=$game['location'];?>">
</iframe>
</main>
<script>
        function adjustIframeHeight() {
            let iframe = document.getElementById('contentFrame');
            iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
        }

        // Adjust height when iframe loads
        var iframe = document.getElementById('contentFrame');
        iframe.onload = function() {
            adjustIframeHeight();
        };
    </script>