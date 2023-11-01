<?php
    session_start();
    if(!isset($_SESSION['flag'])){
        header('location: ../view/login.php');
    }
?>