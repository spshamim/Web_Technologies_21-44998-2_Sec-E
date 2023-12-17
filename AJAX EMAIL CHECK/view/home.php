<?php
    include_once "../controller/personsession.php";
    require_once("../model/userModel.php");
    $users = getAllUser();
?>

<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome</h1><hr><br>
    <table border="1">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Phone</td>
                <td>Email</td>
                <td>Password</td>
            </tr>
            <?php   for($i=0; $i<count($users); $i++){ ?>
            <tr>
                <td><?=$users[$i]['id']?></td>
                <td><?=$users[$i]['name']?></td>
                <td><?=$users[$i]['phone']?></td>
                <td><?=$users[$i]['email']?></td>
                <td><?=$users[$i]['password']?></td>
            </tr>
        <?php } ?>            
        </table><br>
    <hr><br><br>
    <a style="padding:10px;background-color: #BE3144; border-radius:5px;color:white; font-weight:bold;text-decoration:none; border:2px solid black" href="../controller/logout.php">Logout</a>
</body>
</html>