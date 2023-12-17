<?php

    session_start();
    include("../../model/userModel.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES['cv']) && $_FILES['cv']['error'] == UPLOAD_ERR_OK) 
        {
            $src = $_FILES['cv']['tmp_name'];
            $des = "../../asset/cv&picture/" . $_FILES['cv']['name'];

            if (move_uploaded_file($src, $des)) 
            {
                $filename = $_FILES['cv']['name'];
                $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
                $userID = openssl_decrypt($_COOKIE['sid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

                $updateCV = updateCVDB($userID, $filename);
                if($updateCV)
                {
                    $_SESSION["cv_message"] = "CV Upload Successful.";
                    header("location:../../view/seeker/myCV&Picture.php");
                }
                else 
                {
                    $_SESSION["cv_error"] = "CV Upload Unsuccessful.";
                    header("location:../../view/seeker/myCV&Picture.php");
                }
            }
            else 
            {
                $_SESSION["cv_error"] = "CV Upload Unsuccessful.";
                header("location:../../view/seeker/myCV&Picture.php");
            }
        } 
        else 
        {
            $_SESSION["cv_empty"] = "Please Select First.";
            header("location:../../view/seeker/myCV&Picture.php");
        }
    }

?>