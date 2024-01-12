<h3>Signup</h3>

<form action="includes/formhandler.inc.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <div class="password-container">
        <input type="password" name="pwd" placeholder="Password" id="password-field">
        <span toggle="#password-field" class="toggle-password"><i class="fa fa-eye"></i></span>
    </div>
    <!-- <input type="password" name="pwd" placeholder="Password"> -->
    <input type="text" name="email" placeholder="E-mail">
    <button>Signup</button>
</form>


<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
        echo '<p class="error-message">Fill in all fields!</p>';
    } else if ($_GET['error'] == "invalidemailusername") {
        echo '<p class="error-message">Invalid username and e-mail!</p>';
    } else if ($_GET['error'] == "invalidemail") {
        echo '<p class="error-message">Invalid e-mail!</p>';
    } else if ($_GET['error'] == "invalidusername") {
        echo '<p class="error-message">Invalid username!</p>';
    } else if ($_GET['error'] == "passwordlength") {
        echo '<p class="error-message">Password should be atleast 6 characters!</p>';
    }
}
?>