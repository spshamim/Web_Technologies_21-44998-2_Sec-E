<?php

require_once "../../model/userModel.php";
session_start();

if($_SERVER['REQUEST_METHOD'] == "GET"){
    if(isset($_GET['remove'])){
        $uID = $_GET['remove'];
        $status = removejobs($uID);
        if($status){
            $_SESSION["rrr1"] = "Successfully deleted..!";
            header("Location: ../../view/comp_after_login/company_dash.php"); // Redirect back to admin_sek.php
        }else{
            $_SESSION["rrr2"] = "Unable to delete..!";
            header("Location: ../../view/comp_after_login/company_dash.php"); // Redirect back to admin_sek.php
        }  
    }
}

?>