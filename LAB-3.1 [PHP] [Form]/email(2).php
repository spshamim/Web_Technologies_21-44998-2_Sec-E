<html>
<head>
    <title>Email</title>
</head>
<body>
    <form method="POST" action="" enctype="">
        <fieldset>
            <legend>Email</legend>
            <input type="email" name="useremail" id="" placeholder="Enter your email"><hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

    <?php
    $email="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email=$_POST['useremail'];
        echo "Your entered email is : ".$email;
    }

    ?>

</body>
</html>