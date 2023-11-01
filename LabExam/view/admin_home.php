<?php
require_once('../model/userModel.php');
require_once('../controller/sessioncheck.php');
?>

<html>
	<head>
		<title>Admin Homepage</title>
	</head>
	<body>
		<center>
		<h1>Welcome <?php
	$uid = $_SESSION['uid'];

	$userType = getUserType($uid);
	$username = getUsername($uid);

	if ($userType === 'user') {
		echo "$username";
	} elseif ($userType === 'admin') {
		echo "$username";
	}
	?>!</h1>
		<a href="profile.php">Profile</a>
		<br/>
		<a href="change_password.php">Change Password</a>
		<br/>
		<a href="view_users.php">View Users</a>
		<br/>
		<a href="../controller/logout.php">Logout</a>
		</center>
	</body>
</html>