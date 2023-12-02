<?php
    require_once('../model/userModel.php');
    session_start();

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $result = login($uname,$pass);

    if ($result['success'] && $result['type']=="admin") {
        setcookie("aid",$result['id'],time()+3600,"/");
        header("location: ../view/admin.php");
    }elseif($result['success'] && $result['type']=="employee"){
        setcookie("eid",$result['id'],time()+3600,"/");
        header("location: ../view/empdash.php");
    }elseif(!$result['success']){
        $_SESSION['e1']="database error occured";
    }
    
?>