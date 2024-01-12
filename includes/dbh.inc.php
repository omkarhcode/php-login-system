<!-- DBH - Database Handler -->
<?php

$host = 'localhost';
$dbname = 'login_system';
$dbusername = 'root';
$dbpassword = '';

try {
    // pdo - PHP Data Object
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection Failed: " . $e->getMessage());
}
