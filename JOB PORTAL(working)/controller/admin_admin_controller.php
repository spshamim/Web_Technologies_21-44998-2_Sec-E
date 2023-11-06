<?php

include_once "../model/userModel.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['remove'])){

        foreach ($_POST['remove'] as $key => $value){
            
            $uID=$key;
            delAdmin($uID);
        }
        unset($_POST['remove']);
    }
    
}

header("location:../view/admin_admin.php");
exit();

?>