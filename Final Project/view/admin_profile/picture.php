<?php
    include_once("admin_profile_dashboard.php");
    session_start();
?>

<html>
    <head>
        <title>PICTURE</title>
        <link rel="stylesheet" href="../../asset/css/admin_profile/picture.css">
    </head>
    <body>
        <div id="d1">
            <div id="d2">
                <label id="ll"><?php echo isset($_SESSION['pu1']) ? $_SESSION['pu1'] : ''; ?></label>
                <label id="ll"><?php echo isset($_SESSION['pu2']) ? $_SESSION['pu2'] : ''; ?></label>
                <div id="d3">
                    <form action="../../controller/admin_profile/picture_check.php" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td id="td003">Profile Picture :</td>
                            </tr>
                            <tr>
                                <td><img src="../../asset/2.png" alt="" id="pic2"></td>
                            </tr>
                            <tr><td>&nbsp</td></tr>
                            <tr>
                                <td>
                                    <input type="file" name="pic" value="">
                                </td>
                            </tr>
                            <tr><td>&nbsp</td></tr>
                            <tr>
                                <td id="td003">
                                    <input type="submit" name="update" value="Update" id="up">
                                    <input type="submit" name="delete" value="Delete" id="del">
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