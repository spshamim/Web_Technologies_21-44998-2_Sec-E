<?php

    require_once("../model/userModel.php");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Name validation
        if (empty($_POST['name'])) {
            $_SESSION['name_error'] = "No name given!";
        } else {
            $value1 = $_POST['name'];
            $words = explode(' ', $value1);
            $firstChar = $value1[0];

            function forName($name) {
                for ($i = 0; $i < strlen($name); $i++) {
                    $char = $name[$i];
                    // Skip spaces
                    if ($char === ' ') {
                        continue;
                    }
                    if (!(($char >= 'A' && $char <= 'Z') || ($char >= 'a' && $char <= 'z') || $char === '.' || $char === '-')) {
                        return false;
                    }
                }
                return true;
            }

            if (count($words) < 2) {
                $_SESSION['name_error'] = "Name must contain at least two words..!";
            }
            if (!(($firstChar >= 'A' && $firstChar <= 'Z') || ($firstChar >= 'a' && $firstChar <= 'z'))) {
                $_SESSION['name_error'] = "Name must start with a letter..!";
            }
            if (!forName($value1)) {
                $_SESSION['name_error'] = "Name has not allowed characters..!";
            }
        }       

        // Username validation
        if (empty($_POST['uname'])) {
            $_SESSION['uname_error'] = "No username given!";
        } else {
            $value2 = $_POST['uname'];
            $uNameInDB = checkuname($value2);

            function forUname($name) {
                for ($i = 0; $i < strlen($name); $i++) {
                    $char = $name[$i];
                    if (!(($char >= 'A' && $char <= 'Z') || ($char >= 'a' && $char <= 'z') || $char === '.' || $char === '_' || $char === ' ' || ($char >= '0' && $char <= '9'))) {
                        return false;
                    }
                }
                return true;
            }
        
            if ($uNameInDB == $value2) {
                $_SESSION['uname_error'] = "UserName already exists!";
            } 
        
            if (strlen($value2) < 6) {
                $_SESSION['uname_error'] = "UserName must contain at least 6 characters..!";
            }
        
            if (!forUname($value2)) {
                $_SESSION['uname_error'] = "User Name has not allowed characters..!";
            }
        }   

        //Email validation
        if(empty($_POST['email'])){
            $_SESSION['email_error'] = "Email can't be empty..!";
        }else{
            $value3=$_POST['email'];
            $emailInDB = checkumail($value3);
        
            if ($emailInDB == $value3) {
                $_SESSION['email_error'] = "Email already exists!";
            }
        
            function checkatsign($name) {
                for ($i = 0; $i<strlen($name); $i++) {
                    $char = $name[$i];
                    if (!($char === '@')) {
                        return false;
                    }
                }
                return true;
            }
        
            if(checkatsign($value3)){
                $_SESSION['email_error']="Email format is not valid..!";
            }
        }

        //Type validation
        if (empty($_POST["type"])) {
            $_SESSION['type_error'] = "Please select a type..!";
        }

        //Contact validation
        if(empty($_POST['contact'])){
            $_SESSION['contact_error'] = "Contact can't be empty..!";
        }
        else {
            $value4=$_POST['contact'];
            if(strlen($value4)<11){
                $_SESSION['contact_error']="Contact number not in length!";
            }
        }

        //Location validation
        if(empty($_POST['loc'])){
            $_SESSION['location_error'] ="No location given!";
        }

        //Website validation
        if(empty($_POST['web'])){
            $_SESSION['website_error'] ="Website missing!";
        }

        //License validation
        if(empty($_POST['lic'])){
            $_SESSION['license_error'] ="License missing!";
        }

        //Password validation
        if(empty($_POST['pass'])||empty($_POST['cpass'])){
            $_SESSION['pass_error']="No password given !";
        }
        if(!isset($_SESSION['pass_error'])){
            $value8=$_POST['pass'];
            $value9=$_POST['cpass'];

            function containsAtLeastOneSpecialChar($name) {
                for ($i = 0; $i < strlen($name); $i++) {
                    $char = $name[$i];
            
                    if ($char === '@' || $char === '#' || $char === '$' || $char === '%') {
                        return true;
                    }
                }
                return false;
            }

            if($value8!=$value9){
                $_SESSION['pass_error']="Passwords do not match!";
            }
            if((strlen($value8)<8)||(strlen($value9)<8)){
                $_SESSION['pass_error']="Length must be at least 8 characters long...!";
            }

            if (!containsAtLeastOneSpecialChar($value8) || !containsAtLeastOneSpecialChar($value9)) {
                $_SESSION['pass_error'] = "Password must contain at least one @ or # or % or $ characters..!";
            }
        }

        /* ====================================================================================== */

        if(!isset($_SESSION['name_error'])&&!isset($_SESSION['uname_error'])&&!isset($_SESSION['email_error'])&&!isset($_SESSION['type_error'])
        &&!isset($_SESSION['contact_error'])&&!isset($_SESSION['location_error'])&&!isset($_SESSION['website_error'])
        &&!isset($_SESSION['license_error'])&&!isset($_SESSION['pass_error'])){
            
            $form_data = array(
    
                    "name" => $_POST['name'],
                    "username" => $_POST['uname'],
                    "password" => $_POST['pass'],
                    "email" => $_POST['email'],
                    "type" => $_POST['type'],
                    "contact" => $_POST['contact'],
                    "location" => $_POST['loc'],
                    "website" => $_POST['web'],
                    "license" => $_POST['lic']
            );
        
            $status = empsignup($form_data);
        
            if ($status) {
                header('location:../view/login.php');
            }else{
                header("location:../view/empreg.php");
            }

        }else{
            
            // Store form data in session variables if at least one error found
            $_SESSION['ename'] = $_POST['name'];
            $_SESSION['euname'] = $_POST['uname'];
            $_SESSION['eemail'] = $_POST['email'];
            $_SESSION['econtact'] = $_POST['contact'];
            $_SESSION['elocation'] = $_POST['loc'];
            $_SESSION['ewebsite'] = $_POST['web'];
            $_SESSION['elicense'] = $_POST['lic'];

            header("location:../view/empreg.php");
        }    
    }
?>
