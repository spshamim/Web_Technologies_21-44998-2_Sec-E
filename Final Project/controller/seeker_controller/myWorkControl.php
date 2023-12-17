<?php

    session_start();
    require_once("../../model/userModel.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {

        $designationtitle = $_POST['designation'];
        $y1 = $_POST['year1'];
        $y2 = $_POST['year2'];
        $compname = $_POST['comp_name'];
        $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
        $userID = openssl_decrypt($_COOKIE['sid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

        // Designation validation
        if (empty($designationtitle)) 
        {
            $_SESSION["designationtitle_err"] = "Designation cannot be empty!";
        } 
        else 
        {
            $validChar1 = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.-';
            for ($i = 0; $i < strlen($designationtitle); $i++) 
            {
                if (strpos($validChar1, $designationtitle[$i]) === false) 
                {
                    $_SESSION["designationtitle_err"] = "Designation only contain letters, dots, or dashes."; 
                }
            }
        }

        // Year validation
        if (empty($y1) || empty($y2)) 
        {
            $_SESSION["year_err"] = "Years cannot be empty!";
        } 
        elseif (($y1 < 1900 || $y1 >= 2025) && ($y2 < 1900 || $y2 >= 2025)) 
        {
            $_SESSION["year_err"] = "Years must be valid numeric values!";
        }

        // Company name validation
        if (empty($compname)) 
        {
            $_SESSION["compname_err"] = "Company name cannot be empty!";
        } 
        else 
        {
            $validChar2 = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.-';
           for ($i = 0; $i < strlen($compname); $i++) 
           {
               if (strpos($validChar2, $compname[$i]) === false) 
               {
                   $_SESSION["compname_err"] = "Company name only contain letters, dots, or dashes."; 
               }
           }
        }



        if (!isset($_SESSION["designationtitle_err"]) && !isset($_SESSION["year_err"]) && !isset($_SESSION["compname_err"])) 
        {
        
            $status = myWorkDB($userID, $designationtitle, $y1, $y2, $compname);

            if ($status) 
            {
                //Work experience updated successfully
                header("location: ../../view/seeker/myWork.php");
                
            } 
            else 
            {
                //Error updating work experience
                header("location: ../../view/seeker/myWork.php");
            }
        }
        else 
        {
            // Redirect to the form page with errors
            header("location:../../view/seeker/myWork.php");
        }

    }

?>
