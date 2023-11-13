<?php 
    if (!isset($_COOKIE['sid'])) {
        header('location: ../view/login.php');
    }
?>