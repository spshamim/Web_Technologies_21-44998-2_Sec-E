<?php
    require_once('../model/userModel.php');
    require_once('../controller/adminsession.php');
    $userID = $_GET['id'];
    $user = getSearchedUser2($userID);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <script src="../js/updatedelete.js"></script>
</head>
<body>
    <h2>Edit Employee</h2>
    <form action="../controller/update.php?id=<?=$userID?>" method="post">
        <table>
            <tr>
                <td>Employee Name:</td>
                <td><input type="text" name="empname" value="<?=$user['empname']?>"></td>
            </tr>
            <tr>
                <td>Contact No.:</td>
                <td><input type="text" name="contact" value="<?=$user['contactno']?>"></td>
            </tr>
            <tr>
                <td>User Name:</td>
                <td><input type="text" name="uname" value="<?=$user['username']?>"></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="password" name="pass" value="<?=$user['password']?>"></td>
            </tr>
            <tr>
                <td></td>
                <td>&nbsp</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" style="cursor:pointer;background-color: greenyellow; color:black; font-weight:bold;text-decoration:none; border:2px solid black"></td>
            </tr>
        </table>    
    </form><hr><br>
    <a style="padding:6px;background-color: #BE3144; border-radius:5px;color:white; font-weight:bold;text-decoration:none; border:2px solid black" href='admin.php'> Back </a>

</body>
</html>
