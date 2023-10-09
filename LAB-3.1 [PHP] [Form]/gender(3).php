<html>
<head>
    <title>Gender</title>
</head>
<body>
    
    <?php
    $gender = "";
    //getting one value
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $gender = $_POST["gender"];
    }
    ?>

    <form method="POST" action="">
        <fieldset>
            <legend>Gender</legend>
            <!-- selecting one value and passing in POST -->
            <input type="radio" name="gender" value="Male" <?php if ($gender == "Male") { echo "checked"; } ?>>Male
            <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") { echo "checked"; } ?>>Female
            <input type="radio" name="gender" value="Other" <?php if ($gender == "Other") { echo "checked"; } ?>>Other<hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

    <?php
    //getting one value
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Your gender is: " . $gender;
    }
    ?>

</body>
</html>
