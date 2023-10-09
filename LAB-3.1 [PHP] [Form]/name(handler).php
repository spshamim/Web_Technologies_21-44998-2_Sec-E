<?php
$name="";
$name=$_POST['username'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "Your entered name is : ".$name;    
}


?>