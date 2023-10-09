<html>
<head>
    <title>Date of Birth</title>
</head>
<body>

    <?php

    $date="";
    $month="";
    $year="";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $date=$_POST['day'];
        $month=$_POST['month'];
        $year=$_POST['year'];
    }

    ?>
    <form method="POST" action="" enctype="">
        <fieldset>
            <legend>Date of Birth</legend>
            &nbsp&nbsp
            dd &nbsp&nbsp&nbsp&nbsp&nbsp
            mm &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            yy
            <br>
            <input type="number" name="day" id="" value="<?php echo $date; ?>" style="width: 30px;"> <b>/</b>
            <input type="number" name="month" id="" value="<?php echo $month; ?>" style="width: 30px;"> <b>/</b>
            <input type="number" name="year" id="" value="<?php echo $year; ?>" style="width: 60px;"> 
            <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

    <?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        echo "Your date of birth is : ".$date."-".$month."-".$year;
    }

    ?>
</body>
</html>