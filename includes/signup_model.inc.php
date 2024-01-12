<?php

declare(strict_types=1);

function get_username_taken(object $pdo, string $username)
{

    $query = "SELECT username FROM users WHERE username = :%username;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
