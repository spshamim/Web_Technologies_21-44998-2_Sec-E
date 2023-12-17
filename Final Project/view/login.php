<html>
    <head>
        <title>LOGIN</title>
        <?php
            include_once "home_header.php";
            session_start();
        ?>
        <script src="../js/logincheckvalidation.js"></script>
        <link rel="stylesheet" href="../asset/css/login.css">
    </head>
    <body>
        <table width="100%" id="tt1">
           <tr>
               <td align="center" id="ttt1"> <!-- when company not approved -->
                    <?php
                        echo isset($_SESSION['queue']) ? $_SESSION['queue'] : '';
                        echo isset($_SESSION['unotexist']) ? $_SESSION['unotexist'] : '';
                    ?>
               </td>
            </tr>
            <tr>
                <td width="50%" align="center">

                    <form action="../controller/logincheck.php" method="POST" onsubmit="return loginValidation()">

                    <div align="left" id="dd1">
                    <label id="ll1">Log In</label>
                    <br><br><br>
                    <table width="100%">
                        <!-- username -->
                        <tr>
                            <td><label>Username: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="uname" id="uname" value="<?php echo isset($_SESSION['ntoshow']) ? $_SESSION['ntoshow'] : ''; ?>"></td>
                        </tr>
                        <!-- password -->
                        <tr>
                            <td><label>Password: &nbsp</label></td>
                            <td style="display: flex;"><input type="password" width="100%" name="pass" id="pass"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align="right" ><br>
                                <a href="forgot_pass.php" id="ff1">Forgot password ?</a>
                                <input type="submit" class="login" value="Login">
                            </td>
                        </tr>
                    </table>
                    </div>
                    </form>
                </td>
            </tr>
        </table>
        <div id="dd2">
                <ul id="errorList"></ul>
        </div>
    </body>
</html>
<?php
    include_once "footer.php";
    unset($_SESSION["queue"]);
    unset($_SESSION["unotexist"]);
?>