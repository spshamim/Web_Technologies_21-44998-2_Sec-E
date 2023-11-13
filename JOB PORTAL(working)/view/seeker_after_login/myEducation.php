<html>
    <head>
    <title>My Education</title>
    </head>
    <body>
        <div style="display: flex">
            <?php
                include_once("Dashboard.php");
                require_once "../../model/userModel.php";

                $userID = $_COOKIE['sid'];
                $row = eduRetrieve($userID);

                $_SESSION['deg_name'] = $row['deg_name'];
                $_SESSION['yty'] = $row['yeartoyear'];
                $_SESSION['ins_name'] = $row['ins_name'];
            ?>
            <div style="background: #39A7FF; margin-top: 60px; margin-left: 05px; width: 600px; height: 240px;">
                <label style="margin-left:150px; color:red; font-weight:bold"><?php echo isset($_SESSION['yesss']) ? $_SESSION['yesss'] : ''; ?></label>
                <div style="margin-top: 20px; margin-left: 20px;">
                    <form action="../../controller/myEducationControl.php" method="post">
                        <table>
                            <tr>
                                <td>Degree Name :</td>
                                <td><input style="height:35px;width:200px; border:2px solid black; border-radius:10px" type="text" name="deg_name" value="<?php echo isset($_SESSION['deg_name']) ? $_SESSION['deg_name'] : ''; ?>" /></td>
                            </tr>
                            <tr>
                                <td>Year :</td>
                                <td><input style="height:35px ;width:200px; border:2px solid black; border-radius:10px" type="text" name="year" value="<?php echo isset($_SESSION['yty']) ? $_SESSION['yty'] : ''; ?>" /></td>
                            </tr>
                            <tr>
                                <td>Institution Name :</td>
                                <td><input style="height:35px ;width:200px; border:2px solid black; border-radius:10px" type="text" name="inst_name" value="<?php echo isset($_SESSION['ins_name']) ? $_SESSION['ins_name'] : ''; ?>" /></td>
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

unset($_SESSION['deg_name']);
unset($_SESSION['yty']);
unset($_SESSION['ins-name']);
unset($_SESSION['yesss']);

?>
