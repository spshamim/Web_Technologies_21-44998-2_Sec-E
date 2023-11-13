<?php

session_start();
require_once "../model/userModel.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_COOKIE['sid'];

    $deg_name = $_POST['deg_name'];
    $yty = $_POST['year'];
    $ins_name = $_POST['inst_name'];

    $updateResult = myEducation($userID,$deg_name,$yty,$ins_name);

    if ($updateResult) {
        $_SESSION['yesss']="Updated successfully..!";
        header("location: ../view/seeker_after_login/myEducation.php");
    } else {
        header("location: ../view/seeker_after_login/myEducation.php");
    }
}

?>