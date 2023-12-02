<?php
    require_once('db.php');
    
    /* =================== LOGIN ========================== */

    function login($username, $password){
        $conn = getConnection();
        $sql = "SELECT * FROM login WHERE username = '{$username}' AND password = '{$password}'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) {
            $userData = array(
                'success' => true,
                'id' => $user['id'],
                'type' => $user['type']
            );
            return $userData;
        } else {
            return array('success' => false);
      }
    }

    function empsignup($form_data){
        $conn = getConnection();
        
        $empname = $form_data["empname"];
        $contact = $form_data["contact"];
        $uname = $form_data["uname"];
        $pass = $form_data["pass"];    


        $sql = "INSERT INTO login (username, password ,type)
        VALUES ('$uname', '$pass', 'employee');";
        $result=mysqli_query($conn,$sql);  

        $lastID=mysqli_insert_id($conn);

        $sql2 = "INSERT INTO employee (userID, empname, contactno, username, password)
        VALUES ($lastID,'$empname', '$contact', '$uname','$pass');";
        $result2=mysqli_query($conn,$sql2);  

        if ($result && $result2){
            return true;
        } else{
            return false;
        }
    }

    function getAllUser(){
        $con = getConnection();
        $sql = "SELECT * FROM employee;";
        $result = mysqli_query($con, $sql);
        $users = [];
        
        while($user = mysqli_fetch_assoc($result)){
            array_push($users, $user);
        }
        
        return $users;
    }

    function getSearchedUser($username){
        $con = getConnection();
        $sql = "SELECT * FROM employee WHERE username = '{$username}';";
        $result = mysqli_query($con, $sql);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    function getSearchedUser2($userID){
        $con = getConnection();
        $sql = "SELECT * FROM employee WHERE userID = $userID;";
        $result = mysqli_query($con, $sql);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    function updateEmployee($data,$id){
        $conn = getConnection();

        $empname = $data['empname'];
        $contact = $data['contact'];
        $uname = $data['uname'];
        $pass = $data['pass'];

        $sql = "UPDATE employee SET
            empname = '{$empname}',
            contactno = '{$contact}',
            username = '{$uname}',
            password = '{$pass}'
            WHERE userID = $id";

        $sql2 = "UPDATE login SET
        username = '{$uname}',
        password = '{$pass}'
        WHERE id = $id";

        $result = mysqli_query($conn,$sql);
        $result2 = mysqli_query($conn,$sql2);

        if ($result&&$result2) {
            return true;
        } else {
            return false;
        }
    }

    function deleteEmployee($userID){
        $conn = getConnection();
        $sql = "DELETE FROM employee WHERE userID = $userID";
        $sql2 = "DELETE FROM login WHERE id = $userID";

        $result = mysqli_query($conn,$sql);
        $result2 = mysqli_query($conn,$sql2);

        if ($result&&$result2) {
            return true;
        } else {
            return false;
        }
    }

?>