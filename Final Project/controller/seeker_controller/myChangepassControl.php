<?php

    
    include("../../model/userModel.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] =="POST")
    {

        $currpass = $_POST['curr_pass'];
        $newpass = $_POST['new_pass'];
        $conffpass = $_POST['conff_pass'];
        $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
        $userID = openssl_decrypt($_COOKIE['sid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

        if (empty($currpass) || empty($newpass) || empty($conffpass))
        {
            $_SESSION["all_error"] = "Pssword fields must be fills!";
        }


        //New Password should not be the same as the Current Password
        $rtypepass = retypepassCheck($userID);
        if ($rtypepass === $newpass) 
        {
            $_SESSION["newpass_err"] = "New Password should not be the same as the Current Password.";
        }
        

        if ( (strlen($newpass) < 8) || (strlen($conffpass) < 8) ) 
        {
            $_SESSION["newpass_err"] = "Password must be 8 characters";
        }
 
        $hasUppercase = false;
        $hasLowercase = false;
        $hasSpecialCharacter = false;

        $upLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowLetters = 'abcdefghijklmnopqrstuvwxyz';
        $specialCharacters = '!@#$%^&*()-_+=[]{}|;:,.<>?';

        for ($i = 0; $i < strlen($newPass); $i++) 
        {
            $char = $newPass[$i];

            if (strpos($upLetters, $char) !== false) 
            {
                $hasUppercase = true;

            } elseif (strpos($lowLetters, $char) !== false) 
            {
                $hasLowercase = true;

            } elseif (strpos($specialCharacters, $char) !== false) 
            {
                $hasSpecialCharacter = true;
            }
        }

        if ( ($hasUppercase) && ($hasLowercase) && ($hasSpecialCharacter)) 
        {
            $_SESSION["newpass_err"] = "New Password must contain at least one upperletter, lowerletter , & special character.";
        }


        //New Password must match with the Retyped Password
        if ($newpass !== $conffpass) 
        {
            $_SESSION["conffpass_err"] = "New Password and Retyped Password do not match.";
        }       





        if(!isset($_SESSION["all_error"]) && !isset($_SESSION["newpass_err"]) && !isset($_SESSION["conffpass_err"]))
        {


            $status = myChangePassword($userID, $newpass);
            if ($status) 
            {
                $_SESSION["error"] = "Password Update Unsuccessful.";
                header("location:../../view/seeker/myChangePassword.php");
            }
            else
            {   
                $_SESSION["message"] = "Update Password Successful.";
                header("location:../../view/seeker/myChangePassword.php");
            }
        }
        else
        {
            header("location:../../view/seeker/myChangePassword.php"); 
        }

    }
?>