<html>
<head>
    <title>CONTROLLING SEEKER</title>
    <?php
        include_once "admin_header.php";
        include_once "../model/userModel.php"; // Include the userModel.php file
        $conn = getConnection();
        $jobSeekers = getJobSeekers(); // Retrieve the job seekers data
    ?>
    <style>
        .styled {
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
            <div style="background-color: #e6e6e6; padding: 50px; color: black;">
                <table width="1000px" style="text-align: center;">
                    <form action="../controller/admin_sek_controller.php" method="POST"> <!-- Update the form action -->
                        <tr>
                            <td colspan="4"
                                style="font-size: 35px; font-weight: bold; color: #FF0000; text-align: center; padding-left:42px; padding-bottom:5px">
                                <b>Job Seekers</b></td>
                        </tr>
                        <tr>
                            <th>UserName</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Remove</th>
                        </tr>
                        <?php
                            foreach ($jobSeekers as $rows) {
                                $userID = $rows['userID'];
                                $username = getUsernameByUserID($userID);
                        ?>
                            <tr>
                                <td style="vertical-align: top">
                                    <?php
                                        echo $username;
                                    ?>
                                </td>
                                <td style="vertical-align: top"><?php echo $rows['name'] ?></td>
                                <td style="vertical-align: top"><?php echo $rows['email'] ?></td>
                                <td style="vertical-align: top">
                                    <input type="submit" class="styled" id="" name="remove[<?php echo $userID; ?>]" value="Remove">
                                    <!-- name="remove[]" using an array, because there is multiple remove button
                                    so need to identify which button role is to be played by userID -->
                                </td>
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
</body>
<?php include_once "footer.php"; ?>
</html>