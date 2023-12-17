<html>
    <head>
        <title>ADMIN VIEW</title>
    <?php
        include_once "admin_header.php";
        require_once "../model/userModel.php";
        $admins = getAdmins();
    ?>
    <link rel="stylesheet" href="../asset/css/admin_admin.css">
    </head>
    <body>
        <table align="center" width="1000px" id="tt1">
            <tr align="center">
                <td>
                    <table>
                        <tr>
                            <td>
                                <a class="styled" href="admin.php">Go Back</a>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr align="center">
                <td>
                    <div id="dd1">
                        <table width="1000px" style="text-align: center;">
                                <tr>
                                    <td colspan="4" id="td001"><b>Admins</b></td>
                                </tr>
                                <tr>
                                    <th>UserName</th>
                                    <th>Email</th>
                                    <th>UserType</th>
                                    <th>Remove</th>
                                </tr>
                                <?php
                                for($i=0;$i<count($admins);$i++) {
                                    $userID = $admins[$i]['id'];
                                    $username = getUsernameByUserID($userID);
                                ?>
                                <tr>
                                    <td id="td002"><?php echo $username; ?></td>
                                    <td id="td002"><?php echo $admins[$i]['email'] ?></td>
                                    <td id="td002"><?php echo $admins[$i]['usertype'] ?></td>
                                    <td id="td002">
                                        <a href="../controller/admin_admin_controller.php?remove=<?=$userID?>" class="styled">Remove</a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>
<?php include_once "footer.php";?>