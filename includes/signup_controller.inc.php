<?php

declare(strict_types=1);


function is_input_empty(string $username, string  $pwd, string  $email, string  $phone)
{
    if (empty($username) || empty($pwd) || empty($email) || empty($phone)) {
        header("Location: ../index.php?error=emptyfields");
        die();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?error=invalidemail");
        die();
    } else if (strlen($pwd) < 6) {
        header("Location: ../index.php?error=passwordlength");
        die();
    } else if (strlen($phone) < 15) {
        header("Location: ../index.php?error=phonelength");
        die();
    }
}

function is_user_taken(object $pdo, string $username)
{
    if (get_username_taken($pdo, $username)) {
        header("Location: ../index.php?error=usernametaken");
        die();
    }
}

function is_email_registered(object $pdo, string $email)
{
    if (get_email_registered($pdo, $email)) {
        header("Location: ../index.php?error=emailregistered");
        die();
    }
}
