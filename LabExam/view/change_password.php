<?php
	require_once('../controller/sessioncheck.php');
	require_once('../model/userModel.php');

	$uid = $_SESSION['uid'];

	$userData = getdata($uid);
?>

<html>
	<head>
		<title>Change Password</title>
	</head>
	<body>
		<center>
		<form action="../controller/changepass.php" method="POST">
			<table border="0" cellspacing="0" cellpadding="5">
				<tr>
					<td>
						<fieldset>
							<legend>CHANGE PASSWORD</legend>
							Current Password<br />
							<input type="password" name="password"/><br />
							New Password<br />
							<input type="password" name="new-pass"/><br />
							Retype New Password<br />
							<input type="password" name="re-new"/>								
							<hr />
							<input type="submit" value="Change" />     
							<a href="<?php echo $userData['type'] === 'user' ? 'user_home.php' : 'admin_home.php'; ?>">Home</a>						
						</fieldset>
					</td>
				</tr>
			</table>
		</form>
		</center>

		<?php
		if ($_SERVER['REQUEST_METHOD'] === 'POST') { // checking if value passed through SUBMIT
			$errors = array(); // Array to store the validation error messages

			// Retrieve the form data and storing it to variable
			$currentPassword = $_POST['password'];
			$newPassword = $_POST['new-pass'];
			$retypeNewPassword = $_POST['re-new'];

			// New Password must match with the Retyped Password
			if ($newPassword !== $retypeNewPassword) {
				$errors[] = "New Password and Retyped Password must match.";
			}

			if ($errors) {
				// Display validation errors
				echo "<ul>";
				foreach ($errors as $error) {
					echo "<li>$error</li>";
				}
				echo "</ul>";
			}
		}
		?>
	</body>
</html>