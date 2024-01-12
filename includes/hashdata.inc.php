<!-- Hashing functionality for general Data not passwords -->
<?php

$sensitiveData = "Hatalkar";

$salt = bin2hex(random_bytes(16)); // Generate a random salt
$pepper = "ASecretPepperString"; // A keyword to fuse together with the Salt

$dataToHash = $sensitiveData . $salt . $pepper;

$hash = hash("sha256", $dataToHash);

// De Hashing

$sensitiveData2 = "Hatalksar";

$storedSalt = $salt;
$storedHash = $hash;

$pepper = "ASecretPepperString";


$dataToDeHash = $sensitiveData2 . $storedSalt . $pepper;

$deHash = hash("sha256", $dataToDeHash);

if ($storedHash == $deHash) {
    echo "Data is Valid";
    echo "<br>";
    echo $hash;
    echo "<br>";
    echo $deHash;
    exit();
} else {
    echo "Data is Invalid";
    echo "<br>";
    echo $hash;
    echo "<br>";
    echo $deHash;
    exit();
}
