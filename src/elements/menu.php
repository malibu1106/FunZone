<nav class="menu">

            <ul>
                <?php  
                if (!isset($_SESSION['user'])){           
                    echo '<li><a href="index.php?page=login">Connexion</a></li>
                    <li><a href="index.php?page=inscription">Inscription</a></li>';}
                else{
                    echo 'Bonjour ' . $_SESSION['user'];
                    echo '<li><a href="index.php?page=profil">Profil</a></li>
                <li><a href="../pages/logoff.php">Déconnexion</a></li>';}?>
            </ul>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="#">Jeux solo</a></li>
                <li><a href="#">Jeux multijoueurs</a></li>
                <li><a href="#">Aide</a></li>
            </ul>            
            <ul>   
                <li><a href="#">Contact</a></li>
                <li><a href="#">F.A.Q</a></li>
            </ul>
</nav>