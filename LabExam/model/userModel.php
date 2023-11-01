<?php
    // establishing database connection
    require_once('db.php');

    // when passing parameter value - username & password will come here to check with database
    function login($username, $password){
        // getConnection() - function in db.php, that establish connection with Database and return
        $con = getConnection(); // catching the value (if return successful it will work otherwise not)
        $sql = "select * from users where id='{$username}' and password='{$password}'";
        $result = mysqli_query($con, $sql); // Executing Query
        // fetching as associative array because $result is not directly accessible
        $user = mysqli_fetch_assoc($result); // will store one row in $user
        
        if(count($user) > 0){ // if minimum one matching row found, then return SUCCESS
            return true;
        }else{
            return false;
        }
    }

    function signup($id1, $name1, $password1, $type1){
        $conn = getConnection();
        $sql = "INSERT INTO users (id, name, password, type) VALUES ('$id1', '$name1', '$password1', '$type1')";
        $result=mysqli_query($conn,$sql);
        if ($result){
            return true;
        } else{
            return false;
        }
    }

    function getUserType($id){
            $conn = getConnection();
            $sql = "SELECT type FROM users WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
        
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                return $row['type'];
            } else {
                return null;
            }
    }
    
    function getUsername($uid) {
        $conn = getConnection();
        $sql = "SELECT name FROM users WHERE id = '$uid'";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['name']; // Return the username
        } else {
            return null;
        }
    }    
    
    function getdata($uid) {
        $conn = getConnection();
        $sql = "SELECT id, name, type FROM users WHERE id = '$uid'";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            $row = mysqli_fetch_assoc($result);
    
            // Check if a user with the given ID exists
            if ($row) {
                return $row; // Return an associative array with id, name, and type
            } else {
                return null;
            }
        } else {
            return null;
        }
    }    

    function changePassword($currentPassword, $newPassword, $uid) {
        $conn = getConnection();
        
        // Check if the current password matches for the given user ID
        $checkSql = "SELECT id FROM users WHERE id = '$uid' AND password = '$currentPassword'";
        $result = mysqli_query($conn, $checkSql);
    
        if ($result && mysqli_num_rows($result) > 0) {
            // Current password matches, update the password
            $updateSql = "UPDATE users SET password = '$newPassword' WHERE id = '$uid'";
            $updateResult = mysqli_query($conn, $updateSql);
    
            if ($updateResult) {
                return true; // Password changed successfully
            }
        }
    
        return false;
    }

    function viewall(){
        $conn = getConnection();
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            $data = array(); // Initialize an empty array to store the results
    
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row; // Add each row as an associative array to the result array
            }
    
            return $data;
        } else {
            return null;
        }
    }

?>