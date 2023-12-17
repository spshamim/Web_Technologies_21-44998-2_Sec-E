<?php

require_once("../model/userModel.php");
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    //Email validation
    if(empty($_POST['email'])){
        $_SESSION['errrrr'] = "Email can't be empty..!";
    }

    if(!isset($_SESSION['errrrr'])){
        $email = $_POST['email'];
        $rt = forgotPassword($email);
        if($rt==false){
            $_SESSION['errrrr2']="Email not found in database..!";
            $_SESSION['emtoshow']=$_POST['email'];
            header("location: ../view/forgot_pass.php");
        }else{
            $_SESSION['rt']=$rt;
            header("location: ../view/forgot_pass.php");
        }
    }else{
        header("location: ../view/forgot_pass.php");
    }
}

?>