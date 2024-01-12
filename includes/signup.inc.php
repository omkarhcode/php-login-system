<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    try {
        // Connection to database
        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_controller.inc.php";

        // Error Validations
        $errors = [];

        if (is_input_validation($username, $pwd, $email, $phone)) {
            $errors[] = is_input_validation($username, $pwd, $email, $phone);
        };
        if (is_user_taken($pdo, $username)) {
            $errors[] = is_user_taken($pdo, $username);
        }
        if (is_email_registered($pdo, $email)) {
            $errors[] = is_email_registered($pdo, $email);
        }
        if (is_phone_registered($pdo, $phone)) {
            $errors[] = is_phone_registered($pdo, $phone);
        }


        require_once "config_session.inc.php";

        if ($errors) {
            $_SESSION['errors_signup'] = $errors;

            // array to set valid data even if error occurs
            $signupData =  [
                "username" => $username,
                "email" => $email,
                "phone" => $phone
            ];

            $_SESSION['signup_data'] = $signupData;

            header("Location: ../index.php");
            die();
        }

        create_user($pdo, $username, $pwd, $email, $phone);

        header("Location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
