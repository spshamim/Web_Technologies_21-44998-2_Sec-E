<?php 
    session_start();
    if($_GET['msg']=="ra"){
        unset($_SESSION['aid'],$_SESSION['aemail'],$_SESSION['ausertype'],$_SESSION['ausername']);

        /* ==== if cookie used ====

        setcookie("aid","",time()-10,"/");
        setcookie("aemail","",time()-10,"/");
        setcookie("ausertype","",time()-10,"/");
        setcookie("ausername","",time()-10,"/");

        ========================== */

        header('location: ../view/login.php');

    } elseif($_GET['msg']=="rs"){
        unset($_SESSION['sid'],$_SESSION['semail'],$_SESSION['susertype'],$_SESSION['susername']);

        /* ==== if cookie used ====

        setcookie("sid","",time()-10,"/");
        setcookie("semail","",time()-10,"/");
        setcookie("susertype","",time()-10,"/");
        setcookie("susername","",time()-10,"/");

        ========================== */

        header('location: ../view/login.php');

    } elseif($_GET['msg']=="rc"){
        unset($_SESSION['cid'],$_SESSION['cemail'],$_SESSION['cusertype'],$_SESSION['cusername']);

        /* ==== if cookie used ====
        
        setcookie("cid","",time()-10,"/");
        setcookie("cemail","",time()-10,"/");
        setcookie("cusertype","",time()-10,"/");
        setcookie("cusername","",time()-10,"/");

        ========================== */

        header('location: ../view/login.php');
    }
?>