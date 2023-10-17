<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
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
                <form action="../controller/logincheck.php" method="POST" style="display: flex; flex-direction: column; align-items: center;">
                <fieldset>
                        <legend><b>LOGIN</b></legend>
                        <table>
                            <tr>
                                <td align="right"><label for="username">User Name :</label></td>
                                <td><input type="text" id="username" name="username"></td>
                            </tr>
                    
                            <tr>
                                <td align="right"><label for="password">Password :</label></td>
                                <td><input type="password" id="password" name="password"></td>
                            </tr>
                        </table>
                        <hr>
                        <input type="checkbox" name="rem" id=""> Remember me<br><br>
                        <input type="submit" value="Submit">
                </form>
                <a href="forgotpass.php">Forgot password</a><br>
                </fieldset>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">Copyright 2023</td>
        </tr>
    </table>
</body>
</html>
