<?php 
    session_start();
    if (
        !isset($_SESSION['sid']) &&
        !isset($_SESSION['semail']) &&
        !isset($_SESSION['susertype']) &&
        !isset($_SESSION['susername'])
        
        /* ==== when cookie used ====

        !isset($_COOKIE['sid']) &&
        !isset($_COOKIE['semail']) &&
        !isset($_COOKIE['susertype']) &&
        !isset($_COOKIE['susername'])
        
        ========================== */
    ) {
        header('location: ../view/login.php');
    }
?>