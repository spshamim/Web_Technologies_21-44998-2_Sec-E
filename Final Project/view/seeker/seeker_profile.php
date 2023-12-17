<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../asset/css/seeker/seeker_profile.css">
        <title>Seeker Dashboard</title>
    </head>
    <body>
    <div style="display:flex">
            <?php
                include_once("Dashboard.php"); 
                include_once('../../model/userModel.php');
                $info = getAllSeekerAppliedJobs();
            ?>
            <div class="main-content">
                <h3 style="text-align: center">Applied Jobs</h3>
                <hr>
                <form>
                    <table class="table-st" cellspacing="0">
                        <tr class="tr-head">
                            <td class="head-td">Company Name</td>
                            <td class="head-td">Salary</td>
                            <td class="head-td">Title</td>
                            <td class="head-td">Category</td>
                            <td class="head-td">Type</td>
                            <td class="head-td">Option</td>
                        </tr>
                        <?php 
                            $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
                            $loggedInUserID = openssl_decrypt($_COOKIE['sid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

                            // Fetch data only for the logged-in user
                            for ($i = 0; $i < count($info); $i++) { 
                                if ($info[$i]['userID'] == $loggedInUserID) {
                                    $sID = $info[$i]['id'];
                        ?>
                                    <tr>
                                        <td class="td-value"><?=$info[$i]['comp_name']?></td>
                                        <td class="td-value"><?=$info[$i]['salary']?></td>
                                        <td class="td-value"><?=$info[$i]['title']?></td>
                                        <td class="td-value"><?=$info[$i]['category']?></td>
                                        <td class="td-value"><?=$info[$i]['type']?></td>
                                        <td class="td-value">
                                            <a href="../../controller/seeker_controller/Delete.php?delete=<?=$sID?>">Cancel</a>
                                        </td>
                                    </tr>   
                        <?php   } } ?>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>