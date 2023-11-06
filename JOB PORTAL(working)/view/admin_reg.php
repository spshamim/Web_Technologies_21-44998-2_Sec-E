<html>
    <head>
        <title>ADMIN REGISTRATION</title>
        <?php
            include_once "home_header.php";
            session_start();
        ?>
    </head>
    <body style="color: black; font-family: Verdana;">
        <table width="100%" style="padding: 50px; color: black; font-family: Verdana;">
            <tr>
                <td width="50%" align="center">

                    <form action="../controller/admincheck.php" method="POST">

                    <div align="left" style="background-color: #e6e6e6; padding: 50px; color:black; max-width: 750px; padding-left: 100px; padding-right: 100px;">
                    <label style="font-size: 25px; font-weight:bold; color:green">Register Admin</label>
                    <br><br><br>
                    <table width="100%">
                        <!-- username -->
                        <tr>
                            <td><label style="color:black; font-size:20px">Username: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="uname" style="font-size:20px; flex: 1;" value="<?php echo isset($_SESSION['auname']) ? $_SESSION['auname'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['auerr']) ? $_SESSION['auerr'] : ''; ?></td>
                        </tr>
                        <!-- password -->
                        <tr>
                            <td><label style="color:black; font-size:20px">Password: &nbsp</label></td>
                            <td style="display: flex;"><input type="password" width="100%" name="pass" style="font-size:20px; flex: 1;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['aperr']) ? $_SESSION['aperr'] : ''; ?></td>
                        </tr>
                        <!-- confirm password -->
                        <tr>
                            <td width="210px"><label style="color:black; font-size:20px">Confirm Password: &nbsp</label></td>
                            <td style="display: flex;"><input type="password" width="100%" name="cpass" style="font-size:20px; flex: 1;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['acperr']) ? $_SESSION['acperr'] : ''; ?></td>
                        </tr>
                        <!-- email -->
                        <tr>
                            <td><label style="color:black; font-size:20px">Email: &nbsp</label></td>
                            <td style="display: flex;"><input type="email" width="100%" name="email" style="font-size:20px; flex: 1;" value="<?php echo isset($_SESSION['aemail']) ? $_SESSION['aemail'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['aemerr']) ? $_SESSION['aemerr'] : ''; ?></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td align="right" ><br><input type="submit" name="adminreg" value="Register" style="font-size: 20px;"></td>
                        </tr>
                    </table>
                    </div>

                    </form>
                </td>
            </tr>
        </table>
    <?php
        include_once "footer.php";
        unset($_SESSION['auerr']);
        unset($_SESSION['aperr']);
        unset($_SESSION['acpnerr']);
        unset($_SESSION['aemerr']);

        unset($_SESSION['auname']);
        unset($_SESSION['aemail']);
    ?>
    </body>
    <?php include_once "footer.php";?>
</html>