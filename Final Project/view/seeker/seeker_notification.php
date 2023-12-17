<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../asset/css/seeker/seeker_notification.css">
    <title>Seeker Notifications</title>
</head>
<body>
    <div style="display:flex">
        <?php
            include_once("Dashboard.php"); 
            include_once('../../model/userModel.php');
            $info = getAllSeekerApprovedJobs();
            $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
            $userID = openssl_decrypt($_COOKIE['sid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
        ?>
        <div class="main-content">
            <form>
                <div class="th-content">
                    <table class="table-st">
                        <tr>
                            <td class="head-td">Company Name</td>
                            <td class="head-td">Company Email</td>
                            <td class="head-td">Contact Number</td>
                            <td class="head-td">Title</td>
                            <td class="head-td">Status</td>
                        </tr>
                    </table>
                </div>
                <table class="table-st">
                    <tr>
                        <td colspan="5"><hr></td>
                    </tr>
                    <?php for($i=0; $i<count($info); $i++) { 
                            if($info[$i]['userID'] == $userID)
                            {
                                $sID = $info[$i]['id'];
                    ?>
                        <tr>
                            <td class="td-value"><?=$info[$i]['comp_name']?></td>
                            <td class="td-value"><?= $info[$i]['comp_mail'] !== null ? $info[$i]['comp_mail'] : '-----' ?></td>
                            <td class="td-value"><?= $info[$i]['comp_number'] !== null ? $info[$i]['comp_number'] : '-----' ?></td>
                            <td class="td-value"><?=$info[$i]['title']?></td>
                            <td class="td-value2 <?php echo ($info[$i]['approval'] == 1) ? 'accepted' : 'not-accepted'; ?>">
                                <?php
                                    if ($info[$i]['approval'] == 1) {
                                        echo "Accepted";
                                        echo "<br>";
                                        echo "now contact through email";
                                    } else {
                                        echo "Not Approved";
                                    }
                                ?>
                            </td>
                        </tr>   
                    <?php } }?>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
