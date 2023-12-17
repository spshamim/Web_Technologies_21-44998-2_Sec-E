<?php
    
    include_once("../../model/userModel.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] =="POST")
    {

        $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
        $userID = openssl_decrypt($_COOKIE['sid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

        $skillname = $_POST["skill_name"];
        $skillpercent = $_POST["skill_percent"];

        // Skill name validation
        if (empty($skillname)) 
        {
            $_SESSION["skillname_err"] = "Skill name cannot be empty!";
        } 
        else 
        {
            // Check if it contains valid characters (letters, dots, or dashes)
            $validCharacters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ,-';
            for ($i = 0; $i < strlen($skillname); $i++) 
            {
                if (strpos($validCharacters, $skillname[$i]) === false) 
                {
                    $_SESSION["skillname_err"] = "Skill name can only contain letters or coma";
                    break; 
                }
            }
        }

        // Skill percentage validation
        if (empty($skillpercent)) 
        {
            $_SESSION["skillpercent_err"] = "Skill percentage cannot be empty!";
        }

        // Assuming $skillpercent is a string with comma-separated values
        $percentArray = explode(',', $skillpercent);
        foreach ($percentArray as $percent) 
        {
            $trimmedPercent = trim($percent);
            
            if (empty($trimmedPercent) || !is_numeric($trimmedPercent) || $trimmedPercent < 0 || $trimmedPercent > 100) 
            {
                $_SESSION["skillpercent_err"] = "Skill percentage must be a valid number between 0 and 100.";
            }
        }

// If the loop completes without breaking, all percentages are valid
// Continue with your logic here...



        if(!isset($_SESSION["skillname_err"]) && !isset($_SESSION["skillpercent_err"]))
        {

            $status = mySkillsDB($userID, $skillname, $skillpercent);

            if ($status) 
            {
                header("location:../../view/seeker/mySkills.php");
            }
            else
            {   
                header("location:../../view/seeker/mySkills.php");
            }
        }
        else
        {   
            header("location:../../view/seeker/mySkills.php");
        }
        
    }
?>
