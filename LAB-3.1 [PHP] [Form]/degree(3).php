<html>
<head>
    <title>Degree</title>
</head>
<body>

    <?php
    $degrees=[];
    //getting array of values
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $degrees=$_POST['dg'];//Storing POST Data
    }

    ?>
    <form method="POST" action="" enctype="">
        <fieldset>
            <legend>Degree</legend>
            <input type="checkbox" name="dg[]" id="" value="SSC" <?php if (in_array("SSC", $degrees)) echo "checked"; ?>>SSC
            <input type="checkbox" name="dg[]" id="" value="HSC" <?php if (in_array("HSC", $degrees)) echo "checked"; ?>>HSC
            <input type="checkbox" name="dg[]" id="" value="BSc" <?php if (in_array("BSc", $degrees)) echo "checked"; ?>>BSc
            <input type="checkbox" name="dg[]" id="" value="MSc" <?php if (in_array("MSc", $degrees)) echo "checked"; ?>>MSc<hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>
    
    <?php

    //getting Multiple values as an array
    if (!empty($degrees)) {
        echo "Your selected degrees are : " .implode(",", $degrees); //implode- separating array element as ',' delimiter
    }

    ?>
</body>
</html>