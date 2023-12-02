<?php

require_once("../model/userModel.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = array(
        "empname" => $_POST['empname'],
        "contact" => $_POST['contact'],
        "uname" => $_POST['uname'],
        "pass" => $_POST['pass']
    );

    $status = empsignup($data);

    if ($status) {
        echo "success"; // Registration successful
    } else {
        echo "failure"; // Registration failed
    }
}

?>