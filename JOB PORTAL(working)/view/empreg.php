<html>
    <head>
        <title>COMPANY REGISTRATION</title>
        <?php include_once "home_header.php"; session_start();?>

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
        <table width="100%" style="color: black; font-family: Verdana;">
            <tr>
                <td width="50%" align="center">

                    <form action="../controller/empregcheck.php" method="POST">

                    <div align="left" style="background-color: #e6e6e6; padding: 50px; color:black; max-width: 750px; padding-left: 100px; padding-right: 100px;">
                    <label style="font-size: 25px; font-weight:bold; color:green">Register as a Company</label>
                    <br><br><br>
                    <table width="100%">
                        <!-- Name -->
                        <tr>
                            <td><label style="color:black; font-size: 20;">Name: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="name"  style="font-size:20px; flex: 1;" value="<?php echo isset($_SESSION['ename']) ? $_SESSION['ename'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['nerr']) ? $_SESSION['nerr'] : ''; ?></td>
                        </tr>
                        <!-- username -->
                        <tr>
                            <td><label style="color:black">Username: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="uname"  style="font-size:20px; flex: 1;" value="<?php echo isset($_SESSION['euname']) ? $_SESSION['euname'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['uerr']) ? $_SESSION['uerr'] : ''; ?></td>
                        </tr>
                        <!-- password -->
                        <tr>
                            <td><label style="color:black">Password: &nbsp</label></td>
                            <td style="display: flex;"><input type="password" width="100%" name="pass" style="font-size:20px; flex: 1;" ></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['perr']) ? $_SESSION['perr'] : ''; ?></td>
                        </tr>
                        <!-- confirm password -->
                        <tr>
                            <td width="210px"><label style="color:black">Confirm Password: &nbsp</label></td>
                            <td style="display: flex;"><input type="password" width="100%" name="cpass" style="font-size:20px; flex: 1;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['cperr']) ? $_SESSION['cperr'] : ''; ?></td>
                        </tr>
                        <!-- email -->
                        <tr>
                            <td><label style="color:black">Email: &nbsp</label></td>
                            <td style="display: flex;"><input type="email" width="100%" name="email" style="font-size:20px; flex: 1;" value="<?php echo isset($_SESSION['eemail']) ? $_SESSION['eemail'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['emerr']) ? $_SESSION['emerr'] : ''; ?></td>
                        </tr>
                        <!-- type -->
                        <tr>
                            <td><label style="color:black">Type: &nbsp</label></td>
                            <td style="display: flex;">
                                <select name="type" id="" style="width: 530px; height:30px; font-weight:bold; text-align:center">
                                    <option value="" selected>Select a Type</option>    
                                    <option value="Accounting">Accounting</option>
                                    <option value="Banking">Banking</option>
                                    <option value="Development">Development</option>
                                    <option value="Insurance">Insurance</option>
                                    <option value="IT">IT</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="Marketting">Marketting</option>
                                    <option value="Management">Management</option>
                                    <option value="Generalmanagment">Generalmanagment</option>
                                    <option value="Medical">Medical</option>
                                    <option value="Garments">Garments</option>
                                    <option value="Engineer">Engineer</option>
                                    <option value="Bank/Non-Bank Fin. Institution">Bank/Non-Bank Fin. Institution</option>
                                    <option value="Beautycare">Beautycare</option>
                                    <option value="Education">Education</option>
                                    <option value="Tourism">Tourism</option>
                                    <option value="Security">Security</option>
                                    <option value="Supplychain">Supplychain</option>
                                    <option value="Research">Research</option>
                                    <option value="Receptionist">Receptionist</option>
                                    <option value="Dataentry">Dataentry</option>
                                    <option value="Others">Others</option>
                                </select>                                    
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['terr']) ? $_SESSION['terr'] : ''; ?></td>
                        </tr>
                        <!-- contact -->
                        <tr>
                            <td><label style="color:black">Contact Number: &nbsp</label></td>
                            <td style="display: flex;"><input type="number" width="100%" name="contact" style="font-size:20px; flex: 1;" value="<?php echo isset($_SESSION['econtact']) ? $_SESSION['econtact'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['cerr']) ? $_SESSION['cerr'] : ''; ?></td>
                        </tr>
                        <!-- loc -->
                        <tr>
                            <td><label style="color:black">Location: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="loc" style="font-size:20px; flex: 1;" value="<?php echo isset($_SESSION['elocation']) ? $_SESSION['elocation'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['locerr']) ? $_SESSION['locerr'] : ''; ?></td>
                        </tr>
                        <!-- web -->
                        <tr>
                            <td><label style="color:black">Website: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="web" step="0.01" style="font-size:20px; flex: 1;" value="<?php echo isset($_SESSION['ewebsite']) ? $_SESSION['ewebsite'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['weberr']) ? $_SESSION['weberr'] : ''; ?></td>
                        </tr>
                        <!-- lic -->
                        <tr>
                            <td><label style="color:black">License: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="lic" style="font-size:20px; flex: 1;" value="<?php echo isset($_SESSION['elicense']) ? $_SESSION['elicense'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION['licerr']) ? $_SESSION['licerr'] : ''; ?></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td align="right" ><br><input type="submit" name="empreg" value="Register" style="font-size: 20px; background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;"></td>
                        </tr>
                    </table>
                    </div>

                    </form>

                </td>
            </tr>
        </table>
    <?php
        include_once "footer.php";
        unset($_SESSION['perr']);
        unset($_SESSION['uerr']);
        unset($_SESSION['cperr']);
        unset($_SESSION['nerr']);
        unset($_SESSION['emerr']);
        unset($_SESSION['terr']);
        unset($_SESSION['cerr']);
        unset($_SESSION['locerr']);
        unset($_SESSION['weberr']);
        unset($_SESSION['licerr']);

        unset($_SESSION['ename']);
        unset($_SESSION['euname']);
        unset($_SESSION['eemail']);
        unset($_SESSION['econtact']);
        unset($_SESSION['elocation']);
        unset($_SESSION['ewebsite']);
        unset($_SESSION['elicense']);
    ?>
    </body>
</html>
