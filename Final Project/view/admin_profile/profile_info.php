<?php
    include_once("admin_profile_dashboard.php");
    require_once "../../model/userModel.php";
    session_start();

    $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
    $adminID = openssl_decrypt($_COOKIE['aid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);

    $row = profileRetrieveAdmin($adminID);

    $_SESSION['uname'] = $row['username'];
    $_SESSION['email'] = $row['email'];
?>

<html>
    <head>
        <title>PROFILE</title>
        <link rel="stylesheet" href="../../asset/css/admin_profile/profile_info.css">
    </head>
    <body>
        <div id="d1">
            <div id="d2">
                <label id="l1"><?php echo isset($_SESSION['unerr']) ? $_SESSION['unerr'] : ''; ?></label>
                <label id="l2"><?php echo isset($_SESSION['emerr']) ? $_SESSION['emerr'] : ''; ?></label>
                <label id="l3"><?php echo isset($_SESSION['su1']) ? $_SESSION['su1'] : ''; ?></label>
                <label id="l4"><?php echo isset($_SESSION['su2']) ? $_SESSION['su2'] : ''; ?></label>
                <div id="d3">
                    <form action="../../controller/admin_profile/profile_info_check.php" method="post">
                        <table>
                            <tr>
                                <td id="f01">User Name :</td>
                                <td><input id="inp" type="text" name="uname" value="<?php echo isset($_SESSION['uname']) ? $_SESSION['uname'] : ''; ?>" /></td>
                            </tr>
                            <tr>
                                <td id="f01">Email :</td>
                                <td><input id="inp" type="text" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"><br></td>
                            </tr>
                            <tr>
                                <td id="f01"><input type="submit" name="" value="Update" id="sub1"/></td>
                                <td></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php

unset($_SESSION['uname']);
unset($_SESSION['email']);
unset($_SESSION['su1']);
unset($_SESSION['su2']);
unset($_SESSION['unerr']);
unset($_SESSION['emerr']);

?>