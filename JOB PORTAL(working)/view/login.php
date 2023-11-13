<html>
    <head>
        <title>LOGIN</title>
        <?php
            include_once "home_header.php";
            session_start();
        ?>    
        <style>
            label{
                font-size: 20;
            }
            input{
                padding-left: 10px;
                padding-right: 10px;
            }
        </style>
    </head>
    <body style="color: black; font-family: Verdana;">
        <table width="100%" style="padding: 125px; color: black; font-family: Verdana;">
           <tr>
               <td align="center" style="color: red"> <!-- when company not approved -->
                    <?php
                        echo isset($_SESSION['queue']) ? $_SESSION['queue'] : '';
                        echo isset($_SESSION['unotexist']) ? $_SESSION['unotexist'] : '';
                    ?>
               </td>
            </tr>
            <tr>
                <td width="50%" align="center">

                    <form action="../controller/logincheck.php" method="POST">

                    <div align="left" style="background-color: #e6e6e6; padding: 50px; color:black; max-width: 750px; padding-left: 100px; padding-right: 100px; box-shadow: 11px 11px 22px rgba(0, 0, 0, 0.5);">
                    <label style="font-size: 25px; font-weight:bold; color:green">Log In</label>
                    <br><br><br>
                    <table width="100%">
                        <!-- username -->
                        <tr>
                            <td><label style="color:black">Username: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="uname" value="<?php echo isset($_SESSION['ntoshow']) ? $_SESSION['ntoshow'] : ''; ?>" style="font-size:20px; flex: 1;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['luerr']) ? $_SESSION['luerr'] : ''; ?></td>
                        </tr>
                        <!-- password -->
                        <tr>
                            <td><label style="color:black">Password: &nbsp</label></td>
                            <td style="display: flex;"><input type="password" width="100%" name="pass" style="font-size:20px; flex: 1;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['lperr']) ? $_SESSION['lperr'] : ''; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align="right" ><br>
                                <a href="forgot_pass.php" style="text-decoration:none;font-size: 20px; color: blue;font-weight:bold; cursor: pointer; margin-right:30px">Forgot password ?</a>
                                <input type="submit" name="login" value="Login" style="font-size: 20px; background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                            </td>
                        </tr>
                    </table>
                    </div>
                    </form>
                </td>
            </tr>
        </table>
    </body>
</html>
<?php
        include_once "footer.php";
        unset($_SESSION["luerr"]);
        unset($_SESSION["lperr"]);
        unset($_SESSION["queue"]);
        unset($_SESSION["unotexist"]);
        unset($_SESSION["ntoshow"]);
?>