<?php

require_once("../../model/userModel.php");
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    // Username validation
    if (empty($_POST['uname'])) {
        $_SESSION['unerr'] = "No username given!";
    } else{
        $value2 = $_POST['uname'];

        function forUname($name) {
            for ($i = 0; $i < strlen($name); $i++) {
                $char = $name[$i];
                if (!(($char >= 'A' && $char <= 'Z') || ($char >= 'a' && $char <= 'z') || $char === '.' || $char === '_' || $char === ' ' || ($char >= '0' && $char <= '9'))) {
                    return false;
                }
            }
            return true;
        }
    
        if (strlen($value2) < 6) {
            $_SESSION['unerr'] = "UserName must contain at least 6 characters..!";
        }
    
        if (!forUname($value2)) {
            $_SESSION['unerr'] = "User Name has not allowed characters..!";
        }
    }   

    //Email validation
    if(empty($_POST['email'])){
        $_SESSION['emerr'] = "Email can't be empty..!";
    }else{
        $value3=$_POST['email'];
    
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
            $_SESSION['emerr']="Email format is not valid..!";
        }
    }

    if(!isset($_SESSION['unerr']) && !isset($_SESSION['emerr'])){
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
        $adminID = openssl_decrypt($_COOKIE['aid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

        $status = updateAdminProfile($uname,$email,$adminID);
        if($status){
            $_SESSION['su1'] = "Updated successfully..!";
            header("location: ../../view/admin_profile/profile_info.php");
        }else{// database error
            $_SESSION['su2'] = "Not updated..!";
            header("location: ../../view/admin_profile/profile_info.php");
        }
    }else{
        header("location: ../../view/admin_profile/profile_info.php");
    }
}

?>