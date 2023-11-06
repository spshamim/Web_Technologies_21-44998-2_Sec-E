<html>
    <head>
        <?php
            include_once "admin_header.php";
            include_once "../model/userModel.php";
            $conn = getConnection();
            $inqueue = unapprovedCompany(); // retrieving unapproved company
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
                    </table>
                </td>
            </tr>
            <tr align="center">
                <!-- approval section -->
                <td>
                    <div style="background-color: #e6e6e6; padding: 50px; color:black;">
                        <table width="1000px" style="text-align: center;">
                            <form action="../controller/ad_capproval.php" method="POST">
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
                                foreach ($inqueue as $rows) {
                                    $userID = $rows['userID'];
                                    $username = getUsernameByUserID($userID);
                                ?>
                                <tr>
                                    <td style="vertical-align: top">
                                        <?php
                                            echo $username;
                                        ?>
                                    </td>
                                    <td style="vertical-align: top"><?php echo $rows['name'] ?></td> <!-- data from company table -->
                                    <td style="vertical-align: top"><?php echo $rows['email'] ?></td> <!-- data from company table -->
                                    <td style="vertical-align: top"><?php echo $rows['type'] ?></td> <!-- data from company table -->
                                    <td style="vertical-align: top"><input type="submit" class="styled-button" id="" name="approve[<?php echo $userID; ?>]" value="Approve"></td>
                                    <!-- name="approve[]" using an array, because there is multiple approve button
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