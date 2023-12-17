<?php session_start(); ?>
<html>
<head>
    <title>Registration</title>
    <style>
        .styled{
            font-weight: bold;
            color: green;
        }
    </style>
    <script src="../js/email_check.js"></script>
    <script src="../js/registrationcheck.js"></script>
</head>
<body>
    <h1>Registration</h1><hr>

    <form action="../controller/regcheck.php" method="POST" onsubmit="return validateForm()">
    <table cellspacing="0">
        <tr>
            <td>Name : </td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td>Phone No. : </td>
            <td><input type="text" name="contact" id="contact"></td>
        </tr>
        <tr>
            <td>Email : </td>
            <td><input type="email" name="email" id="email" onblur="checkEmailAvailability()"></td>
            <td id="001" class="styled"></td>
        </tr>
        <tr>
            <td>Password : </td>
            <td><input type="password" name="pass" id="pass"></td>
        </tr>
        <tr>
            <td>Confirm Password : </td>
            <td><input type="password" name="cpass" id="cpass"></td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp</td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Register" id="reg" style="background-color: greenyellow; color:black; font-weight:bold;cursor: pointer"></td>
        </tr>        
    </table>
    </form>
    <label style="font-size: 15px; color: red;"><?php echo isset($_SESSION['error']) ? $_SESSION['error'] : ''; ?></label>
    <div id="errorList">

    </div>
    <hr><br>
    <a style="padding:6px;background-color: #BE3144; border-radius:5px;color:white; font-weight:bold;text-decoration:none; border:2px solid black" href='login.php'> Back </a>
</body>
</html>
<?php
    unset($_SESSION['error']);
?>