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



    <?php include 'pages/home/section/section-login.php'; ?>

    <br>
    <?php include 'pages/home/section/section-sign-up.php'; ?>





    <script>
        // Added event listener to toggle password visibility
        document.querySelector('.toggle-password').addEventListener('click', function() {
            var passwordField = document.querySelector('#password-field');
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
    </script>




</body>

</html>