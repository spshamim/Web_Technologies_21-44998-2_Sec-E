<?php
    require_once('../model/userModel.php');
    require_once('../controller/adminsession.php');

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $userID = $_GET['id'];
        echo $userID;   
        $status = deleteEmployee($userID);

        if ($status) {
            header("location: ../view/admin.php");
        } else {
            // Handle delete failure
            echo "Delete failed";
        }
    }
?>
