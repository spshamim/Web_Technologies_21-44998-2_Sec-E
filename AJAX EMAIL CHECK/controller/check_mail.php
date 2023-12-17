<?php
    require("../model/userModel.php");
    
    $email = $_POST['email'];
    $available = checkEmailAvailability($email);

    if ($available) {
        echo "Email is available!";
    } else {
        echo "Email is already in use. Please choose another.";
    }
?>
