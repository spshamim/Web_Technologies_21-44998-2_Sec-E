<?php
    include_once('../../controller/seeker_controller/seekersession.php');   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../asset/css/seeker/Dashboard.css">
    <title>Employee Dashboard</title>
    </head>
    <body>
        <div style="display:flex">
            <div class="dashboard-container">
                <from>
                <table style="width: 100%; margin: 0; padding: 0;" cellspacing="0">
                        <tr>
                            <td>
                                <ul style="list-style-type: none; padding: 0; margin: 0;">
                                    <li class="dashboard-item">
                                        <a href="seeker_profile.php">Dashboard</a>
                                    </li>
                                    <li class="dashboard-item">
                                        <a href="seeker_notification.php">Notifications</a>
                                    </li>
                                    <li class="dashboard-item">
                                        <a href="myProfile.php">Personal Info</a>
                                    </li>
                                    <li class="dashboard-item">
                                        <a href="myEducation.php" >Education</a>
                                    </li>
                                    <li class="dashboard-item">
                                        <a href="mySkills.php">Skill</a>
                                    </li>
                                    <li class="dashboard-item">
                                        <a href="myWork.php">Work Experience</a>
                                    </li>
                                    <li class="dashboard-item">
                                        <a href="myCV&Picture.php">Upload CV/Picture</a>
                                    </li>
                                    <li class="dashboard-item">
                                        <a href="myChangePassword.php">Change Password</a>
                                    </li>
                                    <li class="dashboard-item">
                                        <a href="myResume.php">My Resume</a>
                                    </li>
                                    <li class="dashboard-item">
                                        <a href="myJobSearch.php">Job Search</a>
                                    </li>
                                    <li class="dashboard-item">
                                        <a href="../../controller/logout.php?msg=rs">LogOut</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </from>
            </div>
        </div>
    </body>
</html>