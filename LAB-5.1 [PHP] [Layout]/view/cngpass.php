<?php
    require_once("../controller/sessioncheck.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHANGE PASSWORD</title>
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
                <legend><h4>CHANGE PASSWORD</h4></legend>
                <form action="" method="post">
            <table>
                <tr>
                    <td align="right"><label for="current-password">Current Password:</label></td>
                    <td><input type="password" id="current-password" name="current-password"></td>
                </tr>
        
                <tr>
                    <td align="right"><label for="new-password" style="color: green;">New Password:</label></td>
                    <td><input type="password" id="new-password" name="new-password"></td>
                </tr>
        
                <tr>
                    <td align="right"><label for="retype-new-password" style="color: red;">Retype New Password:</label></td>
                    <td><input type="password" id="retype-new-password" name="retype-new-password"></td>
                </tr>
            </table>
            <hr>
            </form>
                <input type="submit" value="Update">
            </fieldset>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">Copyright 2023</td>
        </tr>
    </table>
</body>
</html>