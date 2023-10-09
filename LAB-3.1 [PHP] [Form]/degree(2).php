<html>
<head>
    <title>Degree</title>
</head>
<body>
    <form method="POST" action="" enctype="">
        <fieldset>
            <legend>Degree</legend>
            <input type="checkbox" name="dg[]" id="" value="SSC">SSC
            <input type="checkbox" name="dg[]" id="" value="HSC">HSC
            <input type="checkbox" name="dg[]" id="" value="BSc">BSc
            <input type="checkbox" name="dg[]" id="" value="MSc">MSc<hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>
    
    <?php

    //getting Multiple values as an array
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $degrees = $_POST['dg']; //storing as an array
    echo "Your selected degrees are : " .implode(",", $degrees); //implode- separating array element as ',' delimiter
    }

    ?>
</body>
</html>