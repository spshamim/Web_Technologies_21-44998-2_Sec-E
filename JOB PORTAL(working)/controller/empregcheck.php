<?php

    include_once("../model/userModel.php");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $licerr=$weberr=$locerr=$cerr=$terr=$emerr=$nerr=$uerr=$cperr=$perr="";

        // Name validation
        if(!empty($_POST['name'])){
            $name=$_POST['name'];
        }
        else{
            $nerr="No name given!";
        }

        // Username validation
        if(!empty($_POST['uname'])){ //user has given something
            $username=$_POST['uname'];
            $uNameInDB = checkuname($username);

            if ($uNameInDB == $username) {
                $uerr = "UserName already exists!";
                //$username="";
            } 
            else {
                $username=$_POST['uname'];
            }
        }
        else{ // user not given anything
            $uerr="No username given!";
        }

        //Email validation
        if(!empty($_POST['email'])){
            $email=$_POST['email'];
            $emailInDB = checkumail($email);

            if ($emailInDB == $email) {
                $emerr = "Email already exists!";
                $email="";
            } 
            else {
                $email=$_POST['email'];
            }
        }
        else {
            $emerr="No email given!";
        }

        //Type validation
        if (!empty($_POST["type"])) {
            $type = $_POST["type"];
        } else {
            $terr = "Please select a type.";
        }

        //Contact validation
        if(!empty($_POST['contact'])){
            $contact=$_POST['contact'];
        }
        else {
            $cerr="Contact number not given!";
        }

        //Location validation
        if(!empty($_POST['loc'])){
            $location=$_POST['loc'];
        }
        else {
            $locerr="No location given!";
        }

        //Website validation
        if(!empty($_POST['web'])){
            $website=$_POST['web'];
        }
        else {
            $weberr="Website missing!";
        }

        //License validation
        if(!empty($_POST['lic'])){
            $license=$_POST['lic'];
        }
        else {
            $licerr="License missing!";
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
                    $cperr="Passwords do not match!";
                }
            }
            else {
                $cperr="Re enter confirm password!";
            }
        }
        else {
            $perr="No password given!";
        }

        /* ====================================================================================== */

        if ($licerr=="" && $weberr=="" && $locerr=="" && $cerr=="" && $terr=="" && $emerr=="" && $nerr=="" && $uerr=="" && $cperr=="" && $perr=="") {

            $form_data = array();
    
            // Store the data in the associative array
            $form_data["name"] = $name;
            $form_data["username"] = $username;
            $form_data["password"] = $finalpass;
            $form_data["email"] = $email;
            $form_data["type"] = $type;
            $form_data["contact"] = $contact;
            $form_data["location"] = $location;
            $form_data["website"] = $website;
            $form_data["license"] = $license;
    
            $status = empsignup($form_data);
    
            if ($status) {
                header('location:../view/login.php');
            }else{
                header("location:../view/empreg.php");
            }
        }
        else{
            // Store error messages in session variables
            $_SESSION['perr'] = $perr;
            $_SESSION['uerr'] = $uerr;
            $_SESSION['cperr'] = $cperr;
            $_SESSION['nerr'] = $nerr;
            $_SESSION['emerr'] = $emerr;
            $_SESSION['terr'] = $terr;
            $_SESSION['cerr'] = $cerr;
            $_SESSION['locerr'] = $locerr;
            $_SESSION['weberr'] = $weberr;
            $_SESSION['licerr'] = $licerr;

            // Store form data in session variables
            $_SESSION['ename'] = $name;
            $_SESSION['euname'] = $username;
            $_SESSION['eemail'] = $email;
            $_SESSION['econtact'] = $contact;
            $_SESSION['elocation'] = $location;
            $_SESSION['ewebsite'] = $website;
            $_SESSION['elicense'] = $license;

            header('location:../view/empreg.php');  
        } 
    }
?>
