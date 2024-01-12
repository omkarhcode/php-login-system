<?php

require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
?>

<h3>Signup</h3>

<form action="includes/signup.inc.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <div class="password-container">
        <input type="password" name="pwd" placeholder="Password" id="password-field">
        <span toggle="#password-field" class="toggle-password"><i class="fa fa-eye"></i></span>
    </div>
    <input type="text" name="email" placeholder="E-mail">
    <input type="text" name="phone" placeholder="Phone Number">
    <button>Signup</button>
</form>

<?php
check_signup_errors()
?>