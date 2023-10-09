<html>
<head>
    <title>Name</title>
</head>
<body> 
    <form method="POST" action="" enctype="">
    <fieldset>
        <legend>Name</legend>
        <input type="text" name="username" id="" placeholder="Enter your name"><br><hr>
        <input type="submit" value="Submit">
    </fieldset>
    </form>
    
    <?php
    $name="";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name=$_POST['username'];
        echo "Your name is : ".$name;
    }
    ?>

</body>
</html>