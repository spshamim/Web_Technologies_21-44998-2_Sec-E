<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <table cellspacing="0" border="1" height="100%" width="100%">
        <tr>
            <td colspan="3"><img src="../assets/icon.png" alt="" srcset="" height="80px" width="150px">
                <a href="public_home.php" rel="noopener noreferrer" style="margin-left: 1136px;">Home</a>&nbsp&nbsp&nbsp&nbsp
                <a href="login.php" rel="noopener noreferrer">Login</a>&nbsp&nbsp&nbsp&nbsp
                <a href="registration.php" rel="noopener noreferrer">Registration</a>&nbsp&nbsp&nbsp
            </td>
        </tr>
        <tr>
            <td colspan="3" height="576px">
                <form action="../controller/signupcheck.php" method="post" style="display: flex; flex-direction: column; align-items: center;">
                    <fieldset>
                        <legend><b>Registration</b></legend>
                        Name :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="text" name="name" id=""><hr>
                        Email :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="email" name="email" id=""><hr>
                        User Name :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="text" name="username" id=""><hr>
                        Password :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="password" name="password" id=""><hr>
                        Confirm Password :
                        <input type="password" name="con-password" id=""><hr>
                        
                        <fieldset>
                            <legend>Gender</legend>
                            <input type="radio" name="gender" id="" value="Male">Male
                            <input type="radio" name="gender" id="" value="Female">Female
                            <input type="radio" name="gender" id="" value="Other">Other
                        </fieldset><hr>
            
                        <fieldset>
                            <legend>Date of Birth</legend>
                            <input type="number" name="day" id="" style="width:40px;">&nbsp/&nbsp<input type="number" name="month" id="" style="width:40px;">&nbsp/&nbsp<input type="number" name="year" id="" style="width:60px;"> &nbsp(dd/mm/yy)
                        </fieldset><hr>
                        <input type="submit" value="Submit">
                        <input type="reset" value="Reset">
                    </fieldset>
                </form><br>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">Copyright 2023</td>
        </tr>
    </table>
</body>
</html>
