<html>
    <head>
    <title>CONTROLLING COMPANY</title>
    <?php
        include_once "admin_header.php";
        require_once "../model/userModel.php";
        $companies = getCompany();
    ?>
    <link rel="stylesheet" href="../asset/css/admin_emp.css">
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
                                            <!-- employers -->
                <td>
                    <div id="d1">
                        <table width="1000px" id="t1">
                                <tr>
                                    <td colspan="4" id="td11"><b>Companies</b></td>
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
                                    <td id="td2"><?php echo $username;?></td>
                                    <td id="td2"><?php echo $companies[$i]['name'] ?></td>
                                    <td id="td2"><?php echo $companies[$i]['email'] ?></td>
                                    <td id="td2"><?php echo $companies[$i]['type'] ?></td>
                                    <td id="td2">
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