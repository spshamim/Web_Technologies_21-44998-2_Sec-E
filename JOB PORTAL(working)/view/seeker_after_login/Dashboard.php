<?php
    include_once "../../controller/seekersession.php";
    session_start(); // for further
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seeker Dashboard</title>
    </head>
    <body style="color: black; font-family:Verdana, Geneva, Tahoma, sans-serif;">
        <div style="display:flex">
            <div style="background-color: #39A7FF; margin-top: 60px; margin-left: 160px; padding: 13px; width: 200px; height: 450px;">
                <table style="width: 100%; margin: 0; padding: 0;" cellspacing="0">
                        <tr>
                            <td>
                                <ul style="list-style-type: none; padding: 0; margin: 0;">
                                    <li style="padding: 10px; margin: 2px; text-align: left; background-color: white; border:2px solid greenyellow; border-radius:5px">
                                        <a href="seeker_profile.php" style="text-decoration: none; color: black;">Dashboard</a>
                                    </li>
                                    <li style="padding: 10px; margin: 2px; text-align: left; background-color: white;border:2px solid greenyellow; border-radius:5px">
                                        <a href="myProfile.php" style="text-decoration: none; color: black;">Personal Info</a>
                                    </li>
                                    <li style="padding: 10px; margin: 2px; text-align: left; background-color: white;border:2px solid greenyellow; border-radius:5px">
                                        <a href="myEducation.php" style="text-decoration: none; color: black;">Education</a>
                                    </li>
                                    <li style="padding: 10px; margin: 2px; text-align: left; background-color: white;border:2px solid greenyellow; border-radius:5px">
                                        <a href="mySkills.php" style="text-decoration: none; color: black;">Skill</a>
                                    </li>
                                    <li style="padding: 10px; margin: 2px; text-align: left; background-color: white;border:2px solid greenyellow; border-radius:5px">
                                        <a href="myWork.php" style="text-decoration: none; color: black;">Work Experience</a>
                                    </li>
                                    <li style="padding: 10px; margin: 2px; text-align: left; background-color: white;border:2px solid greenyellow; border-radius:5px">
                                        <a href="myCV&Picture.php" style="text-decoration: none; color: black;">Upload CV/Picture</a>
                                    </li>
                                    <li style="padding: 10px; margin: 2px; text-align: left; background-color: white;border:2px solid greenyellow; border-radius:5px">
                                        <a href="myChangePassword.php" style="text-decoration: none; color: black;">Change Password</a>
                                    </li>
                                    <li style="padding: 10px; margin: 2px; text-align: left; background-color: white;border:2px solid greenyellow; border-radius:5px">
                                        <a href="myResume.php" style="text-decoration: none; color: black;">My Resume</a>
                                    </li>
                                    <li style="padding: 10px; margin: 2px; text-align: left; background-color: white;border:2px solid greenyellow; border-radius:5px">
                                        <a href="#" style="text-decoration: none; color: black;">Job Search</a>
                                    </li>
                                    <li style="padding: 10px; margin: 2px; text-align: left; background-color: white;border:2px solid greenyellow; border-radius:5px">
                                        <a href="../../controller/logout.php?msg=rs" style="text-decoration: none; color: black;">LogOut</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </table>
            </div>
        </div>
    </body>
</html>