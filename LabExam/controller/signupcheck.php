<?php
    require_once('../model/userModel.php');
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    $sg=signup($id, $name, $password, $type);

    if($sg){
        header("location:../view/login.php");
    }else{
        echo "error !";
    }

?>