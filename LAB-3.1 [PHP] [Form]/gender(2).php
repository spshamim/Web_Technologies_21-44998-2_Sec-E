<html>
<head>
    <title>Gender</title>
</head>
<body>
    <form method="POST" action="" enctype="">
        <fieldset>
            <legend>Gender</legend>
            <!-- selecting one value and passing in POST -->
            <input type="radio" name="gender" id="" value="Male">Male
            <input type="radio" name="gender" id="" value="Female">Female
            <input type="radio" name="gender" id="" value="Other">Other<hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

    <?php
    $gender="";
    //getting one value
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $gender=$_POST['gender'];
        echo "Your gender is : ".$gender;
    }

    ?>

</body>
</html>