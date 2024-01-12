<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];


    if (empty($username) || empty($pwd) || empty($email)) {
        header("Location: ../index.php?error=emptyfields&username=" . $username . "&email=" . $email);
        die();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?error=invalidemail&username=" . $username);
        die();
    } else if (strlen($pwd) < 6) {
        header("Location: ../index.php?error=passwordlength&username=" . $username . "&email=" . $email);
        die();
    }


    try {
        // Connection to database
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";

        $stmt = $pdo->prepare($query);


        $options = [
            'cost' => 12,
        ];

        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':pwd', $hashedPwd);
        $stmt->bindParam(':email', $email);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");

        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}
