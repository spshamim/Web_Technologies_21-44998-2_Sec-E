<?php

    session_start();
    include_once("../../model/userModel.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $sekname        = $_POST['sek_name'];
        $username       = $_POST['user_name'];
        $sekemail       = $_POST['email'];
        $sekpass        = $_POST['sek_pass'];
        $sekconfpass    = $_POST['conf_pass'];

        // seeker name 
        if(empty($sekname))
        {
            $_SESSION["sekname_err"] = "Seeker name cannot be empty!";
        }
        else
        {
            $word = explode(" ", $sekname);
            // Check if it contains a-z, A-Z, dot(.), or dash(-)
            $validCharacters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ .-';
            foreach ($words as $word) 
            {
                for ($i = 0; $i < strlen($word); $i++) 
                {
                    if (strpos($validCharacters, $word[$i]) === false) 
                    {
                            $_SESSION["sekname_err"] = "Seeker name can only contain letters, space, dots, or dashes";
                            break 2; 
                        }
                }
            }

            if (count($word) < 2) 
            {
                $_SESSION["sekname_err"] = "Seeker name must contain at least two words.";
            }
            // Check if it starts with a letter
            $startchar = $sekname[0];
            if (!(($startchar >= 'A' && $startchar <= 'Z') || ($startchar >= 'a' && $startchar <= 'z'))) 
            {
                $_SESSION["sekname_err"] = "Seeker name Start with letter";
            }
            

        }

        // seeker user name 
        if(empty($username))
        {
            $_SESSION["username_err"] = "Seeker user name cannot be empty!";
        }
        else
        {

            $validChar8 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ .-';
            for ($i = 0; $i < strlen($username); $i++) 
            {
                $char1 = $username[$i];
                if (strpos($validChar8, $char1) === false) 
                {
                    $_SESSION["username_err"] = "Seeker user name can only contain letters, numbers, space, dots, or dashes";
                }
            }
            
            // Check if it starts with a letter
            $startchar = $username[0];
            if (!(($startchar >= 'A' && $startchar <= 'Z') || ($startchar >= 'a' && $startchar <= 'z'))) 
            {
                $_SESSION["username_err"] = "Seeker user name Start with letter";
            } 
            
            if (strlen($username) < 6) 
            {
                $_SESSION["username_err"] = "Username must be 6 characters";
            }
        }

        //Email validation
        if(empty($sekemail))
        {
            $_SESSION["sekemail_err"] = "Email can not be empty!";
        }
        else
        {
            function validemail($sekemail) 
            {
                for ($i = 0; $i<strlen($sekemail); $i++) 
                {
                    $char = $sekemail[$i];
                    if ($char === '@' || $char === '.') 
                    {
                        return true;
                    }
                }
                return false;
            }
        
            if(validemail($sekemail))
            {
                $_SESSION["email_err"]="Invalid Email!";
            }
        }

        //Password validation
        if(empty($sekpass) || empty($sekconfpass))
        {
            $_SESSION["sekpass_err"] = "Password can not be empty";
            $_SESSION["sekconfpass_err"] = "Confirm Password can not be empty";
        }
        else
        {
            //Password must contain at least one uppercase letter
            function containsUppercase($str) 
            {
                $upletters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

                for ($i = 0; $i < strlen($str); $i++) 
                {
                    if (strpos($upletters, $str[$i]) !== false) 
                    {
                        return true;
                    }
                }

                return false;
            }

            if (!containsUppercase($sekpass)) 
            {
                $_SESSION["sekpass_err"] = "Password must contain at least one uppercase letter.";
            }

            //Function to check if a string contains at least one lowercase letter
            function containsLowercase($str)
            {
                $lowletter = 'abcdefghijklmnopqrstuvwxyz';

                for ($i = 0; $i < strlen($str); $i++) 
                {
                    if (strpos($lowletter, $str[$i]) !== false) 
                    {
                        return true;
                    }
                }

                return false;
            }

            //New Password must contain at least one lowercase letter
            if (!containsLowercase($sekpass)) 
            {
                $_SESSION["sekpass_err"] = "Password must contain at least one lowercase letter.";
            }

            // Function to check if a string contains at least one special character
            function containsSpecialChar($str) 
            {
                $specialChars = ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', ',', '.', '?', '"', ':', '{', '}', '|', '<', '>'];
                for ($i = 0; $i < strlen($str); $i++) 
                {
                    if (in_array($str[$i], $specialChars)) 
                    {
                        return true;
                    }
                }
                return false;
            }

            // New Password must contain at least one special character
            if (!containsSpecialChar($sekpass)) 
            {
                $_SESSION["sekpass_err"] = "Password must contain at least one special character.";
            }

            if ( (strlen($sekpass) < 8) || (strlen($sekconfpass) < 8) ) 
            {
                $_SESSION["sekpass_err"] = "Password must be 8 characters";
            }

            if($sekpass !== $sekconfpass)
            {
                $_SESSION["sekconfpass_err"] = "Password must be 8 characters";
            }

        }

       

        if(!isset($_SESSION["sekname_err"]) && !isset($_SESSION["username_err"]) && 
            !isset($_SESSION["sekemail_err"]) && !isset($_SESSION["sekpass_err"]))
        {

            $data = array(

                'sekname' => $sekname,
                'username' => $username,
                'sekemail' => $sekemail,
                'sekpass' => $sekpass,
                
            );
    
            $status = sekRegistration($data);
    
            if ($status) 
            {
                header("location:../../view/login.php");
            } else 
            {
                header("location:../../view/sekRegistration.php");
            }

        }
        else
        {
            $_SESSION["sekname"]    = $_POST['sek_name'];
            $_SESSION["username"]   = $_POST['user_name'];
            $_SESSION["sekemail"]   = $_POST['email'];
            //$_SESSION["sekpass"]    = $_POST['sek_pass'];
            header("location:../../view/sekRegistration.php");
        }
    }
?>
