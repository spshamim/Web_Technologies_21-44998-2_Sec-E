<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../asset/css/seeker/myCV&Picture.css">
    <title>My CV & Picture</title>
    </head>
    <body>
        <div style="display: flex">
            <?php
                include_once("Dashboard.php"); 
            ?>
            <div class="main-content">
            <div class="sub-content">
                    <form action = "../../controller/seeker_controller/upload_CV.php" method ="POST" enctype="multipart/form-data">
                        <label><b>CV</b></label>
                        <img src = "../../asset/UploadPic.png" alt = "Upload Your CV" class="img"><br>
                        <input type="file" name="cv" value="" /><br><br>
                        <input type="submit" name="submit" value="Upload-CV" class="submit-btn">
                        <p class="error-td"><?php echo isset($_SESSION["cv_empty"]) ? $_SESSION["cv_empty"] : '' ;?></p>
                        <p class="error-td"><?php echo isset($_SESSION["cv_error"]) ? $_SESSION["cv_error"] : '' ;?></p>
                        <p class="success-td"><?php echo isset($_SESSION["cv_message"]) ? $_SESSION["cv_message"] : '' ;?></p><br>
                    </form><hr>   
                </div>
                <br>
                <div class="sub-content">
                    <form action = "../../controller/seeker_controller/upload_Picture.php" method ="POST" enctype="multipart/form-data">
                        <label><b>Picture</b></label>
                        <img src = "../../asset/UploadPic.png" alt = "Upload Your Profile Picture" class="img"><br>
                        <input type="file" name="picture" value="" /><br><br>
                        <input type="submit" name="submit" value="Upload-Picture" class="submit-btn">
                        <p class="error-td"><?php echo isset($_SESSION["pic_empty"]) ? $_SESSION["pic_empty"] : '' ;?></p>
                        <p class="error-td"><?php echo isset($_SESSION["pic_error"]) ? $_SESSION["pic_error"] : '' ;?></p>
                        <p class="success-td"><?php echo isset($_SESSION["pic_message"]) ? $_SESSION["pic_message"] : '' ;?></p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php

    unset($_SESSION["cv_empty"]);
    unset($_SESSION["cv_error"]);
    unset($_SESSION["cv_message"]);

    unset($_SESSION["pic_empty"]);
    unset($_SESSION["pic_error"]);
    unset($_SESSION["pic_message"]);

?>