<?php

    include_once("../model/userModel.php");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $auerr=$aperr=$acperr=$aemerr="";

        // Username validation
        if(!empty($_POST['uname'])){ //user has given something
            $username=$_POST['uname'];
            $uNameInDB = checkuname($username);

            if ($uNameInDB == $username) {
                $auerr = "UserName already exists!";
                //$username="";
            } 
            else {
                $username=$_POST['uname'];
            }
        }
        else{ // user not given anything
            $auerr="No username given!";
        }

        //Email validation
        if(!empty($_POST['email'])){
            $email=$_POST['email'];
            $emailInDB = checkumail($email);

            if ($emailInDB == $email) {
                $aemerr = "Email already exists!";
                $email="";
            } 
            else {
                $email=$_POST['email'];
            }
        }
        else {
            $aemerr="No email given!";
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
                    $acperr="Passwords do not match!";
                }
            }
            else {
                $acperr="Re enter confirm password!";
            }
        }
        else {
            $aperr="No password given!";
        }

        /* ====================================================================================== */

        if ($auerr=="" && $aperr=="" && $acpnerr=="" && $aemerr=="") {

            $status = adminsignup($username,$finalpass,$email);
    
            if ($status) {
                header('location:../view/login.php');
            }else{
                header("location:../view/admin_reg.php");
            }
        }
        else{
            // Store error messages in session variables
            $_SESSION['auerr'] = $auerr;
            $_SESSION['aperr'] = $aperr;
            $_SESSION['acpnerr'] = $acpnerr;
            $_SESSION['aemerr'] = $aemerr;

            // Store form data in session variables
            $_SESSION['auname'] = $username;
            $_SESSION['aemail'] = $email;

            header('location:../view/admin_reg.php');  
        } 
    }
?>