<?php
$gender="";
$gender=$_POST['gender'];
//getting one value
if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "Your selected gender is : ".$gender;
}

?>