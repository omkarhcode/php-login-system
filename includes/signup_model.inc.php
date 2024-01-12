<?php

declare(strict_types=1);

function get_username_taken(object $pdo, string $username)
{

    $query = "SELECT username FROM users WHERE username = :username;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
function get_email_registered(object $pdo, string $email)
{

    $query = "SELECT email FROM users WHERE email = :email;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function get_phone_registered(object $pdo, string $phone)
{

    $query = "SELECT phone FROM users WHERE phone = :phone;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function set_user(object $pdo, string $username, string  $pwd, string  $email, string  $phone)
{


    $query = "INSERT INTO users (username, pwd, email, phone) VALUES (:username, :pwd, :email, :phone);";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12,
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':pwd', $hashedPwd);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);

    $stmt->execute();
}
