<?php
    require_once('../model/userModel.php');
    require_once('../controller/adminsession.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = array(
            "empname" => $_POST['empname'],
            "compname" => $_POST['compname'],
            "contact" => $_POST['contact'],
            "uname" => $_POST['uname'],
            "pass" => $_POST['pass']
        );

        $id = $_GET['id'];
        $status = updateEmployee($data,$id);

        if ($status) {
            header("location: ../view/admin.php");
        } else {
            // Handle update failure
            echo "Update failed";
        }
    }
?>
