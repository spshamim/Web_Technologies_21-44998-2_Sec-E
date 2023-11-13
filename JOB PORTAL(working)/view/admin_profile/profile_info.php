<?php
    include_once("admin_profile_dashboard.php");
    require_once "../../model/userModel.php";
    session_start();
    
    $adminID = $_COOKIE['aid'];
    $row = profileRetrieveAdmin($adminID);

    $_SESSION['uname'] = $row['username'];
    $_SESSION['email'] = $row['email'];
?>

<html>
    <head>
        <title>PROFILE</title>
    </head>
    <body>
        <div style="display: flex; position:relative;left:450px;bottom:330px">
            <div style="background: #39A7FF; margin-top: 65px; margin-left: 05px; width: 600px; height: 230px;">
                <label style="margin-left:20px; color:red; font-weight:bold"><?php echo isset($_SESSION['unerr']) ? $_SESSION['unerr'] : ''; ?></label>
                <label style="margin-left:150px; color:red; font-weight:bold"><?php echo isset($_SESSION['emerr']) ? $_SESSION['emerr'] : ''; ?></label>
                <label style="margin-left:100px; color:red; font-weight:bold"><?php echo isset($_SESSION['su1']) ? $_SESSION['su1'] : ''; ?></label>
                <label style="margin-left:150px; color:red; font-weight:bold"><?php echo isset($_SESSION['su2']) ? $_SESSION['su2'] : ''; ?></label>
                <div style="margin-top: 20px; margin-left: 20px;">
                    <form action="../../controller/admin_profile/profile_info_check.php" method="post">
                        <table>
                            <tr>
                                <td style="font-size: 15px;">User Name :</td>
                                <td><input style="height:35px; border:2px solid black; border-radius:10px; width:350px" type="text" name="uname" value="<?php echo isset($_SESSION['uname']) ? $_SESSION['uname'] : ''; ?>" /></td>
                            </tr>
                            <tr>
                                <td style="font-size: 15px;">Email :</td>
                                <td><input style="height:35px; border:2px solid black; border-radius:10px; width:350px" type="text" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" /></td>
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

unset($_SESSION['uname']);
unset($_SESSION['email']);
unset($_SESSION['su1']);
unset($_SESSION['su2']);
unset($_SESSION['unerr']);
unset($_SESSION['emerr']);

?>