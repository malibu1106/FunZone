<?php
const DBHOST = "db";
const DBNAME = "projet";
const DBUSER = "malibu";
const DBPASS = "noplaceforus";

$dsn = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=utf8';

try {
    $db = new PDO($dsn, DBUSER, DBPASS);
    // echo "Connexion à la base de données réussie 👌<br>";
} catch (PDOException $error) {
    echo "Problème de connexion : ";
    echo $error->getMessage();
}
?>
