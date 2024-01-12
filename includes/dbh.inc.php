<!-- DBH - Database Handler -->
<?php


// dsn - data source name
$dsn = "mysql:host=localhost;dbname=bdcuser1";
$dbusername = "root";
$dbpassword = "";


try {

    // pdo - PHP Data Object
    $pdo = new PDO($dsn, $dbusername, $dbpassword);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection Failed: " . $e->getMessage());
}
