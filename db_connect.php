<?php
$dsn = 'mysql:host=127.0.0.1;dbname=RiffIndex';
$username = 'root'; // Update if using a different user
$password = '';     // Update if there's a password

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
