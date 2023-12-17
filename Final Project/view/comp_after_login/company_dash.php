<?php
    include_once "empheader.php";
    require_once ("../../model/userModel.php");
    
    $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
    $id = openssl_decrypt($_COOKIE['cid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
    $jobs = getjobs($id);
?>

<html>
<head>
    <link rel="stylesheet" href="../../asset/css/com_login/company_dash.css">
</head>

<body>
    <table align="center" width="1350px" id="tt1">
        <tr align="center">
            <td>
                <table>
                    <tr>
                        <td id="tdd1">
                            <a class="styled" href="emppostjob.php">Post a Job</a>
                        </td>
                        <td id="tdd1">
                            <a class="styled" href="view_jobs.php">View Jobs</a>
                        </td>
                        <td id="tdd1">
                            <a class="styled" href="view_candidate.php">Candidates Applied</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr align="center">
            <!-- employers -->
            <td>
                <div id="dd1">
                <label id="ll"><?php echo isset($_SESSION['jb1']) ? $_SESSION['jb1'] : ''; ?></label>
                <label id="ll"><?php echo isset($_SESSION['rrr1']) ? $_SESSION['rrr1'] : ''; ?></label>
                <label id="ll"><?php echo isset($_SESSION['rrr2']) ? $_SESSION['rrr2'] : ''; ?></label>
                <label id="ll"><?php echo isset($_SESSION['jb3']) ? $_SESSION['jb3'] : ''; ?></label>
                    <table width="1350px" id="ttt1">
                            <tr>
                                <td colspan="10" rowspan="2" id="tdd3"><b>Posted Jobs</b></td>
                            </tr>
                            <tr></tr>
                            <tr id="trr1">
                                <th>ID</th>
                                <th>Company Name</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Location</th>
                                <th>Experience</th>
                                <th>Vacancy</th>
                                <th>Salary</th>
                                <th>Operations</th>
                            </tr>
                            <?php
                                for($i=0;$i<count($jobs);$i++) {
                                $id = $jobs[$i]['id'];
                            ?>
                            <tr>
                                <td id="tdd2"><?php echo $id ?></td>
                                <td id="tdd2"><?php echo $jobs[$i]['comp_name'] ?></td>
                                <td id="tdd2"><?php echo $jobs[$i]['title'] ?></td>
                                <td id="tdd2"><?php echo $jobs[$i]['type'] ?></td>
                                <td id="tdd2"><?php echo $jobs[$i]['category'] ?></td>
                                <td id="tdd2"><?php echo $jobs[$i]['location'] ?></td>
                                <td id="tdd2"><?php echo $jobs[$i]['experience'] ?></td>
                                <td id="tdd2"><?php echo $jobs[$i]['vacancy'] ?></td>
                                <td id="tdd2"><?php echo $jobs[$i]['salary'] ?></td>
                                <td id="tdd2">
                                    <a href="../../controller/company/emp_dash_controller.php?remove=<?=$id?>" class="styled2">Remove</a>
                                    <a href="empupdatejob.php?edit=<?=$id?>" class="styled2">Edit</a>
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
    </tr>
</body>
</html>

<?php
    include_once ('../footer.php');
    unset($_SESSION["jb1"]);
    unset($_SESSION["jb3"]);
    unset($_SESSION["rrr1"]);
    unset($_SESSION["rrr2"]);
?>