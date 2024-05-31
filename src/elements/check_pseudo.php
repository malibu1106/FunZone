<?php
$servername = "db";
$username = "malibu";
$password = "noplaceforus";
$dbname = "projet";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['pseudo'])) {
    $pseudo = $_POST['pseudo'];
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM users WHERE pseudo = ?");
    $stmt->bind_param("s", $pseudo);
    $stmt->execute();
    $stmt->bind_result($count2);
    $stmt->fetch();
    $stmt->close();

    echo json_encode(['exists' => $count2 > 0]);
}

$conn->close();
?>