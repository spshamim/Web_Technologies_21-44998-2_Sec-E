<html>
<head>
    <title>Blood Group</title>
</head>
<body>
    <form method="POST" action="" enctype="">
        <fieldset>
        <legend>Blood Group</legend>
        <!-- selecting one value and passing in POST -->
        <select name="bg" id="">
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select><hr>
        <input type="submit" value="Submit">    
    </fieldset>
</form>

    <?php
    $bg="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $bg=$_POST['bg'];

        echo "Your blood group is : ".$bg;
    }

    ?>
</body>
</html>