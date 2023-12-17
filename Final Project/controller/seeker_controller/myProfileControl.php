<?php

    session_start();
    require_once("../../model/userModel.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
        $userID = openssl_decrypt($_COOKIE['sid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

        $name       = $_POST['u_name'];
        $profTitle  = $_POST['prof_title'];
        $gender     = $_POST['gender'];
        $age        = $_POST['age'];
        $cgpa       = $_POST['cgpa'];
        $salary     = $_POST['expt_salary'];
        $experience = $_POST['work_exp'];
        $website    = $_POST['website'];
        $aboutMe    = $_POST['about_u'];
        $phone      = $_POST['phn_num'];
        $email      = $_POST['email'];
        $address    = $_POST['address'];
        $city       = $_POST['city'];
        $google     = $_POST['google'];
        $twitter    = $_POST['twitter'];
        $facebook   = $_POST['facebook'];
        $linkedin   = $_POST['linkedin'];

        // name Validation
        if (empty($name) || empty($profTitle) || empty($gender) || empty($age) || empty($cgpa) || empty($salary) || 
            empty($experience) || empty($website) || empty($aboutMe) || empty($phone) || empty($address) || 
            empty($city) || empty($google) || empty($twitter) || empty($facebook) || empty($linkedin))

            {
                $_SESSION["name_err"]       = "Name cannot be empty!";
                $_SESSION["profTitle_err"]  = "Name cannot be empty!"; 
                $_SESSION["gender_err"]     = "Gender cannot be empty!";
                $_SESSION["age_err"]        = "Age cannot be empty!";
                $_SESSION["cgpa_err"]       = "CGPA cannot be empty!";
                $_SESSION["salary_err"]     = "Salary cannot be empty!";
                $_SESSION["experience_err"] = "Work experience cannot be empty!";
                $_SESSION["website_err"]    = "Website cannot be empty!";
                $_SESSION["aboutMe_err"]    = "About yourselt cannot be empty!";
                $_SESSION["phone_err"]      = "Phone number cannot be empty!";
                $_SESSION["address_err"]    = "Address cannot be empty!";
                $_SESSION["city_err"]       = "City cannot be empty!";
                $_SESSION["google_err"]     = "Google link can be empty!";
                $_SESSION["twitter_err"]    = "Twitter link can be empty!";
                $_SESSION["facebook_err"]   = "Facebook link can be empty!";
                $_SESSION["linkedin_err"]   = "linkedin link can be empty!";

        }
        else
        {
            // Professional title Validation
            $validChar1 = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ';
            for ($i = 0; $i < strlen($profTitle); $i++) 
            {
                $char = $profTitle[$i];
                if (strpos($validChar1, $char) === false) 
                {
                    $_SESSION["profTitle_err"] = "Professional title can only contain letters or space.";
                }
            }
            $startchar1 = $profTitle[0];
            if (!(($startchar1 >= 'A' && $startchar1 <= 'Z') || ($startchar1 >= 'a' && $startchar1 <= 'z'))) 
            {
                $_SESSION["profTitle_err"] = "Professional title does not contain number!";
            }

            //Gender Validation 
            $validGenders = array("Male", "Female", "Other");
            if (!in_array($gender, $validGenders)) 
            {
                $_SESSION["gender_err"] = "Invalid gender value!";
            }
            

            // Age Validation
            if ($age < 0 || $age >= 75) 
            {
                $_SESSION["age_err"] = "Invalid age value!";
            }
            

            // CGPA Validation 
            if ($cgpa < 1 || $cgpa >= 4) 
            {
                $_SESSION["cgpa_err"] = "Invalid CGPA value! CGPA must be a numeric value between 1 and 4.";
            }
            
            // Expected Salary Validation 
            if ($salary < 0 || $salary > 1000000) 
            {
                $_SESSION["salary_err"] = "Invalid Expected Salary!";
            }
            
            // Check if Work Experience is a valid numeric value and non-negative
            if ($experience < 0 || $experience >= 35) 
            {
                $_SESSION["experience_err"] = "Invalid Work Experience!";
            }
            
            // Web site validation
            $validChar2 = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-._~:/?#[]@!$&\'()*+,;=';
            for ($i = 0; $i < strlen($website); $i++) 
            {
                if (strpos($validChar2, $website[$i]) === false) 
                {
                    $_SESSION["website_err"] = "Invalid Website URL!";
                }
            }
            
            // About yoursellf validation 
            if ($aboutMe >= 5000) 
            {
                $_SESSION["aboutMe_err"] = "About yourselt must be contain 10 characters & maximum 5000 characters.";
            }

            // Phone Number validation
            if (strlen($phone) !== 11) 
            {
                $_SESSION["phone_err"] = "Phone number Only contain digits and it should be 11 digits long.";
            }

            // Address validation
            $validChar3 = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 /,.-';
            for ($i = 0; $i < strlen($address); $i++) 
            {
                $char = $address[$i];
                if (strpos($validChar3, $char) === false) 
                {
                    $_SESSION["address_err"] = "Address can only contain letters, numbers, spaces, slash, commas, dots, or dashes.";
        
                }
            }

            // City validation
            $validChar4 = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ,';
            for ($i = 0; $i < strlen($city); $i++) 
            {
                $char = $city[$i];
                if (strpos($validChar4, $char) === false) 
                {
                    $_SESSION["city_err"] = "City can only contain letters, spaces or commas.";
                    break;
                }
            }

        } 



        //=====================================================================================//

        if( !isset($_SESSION["name_err"]) && !isset($_SESSION["profTitle_err"]) 
        && !isset($_SESSION["gender_err"]) && !isset($_SESSION["age_err"]) && !isset($_SESSION["cgpa_err"]) 
        && !isset($_SESSION["salary_err"]) && !isset($_SESSION["experience_err"]) 
        && !isset($_SESSION["website_err"]) && !isset($_SESSION["aboutMe_err"]) 
        && !isset($_SESSION["phone_err"]) && !isset($_SESSION["email_err"])
        && !isset($_SESSION["address_err"]) && !isset($_SESSION["city_err"]) 
        && !isset($_SESSION["google_err"]) && !isset($_SESSION["twitter_err"]) 
        && !isset($_SESSION["facebook_err"]) && !isset($_SESSION["linkedin_err"]) )
        {


            $updateResult = myProfileDB($userID, $name, $profTitle, $gender, $age, $cgpa, $salary, $experience, 
            $website, $aboutMe, $phone, $email, $address, $city, $google, $twitter, $facebook, $linkedin);

            if ($updateResult) 
            {
                //$_SESSION['yess']="Updated successfully..!";
                header("location: ../../view/seeker/myProfile.php");
            } 
            else 
            {
                header("location: ../../view/seeker/myProfile.php");
            }

        }
        else
        {
            header("location: ../../view/seeker/myProfile.php");
        }

    }

?>