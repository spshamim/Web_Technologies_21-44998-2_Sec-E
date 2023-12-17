<?php

require_once "../model/userModel.php";

if($_SERVER['REQUEST_METHOD'] == "GET"){
    if(isset($_GET['remove'])){
        $uID = $_GET['remove'];
        delAdmin($uID);
    } 
}

header("location:../view/admin_admin.php");
exit();

?>