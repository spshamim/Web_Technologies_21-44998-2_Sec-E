<?php

include_once "../model/userModel.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['remove'])) {
        foreach ($_POST['remove'] as $key => $value) {
            $uID = $key;
            removeJobSeeker($uID);
        }
        unset($_POST['remove']);
    }
}

header("Location: ../view/admin_sek.php"); // Redirect back to admin_sek.php
exit(); // prevent unnecessary routing

?>