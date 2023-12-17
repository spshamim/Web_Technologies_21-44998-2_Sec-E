<html>
<head>
    <title>Log In</title>
    <script src="../js/loginCheck.js"></script>
</head>
<body>
    <h1>LOGIN</h1><hr>
    <form action="../controller/logincheck.php" method="POST" onsubmit="return loginValidation()">
    <table cellspacing="0">
        <tr>
            <td>Email : </td>
            <td><input type="email" name="email" id="email"></td>
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
    </form>
    <div id="errorList">
        
    </div>
    <hr> 
    <br>
    <a style="padding:6px;background-color: #BE3144; border-radius:5px;color:white; font-weight:bold;text-decoration:none; border:2px solid black" href='personreg.php'> Registration </a>
</body>
</html>