<?php 
    if (!isset($_COOKIE['cid'])) {
        header('location: ../view/login.php');
    }
?>