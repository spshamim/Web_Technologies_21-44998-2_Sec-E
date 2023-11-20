<?php
    require_once("../controller/adminsession.php");
?>

<html>
<head>
    <title>Registration</title>
    <script src="../js/registration.js"></script>
</head>
<body>
    <h1>Registration</h1><hr>

    <table cellspacing="0">
        <tr>
            <td>Employeer Name : </td>
            <td><input type="text" name="empname" id="empname"></td>
        </tr>
        <tr>
            <td>Company Name : </td>
            <td><input type="text" name="compname" id="compname"></td>
        </tr>
        <tr>
            <td>Contact No. : </td>
            <td><input type="text" name="contact" id="contact"></td>
        </tr>
        <tr>
            <td>User Name : </td>
            <td><input type="text" name="uname" id="uname"></td>
        </tr>
        <tr>
            <td>Password : </td>
            <td><input type="password" name="pass" id="pass"></td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp</td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Register" id="reg" style="background-color: greenyellow; color:black; font-weight:bold;cursor: pointer" onclick="registration()"></td>
        </tr>        
    </table>

    <div id="error-container" style="color: red;"></div>

    <hr><br>
    <a style="padding:6px;background-color: #BE3144; border-radius:5px;color:white; font-weight:bold;text-decoration:none; border:2px solid black" href='admin.php'> Back </a>
</body>
</html>