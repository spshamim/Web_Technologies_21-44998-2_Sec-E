<?php

require_once('../model/userModel.php');
require_once('sessioncheck.php');

$currentPassword = $_POST['password'];
$newPassword = $_POST['new-pass'];

$uid = $_SESSION['uid'];
$userData = getdata($uid);

$data = changePassword($currentPassword, $newPassword, $uid);

if ($data) {
    if ($userData['type'] === 'user') {
        header("location: ../view/user_home.php");
        exit;
    } elseif ($userData['type'] === 'admin') {
        header("location: ../view/admin_home.php");
        exit;
    }
}

header("location: ../error.html");
