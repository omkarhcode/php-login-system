<?php

require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Responsive Nav bar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">


</head>

<body id="body">



    <h3>Login</h3>

    <form action="includes/login.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <div class="password-container">
            <input type="password" name="pwd" placeholder="Password" id="password-field">
            <span toggle="#password-field" class="toggle-password"><i class="fa fa-eye"></i></span>
        </div>

        <button>Login</button>
    </form>

    <?php
    check_login();
    ?>


    <br><br>


    <h3>or Signup</h3>

    <form action="includes/signup.inc.php" method="post">
        <?php signup_input() ?>
        <button>Signup</button>
    </form>

    <?php
    check_signup();
    ?>


    <br><br>

    <h3>Logout</h3>

    <form action="includes/logout.inc.php" method="post">
        <button>Logout</button>
    </form>


    <script>
        var toggleButtons = document.querySelectorAll('.toggle-password');
        toggleButtons.forEach(function(toggleButton) {
            // Add event listener to each toggle button
            toggleButton.addEventListener('click', function() {
                // Select the associated password field
                var passwordField = this.previousElementSibling;
                var passwordFieldType = passwordField.getAttribute('type');

                if (passwordFieldType == 'password') {
                    passwordField.setAttribute('type', 'text');
                    this.querySelector('i').classList.remove('fa-eye');
                    this.querySelector('i').classList.add('fa-eye-slash');
                } else {
                    passwordField.setAttribute('type', 'password');
                    this.querySelector('i').classList.remove('fa-eye-slash');
                    this.querySelector('i').classList.add('fa-eye');
                }
            });
        });
    </script>




</body>

</html>