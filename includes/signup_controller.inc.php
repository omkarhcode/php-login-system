<?php

declare(strict_types=1);


function is_input_validation(string $username, string  $pwd, string  $email, string  $phone)
{

    $errors = [];
    if (empty($username) || empty($pwd) || empty($email) || empty($phone)) {
        return $errors["empty_input"] = "Fill in all fields!";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $errors["invalid_email"] = "Invalid Email!!";
    } else if (strlen($pwd) < 6) {
        return $errors["password_length"] = "Password should be at least 6 characters!";
    } else if (strlen($phone) >= 20) {
        return $errors["phone_length"] = "Phone number cannot exceed 20 numbers!";
    } else if (preg_match('/[a-zA-Z]/', $phone)) {
        return $errors["phone_alphabetic"] = "Phone number cannot contain alphabetic characters!";
    }
}

function is_user_taken(object $pdo, string $username)
{
    if (get_username_taken($pdo, $username)) {
        return $errors["username_taken"] = "Username exist!";
    }
}

function is_email_registered(object $pdo, string $email)
{
    if (get_email_registered($pdo, $email)) {
        return $errors["email_registered"] = "Email exist!";
    }
}

function is_phone_registered(object $pdo, string $phone)
{
    if (get_phone_registered($pdo, $phone)) {
        return $errors["phone_registered"] = "Phone Number exist!";
    }
}

function create_user(object $pdo, string $username, string  $pwd, string  $email, string  $phone)
{
    set_user($pdo, $username,  $pwd,  $email,  $phone);
}
