<?php include_once("admin_profile_dashboard.php"); session_start();?>

<html>
    <head>
        <title>Change Password</title>
    </head>
    <body>
        <div style="display: flex; position:relative;left:450px;bottom:330px">
            <div style="background: #39A7FF; margin-top: 60px; margin-left: 05px; width: 600px; height: 270px;">
                <label style="margin-left:20px; color:red; font-weight:bold"><?php echo isset($_SESSION['p_error']) ? $_SESSION['p_error'] : ''; ?></label>
                <label style="margin-left:150px; color:red; font-weight:bold"><?php echo isset($_SESSION['done1']) ? $_SESSION['done1'] : ''; ?></label>
                <label style="margin-left:20px; color:red; font-weight:bold"><?php echo isset($_SESSION['notdone2']) ? $_SESSION['notdone2'] : ''; ?></label>
                <div style="margin-top: 20px; margin-left: 20px;">
                    <form action="../../controller/admin_profile/passChangeAdmin.php" method="post">
                        <table>
                            <tr>
                                <td style="font-size: 15px;">Current Password :</td>
                                <td><input style="height:35px; border:2px solid black; border-radius:10px; width:350px" type="password" name="curr_pass" value="" /></td>
                            </tr>
                            <tr>
                                <td style="font-size: 15px;">New Password :</td>
                                <td><input style="height:35px; border:2px solid black; border-radius:10px; width:350px" type="password" name="new_pass" value="" /></td>
                            </tr>
                            <tr>
                                <td style="font-size: 15px;">Confirm Password :</td>
                                <td><input style="height:35px; border:2px solid black; border-radius:10px; width:350px" type="password" name="conf_pass" value="" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"><br></td>
                            </tr>
                            <tr>
                                <td style="font-size: 15px;"><input type="submit" name="" value="Update" style="border:3px solid black ;background-color: greenyellow; color: black; font-size: 16px; text-decoration: none; padding: 10px 20px; border-radius: 5px;; font-weight:bold; cursor: pointer;"/></td>
                                <td></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php

unset($_SESSION['p_error']);
unset($_SESSION['done1']);
unset($_SESSION['notdone2']);

?>