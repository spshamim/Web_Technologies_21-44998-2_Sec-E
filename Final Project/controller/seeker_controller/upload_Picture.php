<?php

    session_start();
    include("../../model/userModel.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (isset($_FILES['picture']) && $_FILES['picture']['error'] == UPLOAD_ERR_OK) 
        {
            $src = $_FILES['picture']['tmp_name'];
            $des = "../../asset/cv&picture/" . $_FILES['picture']['name'];

            if (move_uploaded_file($src, $des)) 
            {
                $filename = $_FILES['picture']['name'];
                $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
                $userID = openssl_decrypt($_COOKIE['sid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

                $updatePicture = updatePictureDB($userID, $filename);
                if($updatePicture)
                {
                    $_SESSION["pic_message"] = "Picture Upload Successful.";
                    header("location:../../view/seeker/myCV&Picture.php");
                }
                else 
                {
                    $_SESSION["pic_error"] = "Picture Upload Unsuccessful.";
                    header("location:../../view/seeker/myCV&Picture.php");
                }   

            }
            else 
            {
                $_SESSION["pic_error"] = "Picture Upload Unsuccessful.";
                header("location:../../view/seeker/myCV&Picture.php");
            }
        } 
        else 
        {
            $_SESSION["pic_empty"] = "Please Select First.";
            header("location:../../view/seeker/myCV&Picture.php");
        }
    }

?>

