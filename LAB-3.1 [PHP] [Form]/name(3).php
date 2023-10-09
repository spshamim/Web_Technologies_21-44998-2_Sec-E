<html>
<head>
    <title>Name</title>
</head>
<body>

    <form method="POST" action="" enctype="">
    <fieldset>
        <legend>Name</legend>
        <input type="text" name="username" id="" placeholder="Enter your name" value="<?php $name=""; if($_SERVER["REQUEST_METHOD"] == "POST"){ $name=$_POST['username']; echo $name;}?>"><hr>
        <input type="submit" value="Submit">
    </fieldset>
    </form>
    
    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo "Your name is : ".$name;
    }
    ?>

</body>
</html>