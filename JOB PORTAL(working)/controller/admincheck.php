<?php

    require_once("../model/userModel.php");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Username validation
        if (empty($_POST['uname'])) {
            $_SESSION['auerr'] = "No username given!";
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
                $_SESSION['auerr'] = "UserName already exists!";
            } 
        
            if (strlen($value2) < 6) {
                $_SESSION['auerr'] = "UserName must contain at least 6 characters..!";
            }
        
            if (!forUname($value2)) {
                $_SESSION['auerr'] = "User Name has not allowed characters..!";
            }
        }   

        //Email validation
        if(empty($_POST['email'])){
            $_SESSION['aemerr'] = "Email can't be empty..!";
        }else{
            $value3=$_POST['email'];
            $emailInDB = checkumail($value3);
        
            if ($emailInDB == $value3) {
                $_SESSION['aemerr'] = "Email already exists!";
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
                $_SESSION['aemerr']="Email format is not valid..!";
            }
        }

        //Password validation
        if(empty($_POST['pass'])||empty($_POST['cpass'])){
            $_SESSION['aperr']="No password given !";
        }
        if(!isset($_SESSION['aperr'])){
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
                $_SESSION['aperr']="Passwords do not match!";
            }
            if((strlen($_POST['pass'])<8)||(strlen($_POST['pass'])<8)){
                $_SESSION['aperr']="Length must be at least 8 characters long...!";
            }

            if (!containsAtLeastOneSpecialChar($value8) || !containsAtLeastOneSpecialChar($value9)) {
                $_SESSION['aperr'] = "Password must contain at least one @ or # or % or $ characters..!";
            }
        }

        /* ====================================================================================== */

        if (!isset($_SESSION['aperr']) && !isset($_SESSION['aemerr']) && !isset($_SESSION['auerr'])) {

            $username = $_POST['uname'];
            $finalpass = $_POST['pass'];
            $email = $_POST['email'];

            $status = adminsignup($username,$finalpass,$email);
    
            if ($status) {
                header('location:../view/login.php');
            }else{
                header("location:../view/admin_reg.php");
            }
        }
        else{
            // if error occurred Store some form data in session variables to retrieve in main page 
            $_SESSION['auname'] = $_POST['uname'];
            $_SESSION['aemail'] = $_POST['email'];

            header('location:../view/admin_reg.php');  
        } 
    }
?>