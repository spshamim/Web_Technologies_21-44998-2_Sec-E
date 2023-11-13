<?php
    include_once("admin_profile_dashboard.php");
    session_start();
?>

<html>
    <head>
        <title>PICTURE</title>
    </head>
    <body>
        <div style="display: flex; position:relative;left:450px;bottom:330px">
            <div style="background: #39A7FF; margin-top: 57px; margin-left: 05px; width: 600px; height: 300px;">
                <label style="margin-left:20px; color:red; font-weight:bold"><?php echo isset($_SESSION['pu1']) ? $_SESSION['pu1'] : ''; ?></label>
                <label style="margin-left:20px; color:red; font-weight:bold"><?php echo isset($_SESSION['pu2']) ? $_SESSION['pu2'] : ''; ?></label>
                <div style="margin-top: 20px; margin-left: 60px;">
                    <form action="../../controller/admin_profile/picture_check.php" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td style="font-size: 15px;">Profile Picture :</td>
                            </tr>
                            <tr>
                                <td><img src="../../asset/2.png" alt="" style="height: 100px; width:120px"></td>
                            </tr>
                            <tr><td>&nbsp</td></tr>
                            <tr>
                                <td>
                                    <input type="file" name="pic" value="">
                                </td>
                            </tr>
                            <tr><td>&nbsp</td></tr>
                            <tr>
                                <td style="font-size: 15px;">
                                    <input type="submit" name="update" value="Update" style="border:3px solid black ;background-color: greenyellow; color: black; font-size: 16px; text-decoration: none; padding: 10px 20px; border-radius: 5px; font-weight:bold; cursor: pointer;">
                                    <input type="submit" name="delete" value="Delete" style="border:3px solid black ;background-color: #FF2400; color: white; font-size: 16px; text-decoration: none; padding: 10px 20px; border-radius: 5px; font-weight:bold; cursor: pointer;margin-left:10px">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php

unset($_SESSION['pu1']);
unset($_SESSION['pu2']);

?>