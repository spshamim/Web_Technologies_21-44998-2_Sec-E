<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // checking if value passed through SUBMIT
    $errors = array(); // Array to store the validation error messages

    // Retrieve the form data and storing it to variable
    $currentPassword = $_POST['current-password'];
    $newPassword = $_POST['new-password'];
    $retypeNewPassword = $_POST['retype-new-password'];

    // New Password should not be the same as the Current Password
    if ($currentPassword === $newPassword) {
        $errors[] = "New Password should not be the same as the Current Password.";
    }

    // New Password must match with the Retyped Password
    if ($newPassword !== $retypeNewPassword) {
        $errors[] = "New Password and Retyped Password must match.";
    }

    if (empty($errors)) {
        echo "<h2>Password changed successfully.</h2>";
    }
}
?>

<html>
<head>
    <title>Change Password</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend><b>Change Password</b></legend>
            <table>
                <tr>
                    <td align="right"><label for="current-password">Current Password:</label></td>
                    <td><input type="password" id="current-password" name="current-password"></td>
                </tr>
        
                <tr>
                    <td align="right"><label for="new-password" style="color: green;">New Password:</label></td>
                    <td><input type="password" id="new-password" name="new-password"></td>
                </tr>
        
                <tr>
                    <td align="right"><label for="retype-new-password" style="color: red;">Retype New Password:</label></td>
                    <td><input type="password" id="retype-new-password" name="retype-new-password"></td>
                </tr>
            </table>
            <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form><br>

    <?php
        if(!empty($errors)){
            // Display validation errors that stored in the array
            echo "<h3>Warning</h3>";
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
    ?>
</body>
</html>