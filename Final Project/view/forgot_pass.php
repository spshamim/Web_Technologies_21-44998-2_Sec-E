<html>
    <head>
        <title>FORGOT PASSWORD</title>
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
                <td width="50%" align="center">

                    <form action="../controller/forgot_pass_controller.php" method="POST">

                    <div align="left" style="background-color: #e6e6e6; padding: 50px; color:black; max-width: 750px; padding-left: 100px; padding-right: 100px; box-shadow: 11px 11px 22px rgba(0, 0, 0, 0.5);">
                    <label style="font-size: 25px; font-weight:bold; color:green">Password Retrieve</label>
                    <br><br><br>
                    <table width="100%">
                        <!-- Email -->
                        <tr>
                            <td><label style="color:black">Email: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="email" value="<?php echo isset($_SESSION['emtoshow']) ? $_SESSION['emtoshow'] : ''; ?>" style="font-size:20px; flex: 1;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;">
                                <?php echo isset($_SESSION['errrrr']) ? $_SESSION['errrrr'] : ''; ?>
                                <?php echo isset($_SESSION['errrrr2']) ? $_SESSION['errrrr2'] : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align="right" ><br>
                                <input type="submit" name="ff" value="Retrieve" style="font-size: 20px; background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; margin-right:300px">
                            </td>
                        </tr>
                    </table>
                    <label>Your Password is : <?php echo isset($_SESSION['rt']) ? $_SESSION['rt'] : ''; ?></label>
                    </div>
                    </form>
                </td>
            </tr>
        </table>
    </body>
</html>
<?php
    include_once "footer.php";
    unset($_SESSION["errrrr"]);
    unset($_SESSION["errrrr2"]);
    unset($_SESSION["emtoshow"]);
    unset($_SESSION["rt"]);
?>