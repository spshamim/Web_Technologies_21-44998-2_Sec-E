<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // checking if value passed through SUBMIT
    $errors = array(); // array to store the validation error message

    // Retrieving the form data and storing it in variable
    $username = $_POST['username'];
    $password = $_POST['password'];

    // User Name can contain alphanumeric characters, period, dash, or underscore only
    if (!preg_match("/^[a-zA-Z0-9\.\-_]+$/", $username)) {
        $errors[] = "User Name can only contain alphanumeric characters, period, dash, or underscore.";
    }

    // User Name must contain at least two (2) characters
    if (strlen($username) < 2) {
        $errors[] = "User Name must contain at least two characters.";
    }

    // Password must not be less than eight (8) characters
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least eight characters long.";
    }

    // Password must contain at least one of the special characters (@, #, $, %)
    if (!preg_match("/[@#$%]/", $password)) {
        $errors[] = "Password must contain at least one of the special characters (@, #, $, %).";
    }

    if (empty($errors)) { // If no validation errors found
        echo "<h2>Login successful.</h2>";
    }
}
?>

<html>
<head>
    <title>Log In</title>
</head>
<body>
       <form action="" method="post">
        <fieldset>
            <legend><b>LOGIN</b></legend>
            <table>
                <tr>
                    <td align="right"><label for="username">User Name :</label></td>
                    <td><input type="text" id="username" name="username"></td>
                </tr>
        
                <tr>
                    <td align="right"><label for="password">Password :</label></td>
                    <td><input type="password" id="password" name="password"></td>
                </tr>
            </table>
            <hr>
            <input type="checkbox" name="rem" id=""> Remember me<br><br>
            <input type="submit" value="Submit">
            <a href="http://">Forgot password</a>
        </fieldset>
       </form><br>
       
    <?php
    if(!empty($errors)){
        // displaying the error message that stored in error array
        echo "<h3>Warning</h3>";
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
    ?>  
</body>
</html>