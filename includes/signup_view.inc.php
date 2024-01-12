<?php

declare(strict_types=1);


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
