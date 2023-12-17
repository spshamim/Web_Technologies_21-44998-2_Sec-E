<html>
    <head>
        <title>CONTROLLING SEEKER</title>
        <?php
            include_once "admin_header.php";
            require_once "../model/userModel.php";
            $jobSeekers = getJobSeekers();
        ?>
        <link rel="stylesheet" href="../asset/css/admin_sek.css">
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
                        <table width="1000px" id="tt2">
                                <tr>
                                    <td colspan="4" id="td001"><b>Job Seekers</b></td>
                                </tr>
                                <tr>
                                    <th>UserName</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Remove</th>
                                </tr>
                                <?php
                                for($i=0;$i<count($jobSeekers);$i++) {
                                    $userID = $jobSeekers[$i]['userID'];
                                    $username = getUsernameByUserID($userID);
                                ?>
                                <tr>
                                    <td id="tdX"><?php echo $username;?> </td>
                                    <td id="tdX"><?php echo $jobSeekers[$i]['name'] ?></td>
                                    <td id="tdX"><?php echo $jobSeekers[$i]['email'] ?></td>
                                    <td id="tdX">
                                        <a href="../controller/admin_sek_controller.php?remove=<?=$userID?>" class="styled">Remove</a>
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
<?php include_once "footer.php"; ?>