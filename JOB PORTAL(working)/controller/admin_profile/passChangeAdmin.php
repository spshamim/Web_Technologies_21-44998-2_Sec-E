<?php

require_once("../../model/userModel.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Password validation
    $value1=$_POST['curr_pass'];
    $value2=$_POST['new_pass'];
    $value3=$_POST['conf_pass'];

    if(empty($value1)||empty($value2)||empty($value3)){
        $_SESSION['p_error']="No password given !";
    }
    if(!isset($_SESSION['p_error'])){
        function containsAtLeastOneSpecialChar($name) {
            for ($i = 0; $i < strlen($name); $i++) {
                $char = $name[$i];
        
                if ($char === '@' || $char === '#' || $char === '$' || $char === '%') {
                    return true;
                }
            }
            return false;
        }

        $adminID = $_COOKIE['aid'];
        $rtpass = retrievePassforAdmin($adminID);

        if($rtpass==$value2){
            $_SESSION['p_error']="Current password and New Password can't be same!";
        }

        if($value2!=$value3){
            $_SESSION['p_error']="New given Passwords do not match!";
        }
        
        if((strlen($value2)<8)||(strlen($value3)<8)){
            $_SESSION['p_error']="Length must be at least 8 characters long...!";
        }

        if (!containsAtLeastOneSpecialChar($value2) || !containsAtLeastOneSpecialChar($value3)) {
            $_SESSION['p_error'] = "Password must contain at least one @ or # or % or $ characters..!";
        }
    }

    if(!isset($_SESSION['p_error'])){
        $finalpass = $_POST['new_pass'];
        $curr_pass = $_POST['curr_pass'];
        $status = updatePassforAdmin($adminID,$finalpass,$curr_pass);

        if($status){
            $_SESSION['done1'] = "Password changed successfully...!";
            header("location: ../../view/admin_profile/passChange.php");
        }else{// database error
            $_SESSION['notdone2'] = "Current Password not Matched...!";
            header("location: ../../view/admin_profile/passChange.php");
        }
    }else{
        header("location: ../../view/admin_profile/passChange.php");
    }
}

?>