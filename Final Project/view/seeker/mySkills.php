<?php

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/mySkills.js"></script>
    <link rel="stylesheet" href="../../asset/css/seeker/mySkills.css">
    <title>My Skills</title>
    </head>
    <body>
        <div style="display: flex">
            <?php
                include_once("Dashboard.php"); 
            ?>
            <div class="main-content">
                <div style="margin-top: 20px; margin-left: 20px;">
                    <form action="../../controller/seeker_controller/mySkillsControl.php" method="POST" onsubmit="return mySkillsValidation();">
                        <table class="form-table">
                            <tr>
                                <td style="font-size: 16px;">Skill Name :</td>
                                <td><input type="text" name="skill_name" id="skill_name" value="" class="form-input"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="error-td"><?php echo isset($_SESSION["skillname_err"]) ? $_SESSION["skillname_err"] : ''; ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px;">Skill Percentage :</td>
                                <td><input type="text" name="skill_percent" id="skill_percent" value="" class="form-input"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="error-td"><?php echo isset($_SESSION["skillpercent_err"]) ? $_SESSION["skillpercent_err"] : ''; ?></td>
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

    unset($_SESSION["skillname_err"]);
    unset($_SESSION["skillpercent_err"]);

?>