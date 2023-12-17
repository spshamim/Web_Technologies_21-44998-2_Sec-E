<?php
    session_start();  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/myWork.js"></script>
    <link rel="stylesheet" href="../../asset/css/seeker/myWork.css">
    <title>My Work Experience</title>
    </head>
    <body>
        <div style="display: flex">
            <?php 
                include_once("Dashboard.php"); 
            ?>
            <div class="main-content">
                <div style="margin-top: 20px; margin-left: 20px;">
                    <form action="../../controller/seeker_controller/myWorkControl.php" method="POST" onsubmit="return myWorkValidation()">
                        <table class="form-table">
                            <tr>
                                <td style="font-size: 16px;">Designation:</td>
                                <td><input type="text" name="designation" id="designation" value="" class="form-input"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="error-td"><?php echo isset($_SESSION["designationtitle_err"]) ? $_SESSION["designationtitle_err"] : ''; ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px;">Year :</td>
                                <td><input type="number" name="year1" id="year1" value="" class="form-input"> - 
                                <input type="number" name="year2" id="year2"  value="" class="form-input"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="error-td"><?php echo isset($_SESSION["year_err"]) ? $_SESSION["year_err"] : ''; ?></td>
                            </tr>
                            <tr style="font-size: 16px;">
                                <td>Company Name :</td>
                                <td><input type="text" name="comp_name" id="comp_name" value="" class="form-input"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="error-td"><?php echo isset($_SESSION["compname_err"]) ? $_SESSION["compname_err"] : ''; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="" value="Add" class="submit-btn"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php

    unset($_SESSION["designationtitle_err"]);
    unset($_SESSION["year_err"]);
    unset($_SESSION["compname_err"]);

?>