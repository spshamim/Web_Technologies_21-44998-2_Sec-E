<?php 
    if($_GET['msg']=="ra"){

        setcookie("aid","",time()-10,"/");

        header('location: ../view/login.php');

    }elseif($_GET['msg']=="re"){
        
        setcookie("eid","",time()-10,"/");

        header('location: ../view/login.php');
    }
?>