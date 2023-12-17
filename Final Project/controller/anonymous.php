<?php

    require_once("../model/userModel.php");

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $status = deletejobbyadmin($id);
    
        if($status){
            echo "success";
        }else{
            echo "failed";
        }
    }
 
?>