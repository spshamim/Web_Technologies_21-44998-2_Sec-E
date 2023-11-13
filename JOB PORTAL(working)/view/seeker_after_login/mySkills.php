<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Skills</title>
    </head>
    <body>
        <div style="display: flex">
            <?php include_once("Dashboard.php"); ?>
            <div style="background: #39A7FF; margin-top: 60px; margin-left: 05px; width: 600px; height: 200px;">
                <div style="margin-top: 20px; margin-left: 20px;">
                    <form>
                        <table>
                            <tr>
                                <td>Skill Name :</td>
                                <td><input style="height:35px; border:2px solid black; border-radius:10px" type="text" name="skill_name" value="" /></td>
                            </tr>
                            <tr>
                                <td>Skill Percentage :</td>
                                <td><input style="height:35px; border:2px solid black; border-radius:10px" type="number" name="skill_percent" value="" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"><br></td>
                            </tr>
                            <tr>
                                <td style="font-size: 15px;"><input type="submit" name="" value="Update" style="border:3px solid black ;background-color: greenyellow; color: black; font-size: 16px; text-decoration: none; padding: 10px 20px; border-radius: 5px;; font-weight:bold; cursor: pointer;" /></td>
                                <td></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
