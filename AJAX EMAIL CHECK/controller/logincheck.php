<?php
    require_once('../model/userModel.php');
    session_start();
    
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $result = login($email,$pass);

    if ($result['success']) {
        setcookie("pid",$result['id'],time()+3600,"/");
        header("location: ../view/home.php");
    }else{
        $_SESSION['error'] = "User does not exist, do registration first...!";
        header("location: ../view/personreg.php");
    }
    
?>