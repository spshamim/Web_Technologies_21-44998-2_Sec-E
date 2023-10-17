<?php

session_start();

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if($username == null || $password == null){
    echo "Field Required!";
}elseif($username == $_SESSION['user']['username'] && $password == $_SESSION['user']['password']){
    $_SESSION['flag']='true';
    header("location:../view/log_dash.php");
}else{
    echo "Invalid login";
}


?>