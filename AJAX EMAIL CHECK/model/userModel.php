<?php
    require_once('db.php');
    
    function login($email, $password){
        $conn = getConnection();
        $sql = "SELECT * FROM person WHERE email = '{$email}' AND password = '{$password}'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) {
            $userData = array(
                'success' => true,
                'id' => $user['id'],
            );
            return $userData;
        } else {
            return array('success' => false);
      }
    }

    function personsignup($form_data){
        $conn = getConnection();
        
        $name = $form_data["name"];
        $phone = $form_data["contact"];
        $email = $form_data["email"];
        $pass = $form_data["pass"];    

        $sql2 = "INSERT INTO person (name, phone, email, password)
        VALUES ('$name', '$phone', '$email','$pass');";
        $result2=mysqli_query($conn,$sql2);  

        if ($result2){
            return true;
        } else{
            return false;
        }
    }

    function getAllUser(){
        $con = getConnection();
        $sql = "SELECT * FROM person;";
        $result = mysqli_query($con, $sql);
        $users = [];
        
        while($user = mysqli_fetch_assoc($result)){
            array_push($users, $user);
        }
        
        return $users;
    }

    function checkEmailAvailability($email){
        $con = getConnection();
        $sql = "SELECT COUNT(*) as count FROM person WHERE email = '$email'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        
        if($row['count'] == 0){
            $isAvailable = ($row['count'] == 0);
            return $isAvailable;
        }else{
            return false;
        }
    }

?>