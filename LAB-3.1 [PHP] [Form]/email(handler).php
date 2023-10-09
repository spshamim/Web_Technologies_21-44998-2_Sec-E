<?php
$email="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=$_POST['useremail'];
    echo "Your entered email is : ".$email;
}

?>