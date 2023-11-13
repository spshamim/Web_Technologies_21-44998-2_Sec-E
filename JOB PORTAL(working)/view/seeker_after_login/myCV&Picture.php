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
            <div style="background: #39A7FF; margin-top: 60px; margin-left: 05px; width: 400px; height: 635px;">
                <div style="margin-top: 20px; margin-right: 20px;">
                    <div style="margin-top: 20px;">
                        <form>
                            <label><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCV</b></label><br><br>
                            <img src = "../../asset/cv.png" style="width: 120px; height: 120px; margin-left:30px"/><br><br>
                            <input type="file" name="file" value="" style="margin-left:30px"/>
                        </form><hr>
                        <input style="border:3px solid black ;background-color: greenyellow;margin-left:50px; color: black; font-size: 16px; text-decoration: none; padding: 10px 20px; border-radius: 5px;; font-weight:bold; cursor: pointer;" type="submit" name="submit" value="Submit" /><hr>
                    </div>
                    <br>
                    <div style="margin-top: 20px;">
                        <form>
                            <label><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPicture</b></label><br><br>
                            <img src = "../../asset/2.png" style="width: 120px; height: 120px; margin-left:30px"/><br><br>
                            <input type="file" name="file" value="" style="margin-left:30px" />
                        </form><hr>
                        <input style="border:3px solid black ;background-color: greenyellow; margin-left:50px;color: black; font-size: 16px; text-decoration: none; padding: 10px 20px; border-radius: 5px;; font-weight:bold; cursor: pointer;" type="submit" name="submit" value="Submit" />
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>