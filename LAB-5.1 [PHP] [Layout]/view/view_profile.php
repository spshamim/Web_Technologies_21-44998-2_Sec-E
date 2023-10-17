<?php
    require_once("../controller/sessioncheck.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
</head>
<body>
    <table cellspacing="0" border="1" height="100%" width="100%">
        <tr>
            <td colspan="3">
            <img src="../assets/icon.png" alt="" srcset="" height="80px" width="150px">
            <label style="margin-left: 1150px;">Logged in as : </label> 
            <a href="log_dash.php">user</a> | 
            <a href="../controller/logout.php">Logout</a>
            </td>
        </tr>
        <tr>
            <td height="576px" width="305px" valign="top">
                <h3 style="margin-left:10px;">Account</h3><hr>
                <ul style="line-height: 1.5;">
                    <li><a href="log_dash.php">Dashboard</a></li>
                    <li><a href="view_profile.php">View Profile</a></li>
                    <li><a href="edit_profile.php">Edit Profile</a></li>
                    <li><a href="chngpropic.php">Change Profile Picture</a></li>
                    <li><a href="cngpass.php">Change Password</a></li>
                    <li><a href="../controller/logout.php">Logout</a></li>
                </ul>
            </td>
            <td colspan="2" height="576px" valign="top">
            <fieldset  style="margin:30px;">
                <legend><h4>PROFILE</h4></legend>
                <table cellspacing="0" border="0">
                    <tr>
                        <td>Name    :Bob<hr></td>
                        <td rowspan="4">
                        <img src="../assets/pro.jpg" alt="" srcset="" height="280px" width="290px"  style="margin-left: 20px;"><br>
                        <a href="chngpropic.php" style="margin-left: 120px;">Change</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Email   :bob@aiub.edu<hr></td>
                    </tr>
                    <tr>
                        <td>Gender  :Male<hr></td>
                    </tr>
                    <tr>
                        <td>Date of Birth   :19-9-1998</td>
                    </tr>
                </table><hr>
                <a href="edit_profile.php">Edit Profile</a>
                <br><br>
            </fieldset>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">Copyright 2023</td>
        </tr>
    </table>
</body>
</html>
