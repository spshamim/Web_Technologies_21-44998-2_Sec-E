<?php 
    if (!isset($_COOKIE['eid'])) {
        header('location: ../view/login.php');
    }
?>