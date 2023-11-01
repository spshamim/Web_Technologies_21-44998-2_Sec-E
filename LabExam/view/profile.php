<?php
	require_once('../model/userModel.php');
	require_once('../controller/sessioncheck.php');

	$uid = $_SESSION['uid'];

	$userData = getdata($uid);

?>

<html>
	<head>
		<title>Profile</title>
	</head>
	<body>
	<center>
	<table border="1" cellpadding="5" cellspacing="0">
		<tr><td colspan="2" align="CENTER">Profile</td></tr>
		<tr><td>ID</td><td><?php echo $userData['id']; ?></tr>
		<tr><td>NAME</td><td><?php echo $userData['name']; ?></td></tr>	
		<tr><td>USER TYPE</td><td><?php echo $userData['type']; ?></td></tr>
		<tr><td colspan="2" align="right"><a href="<?php echo $userData['type'] === 'user' ? 'user_home.php' : 'admin_home.php'; ?>">Go Home</a>
    	</td></td></tr>
	</table>			
</center>
	</body>
</html>