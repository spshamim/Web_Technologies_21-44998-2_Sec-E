<?php 
    session_start();
    if (
        !isset($_SESSION['cid']) &&
        !isset($_SESSION['cemail']) &&
        !isset($_SESSION['cusertype']) &&
        !isset($_SESSION['cusername'])

        /* ==== when cookie used ====

        !isset($_COOKIE['cid']) &&
        !isset($_COOKIE['cemail']) &&
        !isset($_COOKIE['cusertype']) &&
        !isset($_COOKIE['cusername'])
        
        ========================== */
    ) {
        header('location: ../view/login.php');
    }
?>