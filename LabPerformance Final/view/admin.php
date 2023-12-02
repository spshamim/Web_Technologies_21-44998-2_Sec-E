<?php 
  require_once('../controller/adminsession.php');
  require_once('../model/userModel.php');
  $users = getAllUser();
?>

<html>
<head>
    <title>ADMIN</title>
    <script src="../js/search.js"></script>
    <script src="../js/updatedelete.js"></script>
</head>
<body>
    <h1>Admin Panel</h1><hr>
    <br><a style="padding:10px;background-color: #BE3144; border-radius:5px;color:white; font-weight:bold;text-decoration:none; border:2px solid black" href="empreg.php">Employee Registration</a><br><br><hr>
    <h2 style="color:#FF6C22;font-weight:bold;">Employeer List :</h2>

        <table style="width: 800px;" border=1>
            <tr style="background-color: blue; color:white; font-weight:bold">
                <td>Employee Name</td>
                <td>Contact</td>
                <td>UserName</td>
                <td>Password</td>
                <td>Operations</td>
            </tr>
            <?php
                for($i=0; $i<count($users); $i++){
            ?>
            <tr style="background-color: #d3d3d3;">
                <td><?=$users[$i]['empname']?></td>
                <td><?=$users[$i]['contactno']?></td>
                <td><?=$users[$i]['username']?></td>
                <td><?=$users[$i]['password']?></td>
                <td>
                    <a style="background-color: greenyellow; color:black; font-weight:bold;text-decoration:none; border:2px solid black" href='' onclick="updateEmp('<?=$users[$i]['userID']?>')"> UPDATE </a> |
                    <a style="background-color: greenyellow; color:black; font-weight:bold;text-decoration:none; border:2px solid black" href='' onclick="deleteEmp('<?=$users[$i]['userID']?>')"> DELETE </a> 
                </td>
            </tr>
            <?php } ?>            
        </table>
        <br><hr><br>
        
        
        <h2 style="color:#FF6C22; font-weight:bold;">Search Employee : </h2>
        Type Username :<br>
        <input type="text" name="search" id="search">
        <input type="submit" style="background-color: greenyellow; color:black; font-weight:bold;cursor: pointer" value="Search" onclick="gettingUser()">
        <br><br>

        <table id="searchResults"></table>
        <br><hr><br>
        <a style="padding:6px;background-color: #BE3144; border-radius:5px;color:white; font-weight:bold;text-decoration:none; border:2px solid black" href='../controller/logout.php?msg=ra'> Log Out </a>
</body>
</html>