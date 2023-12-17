<?php
    session_start();  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../../js/myChangePassword.js"></script>
        <link rel="stylesheet" href="../../asset/css/seeker/myChangePassword.css">
        <title>Change Password</title>
    </head>
    <body>
        <div style="display: flex;">
            <?php 
                include_once("Dashboard.php");
            ?>
            <div class="main-content">
                <div style="margin-top: 20px; margin-left: 20px;">
                    <form action = "../../controller/seeker_controller/myChangepassControl.php" method ="POST" onsubmit="return myChangePassValidation()">
                        <table class="form-table">
                            <tr>
                                <td>Current Password :</td>
                                <td><input type="password" name="curr_pass" id="curr_pass" value="" class="form-input"></td>
                            </tr>
                            <tr>
                                <td>New Password :</td>
                                <td><input type="password" name="new_pass" id="new_pass" value="" class="form-input"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="error-td"><?php echo isset($_SESSION["newpass_err"]) ?  $_SESSION["newpass_err"] : '' ;?></td>
                            </tr>
                            <tr>
                                <td>Confirm Password :</td>
                                <td><input type="password" name="conff_pass" id="conff_pass" value="" class="form-input"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="error-td"><?php echo isset($_SESSION["conffpass_err"]) ?  $_SESSION["conffpass_err"] : '' ;?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="error-td"><?php echo isset($_SESSION["all_error"]) ?  $_SESSION["all_error"] : '' ;?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="error-td"><?php echo isset($_SESSION["error"]) ?  $_SESSION["error"] : '' ;?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="success-td"><?php echo isset($_SESSION["message"]) ? $_SESSION["message"] : '' ;?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="" value="Update" class="submit-btn"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
                        
    unset($_SESSION["newpass_err"]);  
    unset($_SESSION["conffpass_err"]);
    unset($_SESSION["all_error"]);
    unset($_SESSION["error"]);
    unset($_SESSION["message"]);

?>
