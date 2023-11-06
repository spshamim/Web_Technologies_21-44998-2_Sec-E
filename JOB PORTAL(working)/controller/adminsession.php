<?php 
    session_start();
    if (
        !isset($_SESSION['aid']) &&
        !isset($_SESSION['aemail']) &&
        !isset($_SESSION['ausertype']) &&
        !isset($_SESSION['ausername'])

        /* ==== when cookie used ====

        !isset($_COOKIE['aid']) &&
        !isset($_COOKIE['aemail']) &&
        !isset($_COOKIE['ausertype']) &&
        !isset($_COOKIE['ausername'])
        
        ========================== */
    ) {
        header('location: ../view/login.php');
    }
?>