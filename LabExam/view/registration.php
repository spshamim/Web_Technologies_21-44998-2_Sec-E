<html>
<head>
	<title>SignUP</title>
</head>
<body>
	<center>
		<form action="../controller/signupcheck.php" method="POST">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<fieldset>
							<legend><h3>REGISTRATION</h3></legend>
							Id<br/><input type="text" name="id"><br/>
							Password<br/><input type="password" name="password"><br/>
							Confirm Password<br/><input type="password" name="confirm_password"><br/>
							Name<br/><input type="text" name="name"><br/>
							User Type<hr/>
							<input type="radio" value="user" name="type"/>User
							<input type="radio" value="admin" name="type"/>Admin
							<hr/>
							<input type="submit" value="Sign Up">
							<a href="login.php">Sign In</a>
						</fieldset>
					</td>
				</tr>                                
			</table>
		</form>
		</center>

		<?php
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			$id = $_POST['id'];
			$name = $_POST['name'];
			$password = $_POST['password'];
			$confirm_password = $_POST['confirm_password'];
			$type = $_POST['type'];

			$errors = array();

			if (empty($id) || strlen($id) < 5 || !ctype_digit($id)) {
				$errors[] = "ID must be at least 5 characters long and contain only integers.";
			}

			if (empty($password) || empty($confirm_password) || $password !== $confirm_password) {
				$errors[] = "Password and Confirm Password must match and cannot be empty.";
			}

			if (empty($name)) {
				$errors[] = "Name cannot be empty.";
			}

			if (empty($type)) {
				$errors[] = "User Type must be selected.";
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
		