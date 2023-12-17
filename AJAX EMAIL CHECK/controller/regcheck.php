<?php

require_once("../model/userModel.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = array(
        "name" => $_POST['name'],
        "contact" => $_POST['contact'],
        "email" => $_POST['email'],
        "cpass" => $_POST['cpass'],
        "pass" => $_POST['pass']
    );

    $status = personsignup($data);

    if ($status) {
        header("location: ../view/login.php");
    } else {
        header("location: ../view/personreg.php");
    }
}

?>