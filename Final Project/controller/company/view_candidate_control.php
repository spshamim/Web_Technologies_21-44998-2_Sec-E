<?php
    require_once "../../model/userModel.php";
    $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
    $id = openssl_decrypt($_COOKIE['cid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

    $status = retrieveCandidate($id);
    if(!empty($status)){
        echo json_encode($status);
    }else{
        echo "failed";
    }

?>