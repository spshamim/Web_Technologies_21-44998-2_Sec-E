<html>
    <head>
        <title>ADMIN HOMEPAGE</title>
        <?php
            require_once("../model/userModel.php");
            include_once('../controller/adminsession.php');
            $loginID=0;

            $adminId = $_COOKIE['aid'];

            // Retrieving the adminMetadata from the database
            $currentPicture = getCurrentPictureFilename($adminId);

            // Checking if $currentPicture is 0, and if so, then setting it to a default value
            // This application is for when Admin delete the photo fileMetaData will contain 0

            if ($currentPicture === '0') {
                $currentPicture = 'default_picture.png'; // this default_picture pre-stored in the folder
            }

            if(isset($_COOKIE['aid'])){

                $loginID=$_COOKIE['aid'];

            }
        ?>
    </head>
    <body>
        <div>
            <table width="100%" style="padding: 15px; background-color: #00a1de; font-family: Verdana">
                <tr>
                    <td width="" align="left"><img src="../asset/logo.png" alt="" srcset="" height="80" width="280"></td>
                    <td width="" align="left" style="font-size:25px; padding-right:300px; font-weight:bold">Welcome,&nbsp&nbsp" 
                        <?php
                            if(isset($_COOKIE['aid'])){
                                $row = ahNameShow($loginID);
                                echo $row['username'];
                            }
                            else {
                                echo "Unknown..!";
                            }
                        ?> "
                    </td>
                    <td>
                    <img src="../asset/admin_uploaded/<?php echo $currentPicture; ?>" alt="Current Profile Picture" style="height: 90px; width:110px">
                    </td>
                    <td width="" align="right">
                        <a href="admin_profile/profile_info.php" style="text-decoration : none; font-size:25px; color:black; font-weight:bold">Profile</a>
                    </td>
                    <td><div style="border-left: 6px solid black; height: 38px; left: 50%; margin-left:50px"></div></td>
                    <td width="" align="right">
                        <a href="../controller/logout.php?msg=ra" style="text-decoration : none; font-size:25px; color:black; font-weight:bold">Logout</a>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
