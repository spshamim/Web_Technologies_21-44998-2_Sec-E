<html>
    <head>
    <title>CONTROLLING COMPANY</title>
    <?php
        include_once "admin_header.php";
        require_once "../model/userModel.php";
        $companies = getCompany();
    ?>
        <style>
            .styled{
                background-color: greenyellow;
                color: black;
                border: 2px solid black;
                border-radius: 5px;
                padding: 5px;
                text-decoration: none;
                font-weight: bold;
                cursor: pointer;
                line-height: 35px;
            }
        </style>
    </head>

    <body>
        <table align="center" width="1000px" style="padding: 50px; font-family: Verdana;">
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
                                                <!-- employers -->
                <td>
                    <div style="background-color: #e6e6e6; padding: 50px">
                        <table width="1000px" style="text-align: center;">
                                <tr>
                                    <td colspan="4" style="font-size: 35px; font-weight: bold; color: #FF0000; text-align: center; padding-left:130px; padding-bottom:5px"><b>Companies</b></td>
                                </tr>
                                <tr>
                                    <th>UserName</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Remove</th>
                                </tr>
                                <?php
                                for($i=0;$i<count($companies);$i++) {
                                    $userID = $companies[$i]['userID'];
                                    $username = getUsernameByUserID($userID);
                                ?>
                                <tr>
                                    <td style="vertical-align: top"><?php echo $username;?></td>
                                    <td style="vertical-align: top"><?php echo $companies[$i]['name'] ?></td>
                                    <td style="vertical-align: top"><?php echo $companies[$i]['email'] ?></td>
                                    <td style="vertical-align: top"><?php echo $companies[$i]['type'] ?></td>
                                    <td style="vertical-align: top">
                                        <a href="../controller/admin_emp_controller.php?remove=<?=$userID?>" class="styled">Remove</a>
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