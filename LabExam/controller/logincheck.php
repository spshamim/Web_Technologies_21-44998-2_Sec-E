<?php
require_once('../model/userModel.php');

session_start();

$uid = $_REQUEST['uid'];
$password = $_REQUEST['password'];

$status = login($uid, $password);

if ($status) {
    // If login is successful, store the uid in the session
    $_SESSION['uid'] = $uid;

    $userType = getUserType($uid);

    if ($userType === 'user') {
        $_SESSION['flag'] = 'true';
        header("location:../view/user_home.php");
    } elseif ($userType === 'admin') {
        $_SESSION['flag'] = 'true';
        header("location:../view/admin_home.php");
    }
} else {
    echo "Invalid user!";
}
?>
