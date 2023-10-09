<?php

$date="";
$month="";
$year="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $date=$_POST['day'];
    $month=$_POST['month'];
    $year=$_POST['year'];

    echo "Your date of birth is : ".$date."-".$month."-".$year;
}

?>