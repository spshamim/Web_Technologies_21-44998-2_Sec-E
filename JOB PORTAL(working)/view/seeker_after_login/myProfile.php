<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    </head>

    <body>
        <div style="display: flex;">
        <?php
            include_once("Dashboard.php");
            require_once "../../model/userModel.php";

            $userID = $_COOKIE['sid'];
            $row = profileRetrieve($userID);

            $_SESSION['name']       = $row['name'];
            $_SESSION['prof_title'] = $row['prof_title'];
            $_SESSION['gender']     = $row['gender'];
            $_SESSION['age']        = $row['age'];
            $_SESSION['cgpa']       = $row['cgpa'];
            $_SESSION['salary']     = $row['salary'];
            $_SESSION['experience'] = $row['experience'];
            $_SESSION['website']    = $row['website'];
            $_SESSION['aboutMe']    = $row['aboutMe'];
            $_SESSION['phone']      = $row['phone'];
            $_SESSION['email']      = $row['email'];
            $_SESSION['address']    = $row['address'];
            $_SESSION['city']       = $row['city'];
            $_SESSION['google']     = $row['google'];
            $_SESSION['twitter']    = $row['twitter'];
            $_SESSION['facebook']   = $row['facebook'];
            $_SESSION['linkedin']   = $row['linkedin'];
        ?>
            <div style="background-color: #39A7FF; margin-top: 60px;margin-left: 05px; width: 900px; height: 750px;padding-left:60px">
                <div style="margin-top: 20px; margin-left:20px;">
                    <form action="../../controller/seekermyProfilecontrol.php" method="post">
                        <table>
                        <label style="font-size: 20px; color: red; text-align:center;margin-left:260px;"><b><?php echo isset($_SESSION['yess']) ? $_SESSION['yess'] : ''; ?></b></label><br>    
                        <label style="font-size: 25px;"><b>My Profile</b></label><br><br>
                            <tr>
                                <td style="font-size: 16px;">Name :</td>
                                <td><input type="text" name="name" style="height:30px; width:200px; border-radius: 5px" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>" ></td>
                                <td style="font-size: 16px;">Professional title :</td>
                                <td><input type="text" name="prof_title" style="height:30px; width:200px; border-radius: 5px" value="<?php echo isset($_SESSION['prof_title']) ? $_SESSION['prof_title'] : ''; ?>" ></td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px;">Gender :</td>
                                <td><input type="radio" name="gender" id="" value="Male" <?php if (isset($_SESSION['gender']) && $_SESSION['gender'] == "Male") { echo "checked"; } ?>>Male
                                    <input type="radio" name="gender" id="" value="Female" <?php if (isset($_SESSION['gender']) && $_SESSION['gender'] == "Female") { echo "checked"; } ?>>Female
                                    <input type="radio" name="gender" id="" value="Other" <?php if (isset($_SESSION['gender']) && $_SESSION['gender'] == "Other") { echo "checked"; } ?>>Other
                                </td>
                                <td style="font-size: 16px; text-align:right">Age :</td>
                                <td><input type="number" name="age" style="height:30px; width:200px; border-radius: 5px" value="<?php echo isset($_SESSION['age']) ? $_SESSION['age'] : ''; ?>" ></td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px;">CGPA :</td>
                                <td><input type="number" name="cgpa" style="height:30px; width:200px; border-radius: 5px" value="<?php echo isset($_SESSION['cgpa']) ? $_SESSION['cgpa'] : ''; ?>" ></td>
                                <td style="font-size: 16px;">Expected Salary :</td>
                                <td><input type="number" name="expt_salary" style="height:30px; width:200px; border-radius: 5px" value="<?php echo isset($_SESSION['salary']) ? $_SESSION['salary'] : ''; ?>" ></td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px;">Work Experience :</td>
                                <td><input type="number" name="work_exp" style="height:30px; width:200px; border-radius: 5px" value="<?php echo isset($_SESSION['experience']) ? $_SESSION['experience'] : ''; ?>" ></td>
                                <td style="font-size: 16px; text-align:right">Website :</td>
                                <td><input type="text" name="website" style="height:30px; width:200px; border-radius: 5px" value="<?php echo isset($_SESSION['website']) ? $_SESSION['website'] : ''; ?>" ></td>
                            </tr>
                            <tr>
                            <tr>
                                <td style="font-size: 16px;">About Yourself :</td>
                                <td colspan="3"><textarea name="about_u" id="" style="max-height: 385px; max-width: 570px; min-width: 570px; width: 570px; height: 80px; resize: both; overflow: auto; border: 2px solid black; border-radius: 5px;"><?php echo isset($_SESSION['aboutMe']) ? $_SESSION['aboutMe'] : ''; ?></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2"><br></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label style="font-size: 25px;">
                                    <b>Contact Information</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><br></td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px;">Phone Number :</td>
                                <td><input type="number" name="phn_num" style="height:30px; width:200px; border-radius: 5px" value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?>" ></td>
                                <td style="font-size: 16px;text-align:right">Email :</td>
                                <td><input type="email" name="email" style="height:30px; width:200px; border-radius: 5px" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" ></td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px;">Address :</td>
                                <td><input type="text" name="address" style="height:30px; width:200px; border-radius: 5px" value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : ''; ?>" ></td>
                                <td style="font-size: 16px;text-align:right">City :</td>
                                <td><input type="text" name="city" style="height:30px; width:200px; border-radius: 5px" value="<?php echo isset($_SESSION['city']) ? $_SESSION['city'] : ''; ?>" ></td>
                            </tr>
                            <tr>
                                <td colspan="2"><br></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label style="font-size: 25px;">
                                    <b>Social Link</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><br></td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px;">Google :</td>
                                <td><input type="text" name="google" style="height:30px; width:200px; border-radius: 5px" value="<?php echo isset($_SESSION['google']) ? $_SESSION['google'] : ''; ?>" /></td>
                                <td style="font-size: 16px;text-align:right">Twitter :</td>
                                <td><input type="text" name="twitter" style="height:30px; width:200px; border-radius: 5px" value="<?php echo isset($_SESSION['twitter']) ? $_SESSION['twitter'] : ''; ?>" /></td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px;">Facebook :</td>
                                <td><input type="text" name="facebook" style="height:30px; width:200px; border-radius: 5px" value="<?php echo isset($_SESSION['facebook']) ? $_SESSION['facebook'] : ''; ?>" /></td>
                                <td style="font-size: 16px;text-align:right">Linkedin :</td>
                                <td><input type="text" name="linkedin" style="height:30px; width:200px; border-radius: 5px" value="<?php echo isset($_SESSION['linkedin']) ? $_SESSION['linkedin'] : ''; ?>" /></td>
                            </tr>
                        </table><br>
                        <input type="submit" name="submit" style="border:3px solid black ;background-color: greenyellow; color: black; font-size: 16px; text-decoration: none; padding: 10px 20px; border-radius: 5px; margin-left:350px; font-weight:bold; cursor: pointer;" value="Update"></input><br>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php

unset($_SESSION['name']);
unset($_SESSION['prof_title']);
unset($_SESSION['gender']);
unset($_SESSION['age']);
unset($_SESSION['cgpa']);
unset($_SESSION['salary']);
unset($_SESSION['experience']);
unset($_SESSION['website']) ;
unset($_SESSION['aboutMe']);
unset($_SESSION['phone']);
unset($_SESSION['email']);
unset($_SESSION['address']);
unset($_SESSION['city']);
unset($_SESSION['google']);
unset($_SESSION['twitter']); 
unset($_SESSION['facebook']);  
unset($_SESSION['linkedin']);
unset($_SESSION['yess']);

?>