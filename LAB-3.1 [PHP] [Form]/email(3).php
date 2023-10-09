<html>
<head>
    <title>Email</title>
</head>
<body>

    <?php
        $email="";
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $email=$_POST['useremail'];
        }

    ?>

    <form method="POST" action="" enctype="">
        <fieldset>
            <legend>Email</legend>
            <input type="email" name="useremail" id="" placeholder="Enter your email" value="<?php echo $email; ?>"><hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

    <?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        echo "Your entered email is : ".$email;
    }

    ?>

</body>
</html>