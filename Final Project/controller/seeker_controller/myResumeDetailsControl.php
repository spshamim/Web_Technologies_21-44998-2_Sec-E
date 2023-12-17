<?php

    include_once("../../model/userModel.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] =="POST")
    {
        $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
        $userID = openssl_decrypt($_COOKIE['sid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

        $info = getAllaboutMeDB($userID);
        if(!empty($info))
        {
            echo json_encode($info);
        }
        else 
        {
            echo "failed";
        } 
        
    }

?>