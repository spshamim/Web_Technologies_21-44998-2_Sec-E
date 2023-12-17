<?php
    
    session_start();
    include_once("../../model/userModel.php");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        $degname = $_POST['deg_name'];
        $year1 = $_POST['year'];
        $instname = $_POST['inst_name'];

        $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
        $userID = openssl_decrypt($_COOKIE['sid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

        
        // Degree name validation
        if (empty($degname)) 
        {
            $_SESSION["degname_err"] = "Degree name cannot be empty!";
        } 
        else 
        {
            $words = explode(" ", $degname);
            // Check if it contains a-z, A-Z, dot(.), or dash(-)
            $validChar1 = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.-';
            foreach ($words as $word) 
            {
                for ($i = 0; $i < strlen($word); $i++) 
                {
                    if (strpos($validChar1, $word[$i]) === false) 
                    {
                        $_SESSION["degname_err"] = "Degree name can only contain letters, dots, or dashes."; 
                    }
                }
            }

            // Check if it starts with a letter
            $startchar1 = $degname[0];
            if (!($startchar1 >= 'A' && $startchar1 <= 'Z') && !($startchar1 >= 'a' && $startchar1 <= 'z')) 
            {
                $_SESSION["degname_err"] = "Degree name does not start with a letter!";
            }
        }

        // Year Validation
        if (empty($year1)) 
        {
            $_SESSION["year_err"] = "Year cannot be empty!";
        } 
        else 
        {
            if ($year1 < 1900 || $year1 > 2030) 
            {
                $_SESSION["year_err"] = "Invalid Year value!";
            }
        }


        if (empty($instname)) 
        {
            $_SESSION["instname_err"] = "Institution name cannot be empty!";
        } 
        else 
        {
            $words = explode(" ", $instname);
            // Check if it contains a-z, A-Z, dot(.), or dash(-)
            $validChar2 = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.-';
            foreach ($words as $word) 
            {
                for ($i = 0; $i < strlen($word); $i++) 
                {
                    if (strpos($validChar2, $word[$i]) === false) 
                    {
                        $_SESSION["instname_err"] = "Institution name can only contain letters, dots, or dashes.";
                        break 2; 
                    }
                }
            }

            // Check if it starts with a letter
            $startchar2 = $instname[0];
            if (!($startchar2 >= 'A' && $startchar2 <= 'Z') && !($startchar2 >= 'a' && $startchar2 <= 'z')) 
            {
                $_SESSION["instname_err"] = "Institution name does not start with a letter!";
            }
        }

        if(!isset($_SESSION["degname_err"]) && !isset($_SESSION["year_err"]) && !isset($_SESSION["instname_err"]))
        {

            $status = myEducationDB($userID, $degname, $year1, $instname);

            if ($status) 
            {
                header("location:../../view/seeker/myEducation.php");
            }
            else
            {   
                header("location:../../view/seeker/myEducation.php");
            }
        }
        else
        {
            $_SESSION["degname"]    = $_POST['deg_name'];
            $_SESSION["year1"]   = $_POST['year'];
            $_SESSION["instname"]   = $_POST['inst_name'];
            header("location:../../view/seeker/myEducation.php");
        }

    }
?>

