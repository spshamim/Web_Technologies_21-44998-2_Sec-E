<?php 
    if (!isset($_COOKIE['pid'])) {
        header('location: ../view/login.php');
    }
?>