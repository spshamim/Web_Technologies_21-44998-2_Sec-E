<html>
    <head>
        <?php
            include_once "admin_header.php";
            require_once "../model/userModel.php";
            $inqueue = unapprovedCompany();
        ?>
        <style>
            .styled-link {
                background-color: greenyellow;
                color: black;
                border: 2px solid black;
                border-radius: 5px;
                padding: 5px 10px;
                text-decoration: none;
                font-weight: bold;
                margin-right: 10px;
            }
            .styled-button {
                background-color: greenyellow;
                color: black;
                border: 2px solid black;
                border-radius: 5px;
                text-decoration: none;
                font-weight: bold;
                cursor: pointer;
                line-height: 35px;
                padding: 5px;
            }
        </style>
    </head>

    <body>
        <table align="center" width="1000px" style="padding: 50px;  font-family: Verdana;">
            <tr align="center">
                <td>
                    <table width="100%">
                        <tr>
                            <td>
                                <a style="margin-left:83px;" class="styled-link" href="admin_admin.php">View Admins</a>
                            </td>
                            <td>
                                <a class="styled-link" href="admin_emp.php">View Companies</a>
                            </td>
                            <td>
                                <a class="styled-link" href="admin_sek.php">View Seekers</a>
                            </td>
                            <td>
                                <a class="styled-link" href="admin_job.php">View Jobs</a>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr align="center">
                                        <!-- approval section -->
                <td>
                    <div style="background-color: #e6e6e6; padding: 50px">
                        <table width="1000px" style="text-align: center;">
                                <tr>
                                    <td colspan="4" style="font-size: 35px; font-weight: bold; color: #FF0000; text-align: center; padding-left:180px; padding-bottom:5px"><b>Pending Approval</b></td>
                                </tr>
                                <tr>
                                    <th>UserName</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Approval</th>
                                </tr>
                                <?php
                                for($i=0; $i<count($inqueue); $i++) {
                                    $userID = $inqueue[$i]['userID'];
                                    $username = getUsernameByUserID($userID);
                                ?>
                                <tr>
                                    <td style="vertical-align: top"><?php echo $username;?></td>
                                    <td style="vertical-align: top"><?php echo $inqueue[$i]['name'] ?></td>
                                    <td style="vertical-align: top"><?php echo $inqueue[$i]['email'] ?></td>
                                    <td style="vertical-align: top"><?php echo $inqueue[$i]['type'] ?></td>
                                    <td style="vertical-align: top">
                                        <a href="../controller/ad_capproval.php?approve=<?=$userID?>" class="styled-button">Approve</a>
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