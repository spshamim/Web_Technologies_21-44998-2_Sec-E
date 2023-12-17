<?php
    session_start();
    include_once ("home_header.php"); 
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../asset/css/seeker/SekRegistration.css">
        <script src="../js/sekRegistration.js"></script>
        <title>Seeker registration</title>
        
    </head>

    <body>
        <form action="../controller/seeker_controller/SekRegistrationControl.php" method="POST" onsubmit="return sekregValidation()">
            <div class="main-content">
            <label class="label-st">Register as a Job Seeker!</label>
            <br><br>
                <table width="100%" class="form-table">
                    <!-- Name -->
                    <tr>
                        <td>Name :</td>
                        <td><input type="text" name="sek_name" id ="sek_name" value="<?php echo isset($_SESSION['sekname']) ? $_SESSION['sekname'] : ''; ?>" class="form-input"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="error-td"><?php echo isset($_SESSION["sekname_err"]) ?  $_SESSION["sekname_err"] : '' ;?></td>
                        <td></td>
                    </tr>
                    <!-- username -->
                    <tr>
                        <td>User Name :</td>
                        <td><input type="text" name="user_name" id="user_name" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" class="form-input"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="error-td"><?php echo isset($_SESSION["username_err"]) ?  $_SESSION["username_err"] : '' ;?></td>
                        <td></td>
                    </tr>
                    <!-- password -->
                    <tr>
                        <td>Password :</td>
                        <td><input type="password" name="sek_pass" id="sek_pass" value="" class="form-input"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="error-td"><?php echo isset($_SESSION["sekpass_err"]) ?  $_SESSION["sekpass_err"] : '' ;?></td>
                        <td></td>
                    </tr>
                    <!-- confirm password -->
                    <tr>
                        <td>Confirm Password :</td>
                        <td><input type="password" name="conf_pass" id="scp" class="form-input"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="error-td"><?php echo isset($_SESSION["sekconfpass_err"]) ?  $_SESSION["sekconfpass_err"] : '' ;?></td>
                        <td></td>
                    </tr>
                    <!-- email -->
                    <tr>
                        <td>Email :</td>
                        <td><input type="email" name="email" id="email" value="<?php echo isset($_SESSION['sekemail']) ? $_SESSION['sekemail'] : ''; ?>" class="form-input"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="error-td"><?php echo isset($_SESSION["sekemail_err"]) ?  $_SESSION["sekemail_err"] : '' ;?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Register" class="submit-btn"></td>
                    </tr>
                </table>
            </div>
        </form>
        <?php
            include_once ("footer.php");

            unset($_SESSION['sekname']);
            unset($_SESSION['username']);
            unset($_SESSION['sekemail']);

            unset($_SESSION['sekname_err']);
            unset($_SESSION['username_err']);
            unset($_SESSION['sekemail_err']);
            unset($_SESSION['sekpass_err']);
            unset($_SESSION['sekconfpass_err']);
        ?>
    </body>
</html>