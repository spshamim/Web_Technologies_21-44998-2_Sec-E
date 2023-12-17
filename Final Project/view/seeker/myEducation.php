<?php
    session_start();  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../../js/myEducation.js"></script>
        <link rel="stylesheet" href="../../asset/css/seeker/myEducation.css">
        <title>My Education</title>
    </head>
    <body>
        <div style="display: flex">
            <?php
                include("Dashboard.php");
            ?>
            <div class="main-content">
                <div style="margin-top: 20px; margin-left: 20px;">
                    <form action="../../controller/seeker_controller/myEducatuonControl.php" method="POST" onsubmit="return myEducationValidation()">
                        <table class="form-table">
                            <tr>
                                <td>Degree Name :</td>
                                <td><input type="text" name="deg_name" id="deg_name" value="<?php echo isset($_SESSION['degname']) ? $_SESSION['degname'] : ''; ?>" class="form-input"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="error-td"><?php echo isset($_SESSION["degname_err"]) ? $_SESSION["degname_err"] : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Year :</td>
                                <td><input type="number" name="year" id="year" value="<?php echo isset($_SESSION['year1']) ? $_SESSION['year1'] : ''; ?>" class="form-input"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="error-td"><?php echo isset($_SESSION["year_err"]) ? $_SESSION["year_err"] : ''; ?></td>
                            </tr>
                            <tr>
                                <td>Institution Name :</td>
                                <td><input type="text" name="inst_name" id="inst_name" value="<?php echo isset($_SESSION['instname']) ? $_SESSION['instname'] : ''; ?>" class="form-input"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="error-td"><?php echo isset($_SESSION["instname_err"]) ? $_SESSION["instname_err"] : ''; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="submit" value="Add" class="submit-btn"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php

    unset($_SESSION['degname']);
    unset($_SESSION['year1']);
    unset($_SESSION['instname']);

    unset($_SESSION["degname_err"]);
    unset($_SESSION["year_err"]);
    unset($_SESSION["instname_err"]);
?>
