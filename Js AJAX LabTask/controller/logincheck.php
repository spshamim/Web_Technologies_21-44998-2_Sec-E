<?php
    require_once('../model/userModel.php');

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $result = login($uname,$pass);

    if ($result['success'] && $result['type']=="admin") {
        setcookie("aid",$result['id'],time()+1200,"/");
        echo "success-admin";
    }elseif($result['success'] && $result['type']=="employee"){
        setcookie("eid",$result['id'],time()+1200,"/");
        echo "success-employee";
    }elseif(!$result['success']){
        echo "error-database";
    }
    
?>