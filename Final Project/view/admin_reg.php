<html>
    <head>
        <title>ADMIN REGISTRATION</title>
        <?php
            include_once "home_header.php";
            session_start();
        ?>
        <link rel="stylesheet" href="../asset/css/admin_reg.css">
        <script src="../js/adminregvalidation.js"></script>
    </head>
    <body>
        <table width="100%" id="tt1">
            <tr>
                <td width="50%" align="center">
                    <form action="../controller/admincheck.php" method="POST" onsubmit="return adminValidation()">
                        <div align="left" id="dd1">
                            <label id="ll1">Register Admin</label>
                            <br><br><br>
                            <table width="100%">
                                <!-- username -->
                                <tr>
                                    <td><label id="ll2">Username: &nbsp</label></td>
                                    <td id="fl1"><input type="text" width="100%" name="uname" id="uname" value="<?php echo isset($_SESSION['auname']) ? $_SESSION['auname'] : ''; ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td id="errTD"><?php echo isset($_SESSION['auerr']) ? $_SESSION['auerr'] : ''; ?></td>
                                </tr>
                                <!-- password -->
                                <tr>
                                    <td><label id="ll2">Password: &nbsp</label></td>
                                    <td id="fl1"><input type="password" width="100%" name="pass" id="pass"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td id="errTD"><?php echo isset($_SESSION['aperr']) ? $_SESSION['aperr'] : ''; ?></td>
                                </tr>
                                <!-- confirm password -->
                                <tr>
                                    <td width="210px"><label id="ll2">Confirm Password: &nbsp</label></td>
                                    <td id="fl1"><input type="password" width="100%" name="cpass" id="cpass"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td id="errTD"><?php echo isset($_SESSION['acperr']) ? $_SESSION['acperr'] : ''; ?></td>
                                </tr>
                                <!-- email -->
                                <tr>
                                    <td><label id="ll2">Email: &nbsp</label></td>
                                    <td id="fl1"><input type="text" width="100%" name="email" id="email" value="<?php echo isset($_SESSION['aemail']) ? $_SESSION['aemail'] : ''; ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td id="errTD"><?php echo isset($_SESSION['aemerr']) ? $_SESSION['aemerr'] : ''; ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td align="right"><br><input type="submit" class="b1" name="adminreg" value="Register"></td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
        <div id="dd3">
                <ul id="errorList"></ul>
        </div>
    </body>
</html>
<?php
    include_once "footer.php";
    unset($_SESSION['auerr']);
    unset($_SESSION['aperr']);
    unset($_SESSION['acpnerr']);
    unset($_SESSION['aemerr']);

    unset($_SESSION['auname']);
    unset($_SESSION['aemail']);
?>