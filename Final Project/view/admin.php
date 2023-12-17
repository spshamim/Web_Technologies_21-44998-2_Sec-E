<html>
    <head>
        <?php
            include_once "admin_header.php";
            require_once "../model/userModel.php";
            $inqueue = unapprovedCompany();
        ?>
        <link rel="stylesheet" href="../asset/css/admin.css">
    </head>

    <body>
        <table align="center" width="1000px" id="tt1">
            <tr align="center">
                <td>
                    <table width="100%">
                        <tr>
                            <td>
                                <a class="styled-link2" href="admin_admin.php">View Admins</a>
                            </td>
                            <td>
                                <a class="styled-link" href="admin_emp.php">View Companies</a>
                            </td>
                            <td>
                                <a class="styled-link" href="admin_sek.php">View Seekers</a>
                            </td>
                            <td>
                                <a class="styled-link" href="view_jobs_admin.php">View Jobs</a>
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
                    <div id="dd1">
                        <table width="1000px" id="tt2">
                                <tr>
                                    <td colspan="4" id="td001"><b>Pending Approval</b></td>
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