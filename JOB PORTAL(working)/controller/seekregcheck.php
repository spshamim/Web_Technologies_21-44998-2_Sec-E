<?php

    require_once "../model/userModel.php";
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $sferr=$suerr=$sperr=$scperr=$semerr="";

        // Name validation
        if(!empty($_POST['fname'])){
            $name=$_POST['fname'];
        }
        else{
            $sferr="No name given!";
        }

        // Username validation
        if(!empty($_POST['uname'])){ //user has given something
            $username=$_POST['uname'];
            $uNameInDB = checkuname($username);

            if ($uNameInDB == $username) {
                $suerr = "UserName already exists!";
                $username="";
            } 
            else {
                $username=$_POST['uname'];
            }
        }
        else{ // user not given anything
            $suerr="No username given!";
        }

        //Email validation
        if(!empty($_POST['email'])){
            $email=$_POST['email'];
            $emailInDB = checkumail($email);

            if ($emailInDB == $email) {
                $semerr = "Email already exists!";
                $email="";
            } 
            else {
                $email=$_POST['email'];
            }
        }
        else {
            $semerr="No email given!";
        }

        //Password validation
        if(!empty($_POST['pass'])){
            $password=$_POST['pass'];
            if(!empty($_POST['cpass'])){
                $confirmPassword=$_POST['cpass'];
                if($password==$confirmPassword){
                    $finalpass=$_POST['pass'];
                }
                else{
                    $scperr="Passwords do not match!";
                }
            }
            else {
                $scperr="Re enter confirm password!";
            }
        }
        else {
            $sperr="No password given!";
        }

        /* ====================================================================================== */

        if ($sferr=="" && $suerr=="" && $sperr=="" && $scperr=="" && $semerr=="") {

            $status = seekreg($name,$username,$email,$finalpass);
    
            if ($status) {
                header('location:../view/login.php');
            }else{
                header("location:../view/seekreg.php");
            }
        }
        else{
            // Store error messages in session variables
            $_SESSION['sferr'] = $sferr;
            $_SESSION['suerr'] = $suerr;
            $_SESSION['scperr'] = $scperr;
            $_SESSION['sperr'] = $sperr;
            $_SESSION['semerr'] = $semerr;

            // Store form data in session variables
            $_SESSION['sname'] = $name;
            $_SESSION['suname'] = $username;
            $_SESSION['semail'] = $email;

            header('location:../view/seekreg.php');  
        } 
    }
?>