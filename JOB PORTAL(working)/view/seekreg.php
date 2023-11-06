<html>
    <head>
        <title>SEEKER REGISTRATION</title>
        <?php
            include_once "home_header.php";
            session_start();
        ?>
    </head>
    <body style="color: black; font-family: Verdana;">
        <table width="100%" style="padding: 80px; color: black; font-family: Verdana;">
            <tr>
                <td width="50%" align="center">

                    <form action="../controller/seekregcheck.php" method="POST">

                    <div align="left" style="background-color: #e6e6e6; padding: 50px; color:black; max-width: 750px; padding-left: 100px; padding-right: 100px;">
                    <label style="font-size: 25px; font-weight:bold; color:green">Register as a Job Seeker!</label>
                    <br><br><br>
                    <table width="100%">
                        <!-- Name -->
                        <tr>
                            <td><label style="color:black; font-size:20px">Full Name: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="fname" style="font-size:20px; flex: 1;" value="<?php echo isset($_SESSION['sname']) ? $_SESSION['sname'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['sferr']) ? $_SESSION['sferr'] : ''; ?></td>
                        </tr>
                        <!-- username -->
                        <tr>
                            <td><label style="color:black; font-size:20px">Username: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="uname" style="font-size:20px; flex: 1;" value="<?php echo isset($_SESSION['suname']) ? $_SESSION['suname'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['suerr']) ? $_SESSION['suerr'] : ''; ?></td>
                        </tr>
                        <!-- password -->
                        <tr>
                            <td><label style="color:black; font-size:20px">Password: &nbsp</label></td>
                            <td style="display: flex;"><input type="password" width="100%" name="pass" style="font-size:20px; flex: 1;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['sperr']) ? $_SESSION['sperr'] : ''; ?></td>
                        </tr>
                        <!-- confirm password -->
                        <tr>
                            <td width="210px"><label style="color:black; font-size:20px">Confirm Password: &nbsp</label></td>
                            <td style="display: flex;"><input type="password" width="100%" name="cpass" style="font-size:20px; flex: 1;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['scperr']) ? $_SESSION['scperr'] : ''; ?></td>
                        </tr>
                        <!-- email -->
                        <tr>
                            <td><label style="color:black; font-size:20px">Email: &nbsp</label></td>
                            <td style="display: flex;"><input type="email" width="100%" name="email" style="font-size:20px; flex: 1;" value="<?php echo isset($_SESSION['semail']) ? $_SESSION['semail'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['semerr']) ? $_SESSION['semerr'] : ''; ?></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td align="right" ><br><input type="submit" name="sekreg" value="Register" style="font-size: 20px; background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;"></td>
                        </tr>
                    </table>
                    </div>

                    </form>

                </td>
            </tr>
        </table>
    <?php
        include_once "footer.php";
        unset($_SESSION['sferr']);
        unset($_SESSION['suerr']);
        unset($_SESSION['sperr']);
        unset($_SESSION['scpnerr']);
        unset($_SESSION['semerr']);

        unset($_SESSION['sname']);
        unset($_SESSION['suname']);
        unset($_SESSION['semail']);
    ?>
    </body>
</html>