<?php
require_once('../controller/sessioncheck.php');
require_once('../model/userModel.php');

$userData = viewall();
?>

<html>
	<head>
		<title>User_List</title>
	</head>
	<body>
		<center>
		<table border="1" cellpadding="5" cellspacing="0">
			<tr><td colspan="4" align="CENTER">Users</td></tr>
			<tr>
				<td>ID</td><td>NAME</td><td>USER TYPE</td>
			</tr>
			<?php
			if ($userData) {
			    foreach ($userData as $row) {
			        echo "<tr>";
			        echo "<td>" . $row['id'] . "</td>";
			        echo "<td>" . $row['name'] . "</td>";
			        echo "<td>" . $row['type'] . "</td>";
			        echo "</tr>";
			    }
			}
			?>
			<tr>
				<td colspan="3" align="right">
					<a href="admin_home.php">Go Home</a>
				</td>
			</tr>
		</table>			
		</center>
	</body>
</html>
