<?php
    session_start();
    include_once("../../model/userModel.php");
?>
<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/myProfile.js"></script>
    <link rel="stylesheet" href="../../asset/css/seeker/myProfile.css">
    <title>My Profile</title>
    </head>

    <body>
        <div style="display: flex;">
            <?php

                include_once("Dashboard.php");
                $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
                $userID = openssl_decrypt($_COOKIE['sid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
                $row = myProfileDetails($userID);

                $_SESSION['name']           = $row['name'];
                $_SESSION['prof_title']     = $row['prof_title'];
                $_SESSION['gender']         = $row['gender'];
                $_SESSION['age']            = $row['age'];
                $_SESSION['cgpa']           = $row['cgpa'];
                $_SESSION['expt_salary']    = $row['salary'];
                $_SESSION['work_exp']       = $row['experience'];
                $_SESSION['website']        = $row['website'];
                $_SESSION['about_u']        = $row['aboutMe'];
                $_SESSION['phn_num']        = $row['phone'];
                $_SESSION['email']          = $row['email'];
                $_SESSION['address']        = $row['address'];
                $_SESSION['city']           = $row['city'];
                $_SESSION['google']         = $row['google'];
                $_SESSION['twitter']        = $row['twitter'];
                $_SESSION['facebook']       = $row['facebook'];
                $_SESSION['linkedin']       = $row['linkedin'];
                
            ?>
            <div class="container">
                <div>
                    <form action="../../controller/seeker_controller/myProfileControl.php" method="POST" onsubmit=" return myProfileValidation()">
                        <table>
                            <label class="heading"><b>My Profile</b></label><br><br>
                            <tr>
                                <td class="label">Name :</td>
                                <td><input type="text" name="u_name" id="u_name"  value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>"></td>
                                <td class="label">Professional title :</td>
                                <td><input type="text" name="prof_title" id="prof_title" value="<?php echo isset($_SESSION['prof_title']) ? $_SESSION['prof_title'] : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["name_err"]) ? $_SESSION["name_err"] : ''; ?></td>
                                <td></td>
                                <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["profTitle_err"]) ? $_SESSION["profTitle_err"] : ''; ?></td>
                            </tr>
                            <tr>
                                <td class="label">Gender :</td>
                                <td><input type="radio" name="gender" id="gender" value="Male" <?php if (isset($_SESSION['gender']) && $_SESSION['gender'] == "Male") { echo "checked"; } ?> > Male
                                    <input type="radio" name="gender" id="gender" value="Female" <?php if (isset($_SESSION['gender']) && $_SESSION['gender'] == "Female") { echo "checked"; } ?> > Female
                                    <input type="radio" name="gender" id="gender" value="Other" <?php if (isset($_SESSION['gender']) && $_SESSION['gender'] == "Other") { echo "checked"; } ?> > Other
                                </td>
                                <td class="label">Age :</td>
                                <td><input type="number" name="age" id="age" value="<?php echo isset($_SESSION['age']) ? $_SESSION['age'] : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["gender_err"]) ? $_SESSION["gender_err"] : ''; ?></td>
                                <td></td>
                                <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["age_err"]) ? $_SESSION["age_err"] : ''; ?></td>
                            </tr>
                            <tr>
                                <td class="label">CGPA :</td>
                                <td><input type="number" name="cgpa" id="cgpa" value="<?php echo isset($_SESSION['cgpa']) ? $_SESSION['cgpa'] : ''; ?>"></td>
                                <td class="label">Expected Salary :</td>
                                <td><input type="number" name="expt_salary" id="expt_salary" value="<?php echo isset($_SESSION['expt_salary']) ? $_SESSION['expt_salary'] : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["cgpa_err"]) ? $_SESSION["cgpa_err"] : ''; ?></td>
                                <td></td>
                                <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["salary_err"]) ? $_SESSION["salary_err"] : ''; ?></td>
                            </tr>
                            <tr>
                                <td class="label">Work Experience :</td>
                                <td><input type="number" name="work_exp" id="work_exp" value="<?php echo isset($_SESSION['work_exp']) ? $_SESSION['work_exp'] : ''; ?>"></td>
                                <td style="font-size: 16px;">Website :</td>
                                <td><input type="text" name="website" id="website" value="<?php echo isset($_SESSION['website']) ? $_SESSION['website'] : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["experience_err"]) ? $_SESSION["experience_err"] : ''; ?></td>
                                <td></td>
                                <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["website_err"]) ? $_SESSION["website_err"] : ''; ?></td>
                            </tr>
                            <tr>
                                <td class="label">About Yourself :</td>
                                <td colspan="3"><textarea name="about_u" id="about_u"><?php echo isset($_SESSION['about_u']) ? $_SESSION['about_u'] : ''; ?></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3" style="font-size: 15px; color: red;"><?php echo isset($_SESSION["aboutMe_err"]) ? $_SESSION["aboutMe_err"] : ''; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"><br><br></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label class="heading">
                                    <b>Contact Information</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><br><br></td>
                            </tr>
                            <tr>
                                <td class="label">Phone Number :</td>
                                <td><input type="number" name="phn_num" id="phn_num" value="<?php echo isset($_SESSION['phn_num']) ? $_SESSION['phn_num'] : ''; ?>" ></td>
                                <td class="label">Email :</td>
                                <td><input type="email" name="email" id="email" readonly value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["phone_err"]) ? $_SESSION["phone_err"] : ''; ?></td>
                                <td></td>
                                <td style="font-size: 15px; color: red;"><?php //echo isset($_SESSION["email_err"]) ? $_SESSION["email_err"] : ''; ?></td>
                            </tr>
                            <tr>
                                <td class="label">Address :</td>
                                <td><input type="text" name="address" id="address" value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : ''; ?>"></td>
                                <td class="label">City :</td>
                                <td><input type="text" name="city" id="city" value="<?php echo isset($_SESSION['city']) ? $_SESSION['city'] : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["address_err"]) ? $_SESSION["address_err"] : ''; ?></td>
                                <td></td>
                                <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["city_err"]) ? $_SESSION["city_err"] : ''; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"><br><br></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label class="heading">
                                    <b>Social Link</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><br><br></td>
                            </tr>
                            <tr>
                                <td class="label">Google :</td>
                                <td><input type="text" name="google" id="google" value="<?php echo isset($_SESSION['google']) ? $_SESSION['google'] : ''; ?>"></td>
                                <td class="label">Twitter :</td>
                                <td><input type="text" name="twitter" id="twitter" value="<?php echo isset($_SESSION['twitter']) ? $_SESSION['twitter'] : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["google_err"]) ? $_SESSION["google_err"] : ''; ?></td>
                                <td></td>
                                <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["twitter_err"]) ? $_SESSION["twitter_err"] : ''; ?></td>
                            </tr>
                            <tr>
                                <td class="label">Facebook :</td>
                                <td><input type="text" name="facebook" id="facebook" value="<?php echo isset($_SESSION['facebook']) ? $_SESSION['facebook'] : ''; ?>"></td>
                                <td class="label">Linkedin :</td>
                                <td><input type="text" name="linkedin" id="linkedin" value="<?php echo isset($_SESSION['linkedin']) ? $_SESSION['linkedin'] : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["facebook_err"]) ? $_SESSION["facebook_err"] : ''; ?></td>
                                <td></td>
                                <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["linkedin_err"]) ? $_SESSION["linkedin_err"] : ''; ?></td>
                            </tr>
                            <tr>
                                <td colspan="4" style="font-size: 15px; color: red;"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="submit" value="update"></input></td>
                            </tr>
                        </table>
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
    unset($_SESSION['expt_salary']);
    unset($_SESSION['work_exp']);
    unset($_SESSION['website']) ;
    unset($_SESSION['about_u']);
    unset($_SESSION['phn_num']);
    unset($_SESSION['email']);
    unset($_SESSION['address']);
    unset($_SESSION['city']);
    unset($_SESSION['google']);
    unset($_SESSION['twitter']); 
    unset($_SESSION['facebook']);  
    unset($_SESSION['linkedin']);


    unset($_SESSION["name_err"]);
    unset($_SESSION["profTitle_err"]);
    unset($_SESSION["gender_err"]);
    unset($_SESSION["age_err"]);
    unset($_SESSION["cgpa_err"]);
    unset($_SESSION["salary_err"]);
    unset($_SESSION["experience_err"]);
    unset($_SESSION["website_err"]) ;
    unset($_SESSION["aboutMe_err"]);
    unset($_SESSION["phone_err"]);
    unset($_SESSION["email_err"]);
    unset($_SESSION["address_err"]);
    unset($_SESSION["city_err"]);
    unset($_SESSION["google_err"]);
    unset($_SESSION["twitter_err"]); 
    unset($_SESSION["facebook_err"]);  
    unset($_SESSION["linkedin_err"]);

?>