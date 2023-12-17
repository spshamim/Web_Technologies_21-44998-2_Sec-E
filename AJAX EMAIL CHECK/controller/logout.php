<?php 
    setcookie("pid","",time()-10,"/");
    header('location: ../view/login.php');
?>