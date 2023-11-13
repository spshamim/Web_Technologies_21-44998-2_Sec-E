<?php

require_once("../../model/userModel.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminId = $_COOKIE['aid'];

    if (isset($_POST['update'])) {

        // When update button clicked

        if (!empty($_FILES['pic']['name'])) {
            $src = $_FILES['pic']['tmp_name'];
            $des = "../../asset/admin_uploaded/" . $_FILES['pic']['name'];

            if (move_uploaded_file($src, $des)) {
                $fileName = $_FILES['pic']['name'];

                // Updating the adminMetadata in the database
                $updateStatus = updateAdminMetadata($adminId, $fileName);

                if ($updateStatus) {
                    $_SESSION['pu1'] = "Uploaded and transferred to project directory successfully..!";
                    header("location: ../../view/admin_profile/picture.php");
                } else {
                    $_SESSION['pu2'] = "Database error while updating profile picture.";
                    header("location: ../../view/admin_profile/picture.php");
                }
            } else {
                $_SESSION['pu2'] = "Moving Unsuccessful..!";
                header("location: ../../view/admin_profile/picture.php");
            }
        } else {
            // No file selected error
            $_SESSION['pu2'] = "Please select a file first...";
            header("location: ../../view/admin_profile/picture.php");
        }
    } elseif (isset($_POST['delete'])) {
        
        // When delete button is clicked
        
        $deleteStatus = deleteAdminProfilePicture($adminId);

        if ($deleteStatus) {
            $_SESSION['pu1'] = "Profile picture deleted successfully.";
            header("location: ../../view/admin_profile/picture.php");
        } else {
            $_SESSION['pu2'] = "Database error while deleting profile picture.";
            header("location: ../../view/admin_profile/picture.php");
        }
    }
}

?>