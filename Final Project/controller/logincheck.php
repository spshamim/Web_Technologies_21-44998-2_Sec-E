<?php

    require_once "../model/userModel.php";
    session_start();
 
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    
    $result = login($uname, $pass);
    $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)

    if ($result['success']) {
        if($result['usertype']=="admin"){
            $encryptedId = openssl_encrypt($result['id'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

            setcookie("aid", $encryptedId, time()+3600,"/");
            header("location:../view/admin.php");
        }

        elseif($result['usertype']=="seeker"){
            $encryptedId1 = openssl_encrypt($result['id'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

            setcookie("sid",$encryptedId1,time()+3600,"/");
            header("location:../view/seeker/seeker_profile.php");
        }
        
        elseif($result['usertype']=="company" && $result['approval']==1){
            $encryptedId3 = openssl_encrypt($result['id'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
            $encryptedId2 = openssl_encrypt($result['compname'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

            setcookie("cid",$encryptedId3,time()+3600,"/");
            setcookie("cname",$encryptedId2,time()+3600,"/");
            header("location:../view/comp_after_login/company_dash.php");
        }
        elseif($result['usertype']=="company" && $result['approval']==0){
            $_SESSION["queue"] = "Company is in approval queue..!";
            header("location:../view/login.php");
        }
    }
    else{
            $_SESSION["unotexist"] = "Confidential doesn't exist! Please do registration first..!";
            header("location:../view/login.php");
        }

?>