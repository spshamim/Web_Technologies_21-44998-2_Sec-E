<?php
    session_start();
    $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
    $seekerID = openssl_decrypt($_COOKIE['sid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
    echo $seekerID;
?>