<html>
    <head>
        <title>ADMIN VIEW</title>
    <?php
        include_once "admin_header.php";
        include_once "../model/userModel.php";
        $conn = getConnection();
        $admins = getAdmins();
    ?>
        <style>
            .styled{
                background-color: greenyellow;
                color: black;
                border: 2px solid black;
                border-radius: 5px;
                padding: 5px 10px;
                text-decoration: none;
                font-weight: bold;
                margin-right: 10px;
                cursor: pointer;
            }
        </style>
    </head>
    <body style="color: black; font-family: Verdana;">
        <table align="center" width="1000px" style="padding: 50px; color: black; font-family: Verdana;">
            <tr align="center">
                <td>
                    <table>
                        <tr>
                            <td>
                                <a class="styled" href="admin.php">Go Back</a>
                            </td>
                            
                        </tr>
                    </table>
                </td>
            </tr>
            <tr align="center">
                <td>
                    <div style="background-color: #e6e6e6; padding: 50px; color:black;">
                        <table width="1000px" style="text-align: center;">
                            <form action="../controller/admin_admin_controller.php" method="POST">
                                <tr>
                                <td colspan="4" style="font-size: 35px; font-weight: bold; color: #FF0000; text-align: center; padding-left:70px; padding-bottom:5px"><b>Admins</b></td>
                                </tr>
                                <tr>
                                    <th>UserName</th>
                                    <th>Email</th>
                                    <th>UserType</th>
                                    <th>Remove</th>
                                </tr>
                                <?php
                                    foreach ($admins as $rows) {
                                        $userID = $rows['id'];
                                        $username = getUsernameByUserID($userID);
                                ?>
                                <tr>
                                    <td style="vertical-align: top">
                                    <?php
                                        echo $username;
                                    ?>
                                    </td>
                                    <td style="vertical-align: top"><?php echo $rows['email'] ?></td>
                                    <td style="vertical-align: top"><?php echo $rows['usertype'] ?></td>
                                    <td style="vertical-align: top"><input class="styled" type="submit" id="" name="remove[<?php echo $userID; ?>]" value="Remove"></td>
                                    <!-- name="remove[]" using an array, because there is multiple remove button
                                    so need to identify which button role is to be played by userID -->
                                </tr>
                                <?php
                                }
                                ?>
                            </form>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
        </tr>
        </table>
    </body>
    <?php include_once "footer.php";?>
</html>