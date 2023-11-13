<?php

session_start();
require_once "../model/userModel.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_COOKIE['sid'];

    $curr_pass = $_POST['curr_pass'];
    $new_pass = $_POST['new_pass'];
    $conf_pass = $_POST['conf_pass'];

    if($new_pass != $conf_pass){
        $_SESSION['nandconf']="new password and confirm password must be same ..!";
        header("location: ../view/seeker_after_login/myChangePassword.php");
    }else{
        $updateResult = changePassword($curr_pass, $new_pass, $userID);
        if ($updateResult) {
            $_SESSION['yessss']="Updated successfully..!";
            header("location: ../view/seeker_after_login/myChangePassword.php");
        } else {
            $_SESSION['curnotmatch']="Current password doesn't match ..!";
            header("location: ../view/seeker_after_login/myChangePassword.php");
        }
    }
}

?>










?>