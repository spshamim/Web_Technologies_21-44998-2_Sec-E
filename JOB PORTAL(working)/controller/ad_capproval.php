<?php

include_once "../model/userModel.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){ //to set approval
    if(isset($_POST['approve'])){
        foreach ($_POST['approve'] as $key => $value){
            
            $uID=$key;
            updateCompanyApproval($uID);
        }
    }  
}

header("location: ../view/admin.php"); // redirect to admin.php after approval done
exit;

?>