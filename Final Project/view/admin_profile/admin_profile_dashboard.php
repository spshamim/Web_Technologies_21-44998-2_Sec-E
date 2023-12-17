<?php include_once "../../controller/adminsession.php"; ?>

<html>
    <head>
    <title>ADMIN PROFILE</title>
    <link rel="stylesheet" href="../../asset/css/admin_profile/dash.css">
    </head>

    <body>
    <table width=100% cellspacing="0">
    <tr>
        <td>
            <ul id="ull">
                <li id="lli">
                    <a href="profile_info.php" id="a_link">Personal Info</a>
                </li><br>
                <li id="lli">
                    <a href="passChange.php" id="a_link">Change Password</a>
                </li><br>
                <li id="lli">
                    <a href="picture.php" id="a_link">Picture</a>
                </li><br>
                <li id="lli">
                    <a href="../admin.php" id="a_link">Back</a>
                </li>
            </ul>
        </td>
    </tr>
    </table>
</body>
</html>