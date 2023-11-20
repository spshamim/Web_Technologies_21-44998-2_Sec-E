<html>
<head>
    <title>Log In</title>
    <script src="../js/logincc.js"></script>
</head>
<body>
    <h1>LOGIN</h1><hr>
    <table cellspacing="0">
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
            <td><input type="submit" value="Log in" style="background-color: greenyellow; color:black; font-weight:bold;cursor: pointer" onclick="logincheck()"></td>
        </tr>
    </table>
    <div id="error-container" style="color: red;"></div>
    <hr> 
    <br>
    <a style="padding:6px;background-color: #BE3144; border-radius:5px;color:white; font-weight:bold;text-decoration:none; border:2px solid black" href='  home.php'> Back </a>
</body>
</html>