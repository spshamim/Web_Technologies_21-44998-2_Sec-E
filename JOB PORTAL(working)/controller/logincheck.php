<?php

    include_once "../model/userModel.php";
    session_start();

    $uname=$pass=$luerr=$lperr=$queue="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // username validation
        if (empty($_POST['uname'])) {
            $luerr = "Username cannot be empty!";
        }else {
            $uname = $_POST['uname'];
        }
        
        // password validation
        if (empty($_POST['pass'])) {
            $lperr = "Password cannot be empty!";
        }else {
            $pass = $_POST['pass'];
        }
        
        if($luerr==""&&$lperr==""){ // if no error
            
            $result = login($uname, $pass);

            if ($result['success']) {
                if($result['usertype']=="admin"){

                    $_SESSION['aid'] = $result['id'];
                    $_SESSION['aemail'] = $result['email'];
                    $_SESSION['ausertype'] = $result['usertype'];
                    $_SESSION['ausername'] = $result['username'];

                    /* ================ Set up cookie ================
                    setcookie("aid",$result['id'],time()+120,"/");
                    setcookie("aemail",$result['email'],time()+120,"/");
                    setcookie("ausertype",$result['usertype'],time()+120,"/");
                    setcookie("ausername",$result['username'],time()+120,"/");
                    
                    =============================================== */

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
                    
                    $_SESSION['sid'] = $result['id'];
                    $_SESSION['semail'] = $result['email'];
                    $_SESSION['susertype'] = $result['usertype'];
                    $_SESSION['susername'] = $result['username'];

                    /* ================ Set up cookie ================

                    setcookie("sid",$result['id'],time()+120,"/");
                    setcookie("semail",$result['email'],time()+120,"/");
                    setcookie("susertype",$result['usertype'],time()+120,"/");
                    setcookie("susername",$result['username'],time()+120,"/");

                    =============================================== */

                    /* ================ Encrypting the cookie value ================

                    $encryptionKey = "kieuTTQQpl)(8!nn"; // // Encryption key (secret) , change to a strong, random key

                    // Encrypt the data
                    $encryptedId = openssl_encrypt($result['id'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
                    $encryptedEmail = openssl_encrypt($result['email'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
                    $encryptedUsertype = openssl_encrypt($result['usertype'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
                    $encryptedUsername = openssl_encrypt($result['username'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

                    // Set the cookies with HttpOnly, Secure, and SameSite flags
                    setcookie("sid", $encryptedId, time() + 120, "/", "", true, true);
                    setcookie("semail", $encryptedEmail, time() + 120, "/", "", true, true);
                    setcookie("susertype", $encryptedUsertype, time() + 120, "/", "", true, true);
                    setcookie("susername", $encryptedUsername, time() + 120, "/", "", true, true);
                    
                    ================================================================ */

                    /* ============ to use cookie value for further use ============

                    To use cookie value after login, need to decrypt then use.
                    Decryption process =>
                    $encryptionKey = "kieuTTQQpl)(8!nn";
                    $variable = openssl_decrypt($_COOKIE['sid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

                    ================================================================= */

                    header("location:../view/seeker_profile.php");
                }
                
                elseif($result['usertype']=="company" && $result['approval']==1){
                    
                    $_SESSION['cid'] = $result['id'];
                    $_SESSION['cemail'] = $result['email'];
                    $_SESSION['cusertype'] = $result['usertype'];
                    $_SESSION['cusername'] = $result['username'];

                    /* ================ Set up cookie ================

                    setcookie("cid",$result['id'],time()+120,"/");
                    setcookie("cemail",$result['email'],time()+120,"/");
                    setcookie("cusertype",$result['usertype'],time()+120,"/");
                    setcookie("cusername",$result['username'],time()+120,"/");

                    =============================================== */

                    /* ================ Encrypting the cookie value ================

                    $encryptionKey = "kieuTTQQpl)(8!nn"; // // Encryption key (secret) , change to a strong, random key

                    // Encrypt the data
                    $encryptedId = openssl_encrypt($result['id'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
                    $encryptedEmail = openssl_encrypt($result['email'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
                    $encryptedUsertype = openssl_encrypt($result['usertype'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
                    $encryptedUsername = openssl_encrypt($result['username'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

                    // Set the cookies with HttpOnly, Secure, and SameSite flags
                    setcookie("cid", $encryptedId, time() + 120, "/", "", true, true);
                    setcookie("cemail", $encryptedEmail, time() + 120, "/", "", true, true);
                    setcookie("cusertype", $encryptedUsertype, time() + 120, "/", "", true, true);
                    setcookie("cusername", $encryptedUsername, time() + 120, "/", "", true, true);
                    
                    ================================================================ */

                    /* ============ to use cookie value for further use ============

                    To use cookie value after login, need to decrypt then use.
                    Decryption process =>
                    $encryptionKey = "kieuTTQQpl)(8!nn";
                    $variable = openssl_decrypt($_COOKIE['cid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

                    ================================================================= */

                    header("location:../view/company_dash.php");
                }
                elseif($result['usertype']=="company" && $result['approval']==0){
                    $queue = "Company is in approval queue..!";
                    header("location:../view/login.php");
                }
            } else{ // database error occurred
                $unotexist = "Confidential doesn't exist! Please do registration first..!";
                header("location:../view/login.php");
            }
        }
        else{ // validation error found
            header("location:../view/login.php");
        }

        $_SESSION['luerr']=$luerr;
        $_SESSION['lperr']=$lperr;
        $_SESSION["queue"]=$queue;
        $_SESSION["unotexist"]=$unotexist;
    }
?>