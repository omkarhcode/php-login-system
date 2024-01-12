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
            header("Location: ../index.php");
        }


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

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");

        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
