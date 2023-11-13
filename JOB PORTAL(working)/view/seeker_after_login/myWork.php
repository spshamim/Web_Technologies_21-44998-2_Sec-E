<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Work Experience</title>
    </head>
    <body>
        <div style="display: flex">
            <?php include_once("Dashboard.php"); ?>
            <div style="background: #39A7FF; margin-top: 60px; margin-left: 05px; width: 600px; height: 265px;">
                <div style="margin-top: 20px; margin-left: 20px;">
                    <form>
                        <table>
                            <tr>
                                <td>Designation:</td>
                                <td><input style="height:35px; border:2px solid black; border-radius:10px" type="text" name="designation" placeholder="Manager" value="" /></td>
                            </tr>
                            <tr>
                                <td>Year :</td>
                                <td><input style="height:35px; border:2px solid black; border-radius:10px" type="number" name="year1" value="" /> - <input style="height:35px; border:2px solid black; border-radius:10px" type="year2" name="deg_name" value="" /></td>
                            </tr>
                            <tr>
                                <td>Company Name :</td>
                                <td><input style="height:35px; border:2px solid black; border-radius:10px" type="text" name="comp_name" placeholder="Company name" value="" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"><br></td>
                            </tr>
                            <tr>
                                <td style="font-size: 15px;"><input type="submit" name="" value="Update" style="border:3px solid black ;background-color: greenyellow; color: black; font-size: 16px; text-decoration: none; padding: 10px 20px; border-radius: 5px;; font-weight:bold; cursor: pointer;"/></td>
                                <td></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
