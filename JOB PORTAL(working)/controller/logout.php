<?php 
    if($_GET['msg']=="ra"){

        setcookie("aid","",time()-10,"/");

        header('location: ../view/login.php');

    } elseif($_GET['msg']=="rs"){

        setcookie("sid","",time()-10,"/");

        header('location: ../view/login.php');

    } elseif($_GET['msg']=="rc"){
        
        setcookie("cid","",time()-10,"/");

        header('location: ../view/login.php');
    }
?>