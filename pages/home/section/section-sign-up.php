<?php

require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
?>

<h3>or Signup</h3>

<form action="includes/signup.inc.php" method="post">
    <?php signup_input() ?>
    <button>Signup</button>
</form>

<?php
check_signup();
?>