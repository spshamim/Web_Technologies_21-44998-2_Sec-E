<?php include_once "home_header.php"; session_start();?>

<html>
    <head>
        <title>COMPANY REGISTRATION</title>
        <link rel="stylesheet" href="../asset/css/empreg.css">
        <script src="../js/companyCheck.js"></script>
    </head>

    <body>
    <table width="100%">
        <tr>
            <td width="50%" align="center">
            <form action="../controller/empregcheck.php" method="POST" onsubmit="return validateForm()">
                <div align="left" class="mainDiv">
                <label id="m1">Register as a Company</label>
                <br><br><br>
                <table width="100%">
                    <!-- Name -->
                    <tr>
                        <td><label>Name: &nbsp</label></td>
                        <td id="ff"><input type="text" width="100%" id="name" name="name" value="<?php echo isset($_SESSION['ename']) ? $_SESSION['ename'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['name_error']) ? $_SESSION['name_error'] : ''; ?></td>
                    </tr>
                    <!-- username -->
                    <tr>
                        <td><label>Username: &nbsp</label></td>
                        <td id="ff"><input type="text" width="100%" id="uname" name="uname" value="<?php echo isset($_SESSION['euname']) ? $_SESSION['euname'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['uname_error']) ? $_SESSION['uname_error'] : ''; ?></td>
                    </tr>
                    <!-- password -->
                    <tr>
                        <td><label>Password: &nbsp</label></td>
                        <td id="ff"><input type="password" width="100%" id="pass" name="pass" ></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['pass_error']) ? $_SESSION['pass_error'] : ''; ?></td>
                    </tr>
                    <!-- confirm password -->
                    <tr>
                        <td width="210px"><label>Confirm Password: &nbsp</label></td>
                        <td id="ff"><input type="password" width="100%" id="cpass" name="cpass"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"></td>
                    </tr>
                    <!-- email -->
                    <tr>
                        <td><label>Email: &nbsp</label></td>
                        <td id="ff"><input type="text" width="100%" id="email" name="email" value="<?php echo isset($_SESSION['eemail']) ? $_SESSION['eemail'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['email_error']) ? $_SESSION['email_error'] : ''; ?></td>
                    </tr>
                    <!-- type -->
                    <tr>
                        <td><label>Type: &nbsp</label></td>
                        <td id="ff">
                            <select name="type" id="type">
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
                        <td id="errorTD"><?php echo isset($_SESSION['type_error']) ? $_SESSION['type_error'] : ''; ?></td>
                    </tr>
                    <!-- contact -->
                    <tr>
                        <td><label>Contact Number: &nbsp</label></td>
                        <td id="ff"><input type="number" width="100%" id="contact" name="contact" value="<?php echo isset($_SESSION['econtact']) ? $_SESSION['econtact'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['contact_error']) ? $_SESSION['contact_error'] : ''; ?></td>
                    </tr>
                    <!-- loc -->
                    <tr>
                        <td><label>Location: &nbsp</label></td>
                        <td id="ff"><input type="text" width="100%" id="loc" name="loc" value="<?php echo isset($_SESSION['elocation']) ? $_SESSION['elocation'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['location_error']) ? $_SESSION['location_error'] : ''; ?></td>
                    </tr>
                    <!-- web -->
                    <tr>
                        <td><label>Website: &nbsp</label></td>
                        <td id="ff"><input type="text" width="100%" id="web" name="web" step="0.01" value="<?php echo isset($_SESSION['ewebsite']) ? $_SESSION['ewebsite'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['website_error']) ? $_SESSION['website_error'] : ''; ?></td>
                    </tr>
                    <!-- lic -->
                    <tr>
                        <td><label>License: &nbsp</label></td>
                        <td id="ff"><input type="text" width="100%" id="lic" name="lic" value="<?php echo isset($_SESSION['elicense']) ? $_SESSION['elicense'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['license_error']) ? $_SESSION['license_error'] : ''; ?></td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td align="right" ><br><input type="submit" class="regButton" value="Register"></td>
                    </tr>
                </table>
                </form>
                </div>
            </td>
        </tr>
    </table>
        <!-- js error show -->
        <div id="jsError">
            <ul id="errorList">
            </ul>
        </div>
    </body>
</html>

<?php
    include_once "footer.php";
    unset($_SESSION['name_error']);
    unset($_SESSION['uname_error']);
    unset($_SESSION['pass_error']);
    unset($_SESSION['email_error']);
    unset($_SESSION['type_error']);
    unset($_SESSION['contact_error']);
    unset($_SESSION['location_error']);
    unset($_SESSION['website_error']);
    unset($_SESSION['license_error']);
    unset($_SESSION['ename']);
    unset($_SESSION['euname']);
    unset($_SESSION['eemail']);
    unset($_SESSION['econtact']);
    unset($_SESSION['elocation']);
    unset($_SESSION['ewebsite']);
    unset($_SESSION['elicense']);
?>
