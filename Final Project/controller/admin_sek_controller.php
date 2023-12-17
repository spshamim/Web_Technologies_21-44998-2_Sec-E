<?php

require_once "../model/userModel.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['remove'])) {
        $uID = $_GET['remove'];
        removeJobSeeker($uID);
    }
}

header("Location: ../view/admin_sek.php"); // Redirect back to admin_sek.php
exit(); // prevent unnecessary routing

?>