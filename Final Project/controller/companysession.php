<?php 
    if (!isset($_COOKIE['cid']) && !isset($_COOKIE['cname'])) {
        header('location: ../view/login.php');
    }
?>