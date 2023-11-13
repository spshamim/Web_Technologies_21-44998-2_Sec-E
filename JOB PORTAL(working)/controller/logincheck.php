<?php

    require_once "../model/userModel.php";
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // username validation
        if (empty($_POST['uname'])) {
            $_SESSION['luerr'] = "No username given!";
        } else {
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
                $_SESSION['luerr'] = "User Name must contain at least 6 characters..!";
            }
        
            if (!forUname($value2)) {
                $_SESSION['luerr'] = "User Name has not allowed characters..!";
            }
        }   


        //Password validation
        if(empty($_POST['pass'])){
            $_SESSION['lperr']="No password given !";
        }
        if(!isset($_SESSION['lperr'])){
            $value8=$_POST['pass'];

            function containsAtLeastOneSpecialChar($name) {
                for ($i = 0; $i < strlen($name); $i++) {
                    $char = $name[$i];
            
                    if ($char === '@' || $char === '#' || $char === '$' || $char === '%') {
                        return true;
                    }
                }
                return false;
            }

            $passinDB = checkPassword($_POST['uname']);

            if($passinDB!=$value8){
                $_SESSION['lperr']="Password not matched with database...!";
            }      

            if(strlen($_POST['pass'])<8){
                $_SESSION['lperr']="Length must be at least 8 characters long...!";
            }

            if (!containsAtLeastOneSpecialChar($value8)) {
                $_SESSION['lperr'] = "Password must contain at least one @ or # or % or $ characters..!";
            }
        }

        if(!isset($_SESSION['luerr']) && !isset($_SESSION['lperr'])){ // if no error
            
            $uname = $_POST['uname'];
            $pass = $_POST['pass'];
            
            $result = login($uname, $pass);

            if ($result['success']) {
                if($result['usertype']=="admin"){

                    setcookie("aid",$result['id'],time()+1200,"/");

                    /* ================ Encrypting the cookie value ================

                    $encryptionKey = "kieuTTQQpl)(8!nn"; // // Encryption key (secret) , change to a strong, random key

                    // Encrypt the data
                    $encryptedId = openssl_encrypt($result['id'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
                    $encryptedEmail = openssl_encrypt($result['email'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
                    $encryptedUsertype = openssl_encrypt($result['usertype'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
                    $encryptedUsername = openssl_encrypt($result['username'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

                    // Set the cookies with HttpOnly, Secure, and SameSite flags
                    setcookie("aid", $encryptedId, time() + 120, "/", "", true, true);
                    setcookie("aemail", $encryptedEmail, time() + 120, "/", "", true, true);
                    setcookie("ausertype", $encryptedUsertype, time() + 120, "/", "", true, true);
                    setcookie("ausername", $encryptedUsername, time() + 120, "/", "", true, true);
                    
                    ================================================================ */

                    /* ============ to use cookie value for further use ============

                    To use cookie value after login, need to decrypt then use.
                    Decryption process =>
                    $encryptionKey = "kieuTTQQpl)(8!nn";
                    $variable = openssl_decrypt($_COOKIE['aid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

                    ================================================================= */
                    
                    header("location:../view/admin.php");
                }

                elseif($result['usertype']=="seeker"){

                    setcookie("sid",$result['id'],time()+1200,"/");

                    header("location:../view/seeker_after_login/seeker_profile.php");
                }
                
                elseif($result['usertype']=="company" && $result['approval']==1){
                    
                    setcookie("cid",$result['id'],time()+1200,"/");

                    header("location:../view/company_dash.php");
                }
                elseif($result['usertype']=="company" && $result['approval']==0){
                    $_SESSION["queue"] = "Company is in approval queue..!";
                    header("location:../view/login.php");
                }
                } else{ // database error occurred
                    $_SESSION["unotexist"] = "Confidential doesn't exist! Please do registration first..!";
                    header("location:../view/login.php");
                }
            }
            else{ // validation error found
                $_SESSION['ntoshow'] = $_POST['uname'];
                header("location:../view/login.php");
            }
    }
?>