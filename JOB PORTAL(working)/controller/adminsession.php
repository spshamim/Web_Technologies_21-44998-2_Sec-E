<?php 
    if (!isset($_COOKIE['aid'])) {
        header('location: ../view/login.php');
    }
?>