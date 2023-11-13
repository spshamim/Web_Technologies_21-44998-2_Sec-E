<?php

session_start();
require_once "../model/userModel.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_COOKIE['sid'];

    $name = $_POST['name'];
    $profTitle = $_POST['prof_title'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $cgpa = $_POST['cgpa'];
    $salary = $_POST['expt_salary'];
    $experience = $_POST['work_exp'];
    $website = $_POST['website'];
    $aboutMe = $_POST['about_u'];
    $phone = $_POST['phn_num'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $google = $_POST['google'];
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $linkedin = $_POST['linkedin'];

    $updateResult = updateProfile($userID, $name, $profTitle, $gender, $age, $cgpa, $salary, $experience, $website, $aboutMe, $phone, $email, $address, $city, $google, $twitter, $facebook, $linkedin);

    if ($updateResult) {
        $_SESSION['yess']="Updated successfully..!";
        header("location: ../view/seeker_after_login/myProfile.php");
    } else {
        header("location: ../view/seeker_after_login/myProfile.php");
    }
}

?>