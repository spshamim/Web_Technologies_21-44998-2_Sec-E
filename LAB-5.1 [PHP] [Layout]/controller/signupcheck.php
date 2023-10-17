<?php 
    session_start();

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $gender = $_REQUEST['gender'];
    $day = $_REQUEST['day'];
    $month = $_REQUEST['month'];
    $year = $_REQUEST['year'];

    if($username == "" || $password == "" || $email == "" || $name == "" || $gender == "" || $day == "" || $month == "" || $year == ""){
        echo "null value";
    }else{
        $user = ['username'=> $username, 'password'=>$password,
                'email'=>$email, 'name'=>$name, 'gender'=>$gender, 'day'=>$day,
                'month'=>$month, 'year'=>$year
        ];
        $_SESSION['user'] = $user;
        header('location: ../view/login.php');
    }
?>