<?php
    require_once("../../model/userModel.php");
    session_start();
    $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
    $sID = openssl_decrypt($_COOKIE['sid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

    $jsonData = $_POST['data'];
    $data = json_decode($jsonData, true); // True = For associative array, if not given then it will return an object

    $compName=$data['compName'];
    $salary=$data['salary'];
    $title=$data['title'];
    $category=$data['category'];
    $type=$data['type'];
    $seekerID=$sID;

    $status = applySeekerJob($compName,$salary,$title,$category,$type,$seekerID);
    if($status){
        echo "s1";
    }else{
        echo "e1";
    }

?>