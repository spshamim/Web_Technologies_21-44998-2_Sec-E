<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = array(); // Array to store validation errors

    // Retrieving the form data for validation check
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $con_password = $_POST['con-password'];
    $gender = $_POST['gender'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    // Checking if all fields are filled or not
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['con-password']) || empty($_POST['gender']) || empty($_POST['day']) || empty($_POST['month']) || empty($_POST['year'])) {
        $errors[] = "All fields must be filled.";
    }

    // User Name can contain alphanumeric characters, period, dash, or underscore only
    if (!preg_match("/^[a-zA-Z0-9\.\-_]+$/", $username)) {
        $errors[] = "User Name can only contain alphanumeric characters, period, dash, or underscore.";
    }
    
    // User Name must contain at least two (4) characters
    if (strlen($username) < 4) {
        $errors[] = "User Name must contain at least two characters.";
    }

    // Checking if password and confirm password match
    if ($_POST['password'] !== $_POST['con-password']) {
        $errors[] = "Password and Confirm Password should match.";
    }

    // Checking if day, month, and year values are within the specified ranges
    $day = (int)$_POST['day']; // Converting to integer for checking
    $month = (int)$_POST['month']; // Converting to integer for checking
    $year = (int)$_POST['year']; // Converting to integer for checking

    if ($day < 1 || $day > 31 || $month < 1 || $month > 12 || $year < 1950 || $year > 2023) {
        $errors[] = "Invalid date of birth.";
    }

    if (empty($errors)) {
        echo "<h2>Registration successful!</h2>";
    }
}
?>

<html>
<head>
    <title>Registration</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend><b>Registration</b></legend>
            Name :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="text" name="name" id=""><hr>
            Email :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="email" name="email" id=""><hr>
            User Name :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="text" name="username" id=""><hr>
            Password :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="password" name="password" id=""><hr>
            Confirm Password :
            <input type="password" name="con-password" id=""><hr>
            
            <fieldset>
                <legend>Gender</legend>
                <input type="radio" name="gender" id="" value="Male">Male
                <input type="radio" name="gender" id="" value="Female">Female
                <input type="radio" name="gender" id="" value="Other">Other
            </fieldset><hr>

            <fieldset>
                <legend>Date of Birth</legend>
                <input type="number" name="day" id="" style="width:40px;">&nbsp/&nbsp<input type="number" name="month" id="" style="width:40px;">&nbsp/&nbsp<input type="number" name="year" id="" style="width:60px;"> &nbsp(dd/mm/yy)
            </fieldset><hr>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </fieldset>
    </form><br>

    <?php
        if(!empty($errors)){
            // To Display validation error messages from the error array
            echo "<h3>Warning</h3>";
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
    ?>
</body>
</html>