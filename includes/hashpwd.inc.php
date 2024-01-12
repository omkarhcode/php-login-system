<!-- Hashing functionality for general Data not passwords -->
<?php


$pwdSignup = "Hatalkar";

$options = [
    'cost' => 12,
];

$hashedPwd = password_hash($pwdSignup, PASSWORD_BCRYPT, $options);


$loginPwd = "Hatalka1r";


if (password_verify($loginPwd, $hashedPwd)) {
    echo "Password is valid!";
} else {
    echo "Invalid password.";
}
