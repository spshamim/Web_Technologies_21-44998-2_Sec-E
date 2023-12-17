<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/myResumeDetails.js"></script>
    <link rel="stylesheet" href="../../asset/css/seeker/myResume.css">
    <title>Employee Resume</title>
    </head>
    <body onload='resumeDetails()'>
        <div style="display: flex;">
        <?php 
            include_once("Dashboard.php");
            require_once ("../../model/userModel.php");
            $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
            $userID = openssl_decrypt($_COOKIE['sid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
            $imgsrc = getImagePath($userID);
        ?>
        <div class="container">
            <div>       
                <table>
                    <tr>
                        <td width = 120px; class="img-td">
                            <?php
                                $imagePath = "../../asset/cv&picture/" . $imgsrc;
                                echo '<img src="' . $imagePath . '" alt="Image" style="width: 169px; height: 169px; border-radius: 0px; object-fit: cover;">';
                            ?>
                        </td>
                        <td style="width: 70px;"></td>
                        <td style="background-color:brown; width: 700px;">
                            <p id="name" class="p1-st"></p>
                            <p id="prof_title" class="pp-st"></p><hr>
                            <p id="about_me" class="pp-st"></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><hr class="hr-st"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p class="p-head">CONTACT INFORMATION</p>
                            <hr class="hr-body">
                            <br>
                            <p id="google" onclick="showContent('google')" class="link-st">Google</p>
                            <br>
                            <p id="twitter" onclick="showContent('twitter')" class="link-st">Twitter</p>
                            <br>
                            <p id="facebook" onclick="showContent('facebook')" class="link-st">Facebook</p>
                            <br>
                            <p id="linkedin" onclick="showContent('linkedin')" class="link-st">Linkedin</p>
                            <br>
                        </td>
                        <td>
                            <p class="p-head">ABOUT ME</p>
                            <hr class="hr-body">
                            <br>
                            <p id="gender" class="p-value"></p>
                            <p id="age" class="p-value"></p>
                            <p id="phone" class="p-value"></p>
                            <p id="email" class="p-value"></p>
                            <p id="website" class="p-value"></p>
                            <p id="address" class="p-value"></p>
                            <p id="city" class="p-value"></p>
                    
                        </td>
                    </tr>
                    <tr style="height: 40px;"></tr>
                    <tr>
                        <td colspan="2">
                            <p class="p-head">EDUCATION</p>
                            <hr class="hr-body">
                            <p id="deg_name" class="p-value"></p>
                            <p id="yeartoyear" class="p-value"></p>
                            <p id="ins_name" class="p-value"></p>
                        </td>
                        <td colspan="2">
                            <p class="p-head">PROFESSIONAL SKILLS</p>
                            <hr class="hr-body">
                            <p id="skill" class="p-value"></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p class="p-head">WORK EXPERIENCE</p>
                            <hr class="hr-body">
                            <p id="designation" class="p-value"></p>
                            <p id="year" class="p-value"></p>
                            <p id="description" class="p-value"></p>
                            <p id="experience" class="p-value"></p> 
                            
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        </div>
    </body>
</html>