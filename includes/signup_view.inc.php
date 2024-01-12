<?php

declare(strict_types=1);

function signup_input()
{

    if (
        isset($_SESSION['signup_data']["username"]) &&
        !isset($_SESSION["errors_signup"]["username_taken"])
    ) {
        echo '<input type="text" name="username" placeholder="Username" value="' . $_SESSION['signup_data']["username"] . '">';
    } else {
        echo '<input type="text" name="username" placeholder="Username">';
    }


    echo '<div class="password-container">
            <input type="password" name="pwd" placeholder="Password" id="password-field">
            <span toggle="#password-field" class="toggle-password"><i class="fa fa-eye"></i></span>
        </div>';


    if (
        isset($_SESSION['signup_data']["email"]) &&
        !isset($_SESSION["errors_signup"]["email_registered"]) &&
        !isset($_SESSION["errors_signup"]["invalid_email"])
    ) {
        echo '<input type="text" name="email" placeholder="E-mail" value="' . $_SESSION['signup_data']["email"] . '">';
    } else {
        echo '<input type="text" name="email" placeholder="E-mail">';
    }


    if (
        isset($_SESSION['signup_data']["phone"]) &&
        !isset($_SESSION["errors_signup"]["phone_registered"]) &&
        !isset($_SESSION["errors_signup"]["phone_length"]) &&
        !isset($_SESSION["errors_signup"]["phone_alphabetic"])
    ) {
        echo '<input type="text" name="phone" placeholder="Phone Number" value="' . $_SESSION['signup_data']["phone"] . '">';
    } else {
        echo '<input type="text" name="phone" placeholder="Phone Number">';
    }
}

function check_signup()
{
    // Errors
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }

        unset($_SESSION['errors_signup']);
    }
    // Success
    else if (isset($_GET['signup']) && $_GET['signup'] === 'success') {
        echo "<br>";
        echo '<p class="form-success">Signed-up Successfully. PLEASE LOGIN.</p>';
    }
}
