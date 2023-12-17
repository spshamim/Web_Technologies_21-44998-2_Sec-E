<?php

    require_once('../../model/userModel.php');

    if($_SERVER['REQUEST_METHOD'] == "GET")
    {
        if(isset($_GET['delete']))
        {
            $sID = $_GET['delete'];
            deleteApplyJob($sID);
        } 
    }

    header("Location:../../view/seeker/seeker_profile.php");
    exit();

?>
