<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    try {
        // Connection to database
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_controller.inc.php";


        // Error Validations
        $errors = [];

        if (is_input_empty($username, $pwd,)) {
            $errors["empty_input"] = "Fill in all fields!";
        };

        $result = get_user($pdo, $username);

        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }


        if (!is_username_wrong($result) && is_password_wrong($pwd, $result['pwd'])) {
            $errors["password_incorrect"] = "Incorrect password!";
        }

        require_once "config_session.inc.php";

        if ($errors) {
            $_SESSION['errors_login'] = $errors;

            header("Location: ../index.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result['id'];
        session_id($sessionId);


        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_username'] = htmlspecialchars($result['username']);
        $_SESSION['user_email'] = htmlspecialchars($result['email']);
        $_SESSION['user_phone'] = htmlspecialchars($result['phone']);

        $_SESSION['last_regeneration'] = time();

        header("Location: ../index.php?login=success");

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
