<?php
const DBHOST = "db";
const DBNAME = "projet";
const DBUSER = "malibu";
const DBPASS = "noplaceforus";

$dsn = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=utf8';

try {
    $db = new PDO($dsn, DBUSER, DBPASS);
    echo "Connexion à la base de données réussie 👌<br>";
} catch (PDOException $error) {
    echo "Problème de connexion : ";
    echo $error->getMessage();
}

// Requête SQL pour sélectionner les utilisateurs nés en mars à septembre
$sql = "SELECT * FROM users WHERE MONTH(date_of_birth) <= 3 OR MONTH(date_of_birth) >= 9";

// Préparation de la requête
$query = $db->prepare($sql);

// Exécution de la requête
$query->execute();

// Stockage du résultat dans un tableau associatif
$users = $query->fetchAll(PDO::FETCH_ASSOC);

// Fermeture de la connexion à la base de données
$db = null;

// Affichage des résultats
?>
