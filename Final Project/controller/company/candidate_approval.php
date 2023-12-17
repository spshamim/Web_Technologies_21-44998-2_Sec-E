<?php
    require_once "../../model/userModel.php";
    $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
    $comid = openssl_decrypt($_COOKIE['cid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

    if(isset($_POST['id'])){
        $jobid = $_POST['id'];

        $status = approveCandidate($jobid,$comid);
        if($status){
            echo "ss";
        }else{
            echo "ff";
        }
    }
?>