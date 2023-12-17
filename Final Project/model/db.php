<?php

    $dbhost = "localhost";
    $dbname = "jobportal";
    $dbuser = "root";
    $dbpass = "mysql";

    function getConnection(){
        global $dbhost;
        global $dbname;
        global $dbpass;
        global $dbuser;

        return  $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }
?>