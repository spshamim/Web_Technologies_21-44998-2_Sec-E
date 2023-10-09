<?php

//getting Multiple values as an array
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $degrees = $_POST['dg']; //storing as an array
    echo "Your selected degrees are : " .implode(",", $degrees); //implode- separating array element as ',' delimiter
}

?>