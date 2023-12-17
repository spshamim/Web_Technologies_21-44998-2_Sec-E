<?php include_once("admin_profile_dashboard.php"); session_start();?>

<html>
    <head>
        <title>Change Password</title>
        <script src="../../js/togglePass.js"></script>
        <link rel="stylesheet" href="../../asset/css/admin_profile/passChange.css">
    </head>
    <body>
        <div id="d1">
            <div id="d2">
                <label id="l1"><?php echo isset($_SESSION['p_error']) ? $_SESSION['p_error'] : ''; ?></label>
                <label id="l2"><?php echo isset($_SESSION['done1']) ? $_SESSION['done1'] : ''; ?></label>
                <label id="l3"><?php echo isset($_SESSION['notdone2']) ? $_SESSION['notdone2'] : ''; ?></label>
                <div id="d3">
                    <form action="../../controller/admin_profile/passChangeAdmin.php" method="post">
                        <table>
                            <tr>
                                <td id="ctd">Current Password :</td>
                                <td><input id="inp" type="password" name="curr_pass" id="curr_pass" value="" /></td>
                            </tr>
                            <tr>
                                <td id="ctd">New Password :</td>
                                <td><input id="inp" type="password" name="new_pass" id="new_pass" value="" /></td>
                            </tr>
                            <tr>
                                <td id="ctd">Confirm Password :</td>
                                <td><input id="inp" type="password" name="conf_pass" id="conf_pass" value="" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"><br></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="checkbox" name="" id="togglePassword"> Show Password</td>
                            </tr>
                            <tr>
                                <td id="ctd"><input type="submit" name="" value="Update" id="sub1"/></td>
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