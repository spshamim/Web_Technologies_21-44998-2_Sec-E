<html>
	<head>
		<title>LOGIN</title>
	</head>
	<body>
		<center>
		<form action="../controller/logincheck.php" method="POST">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<fieldset>
							<legend><h3>LOGIN</h3></legend>
							User Id<br/>
							<input type="text" name="uid"><br/>                               
							Password<br/>
							<input type="password" name="password">
							<br /><hr/>
							<input type="submit" value="Login">
							<a href="registration.php">Register</a>
						</fieldset>
					</td>
				</tr>                                
			</table>
		</form>
		</center>

		<?php
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			$uid = $_POST['uid'];
			$password = $_POST['password'];
			
			if (empty($uid)) {
				$errors[] = "USER ID cannot be empty.";
			}

			if (empty($password)) {
				$errors[] = "Password cannot be empty.";
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