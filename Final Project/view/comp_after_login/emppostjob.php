<?php
    include_once "empheader.php";
?>

<html>
<head>
    <script src="../../js/postjobvalidation.js"></script>
    <link rel="stylesheet" href="../../asset/css/com_login/emp_update.css">
</head>
<body>
    <table width="100%" id="tt1">
        <tr align="center">
            <td>
                <table>
                    <tr>
                        <td>
                            <a class="styled3" href="company_dash.php">Go Back</a>
                        </td> 
                    </tr>
                </table>
            </td>
        </tr>    
        <tr>
            <td width="50%" align="center">
            <form action="../../controller/company/postjobcontroller.php" method="POST" onsubmit="return postValidation()">
                <div align="left" id="dd1">
                <label id="ll1"><?php echo isset($_SESSION['jb2']) ? $_SESSION['jb2'] : ''; ?></label>
                <table width="100%">
                    <!-- Title -->
                    <tr>
                        <td><label id="ll0">Title: &nbsp</label></td>
                        <td id="fl01"><input type="text" width="100%" name="title" id="title" value=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['title_err']) ? $_SESSION['title_err'] : ''; ?></td>
                    </tr>
                    <!-- Type -->
                    <tr>
                        <td><label id="ll0">Type: &nbsp</label></td>
                        <td id="fl01">
                            <table align="center" width="100%">
                                <tr>
                                    <td><input type="radio" name="type" id="type" value="part-time"><label>Part time</label></td>
                                    <td><input type="radio" name="type" id="type" value="full-time"><label>Full time</label></td>
                                    <td><input type="radio" name="type" id="type" value="internship"><label>Internship</label></td>
                                </tr>
                            </table>    
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['type_err']) ? $_SESSION['type_err'] : ''; ?></td>
                    </tr>
                    <!-- Location -->
                    <tr>
                        <td><label id="ll0">Location: &nbsp</label></td>
                        <td id="fl01"><input type="text" width="100%" name="location" id="location" value=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['loc_err']) ? $_SESSION['loc_err'] : ''; ?></td>
                    </tr>
                    <!-- Category -->
                    <tr>
                        <td width="210px"><label id="ll0">Catagory: &nbsp</label></td>
                        <td id="fl01">
                        <select name="category" id="category">
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
                        <td id="errorTD"><?php echo isset($_SESSION['cat_err']) ? $_SESSION['cat_err'] : ''; ?></td>
                    </tr>
                    <!-- Experience -->
                    <tr>
                        <td><label id="ll0">Experience: &nbsp</label></td>
                        <td id="fl01"><input type="text" width="100%" name="exp" id="exp" value=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['exp_err']) ? $_SESSION['exp_err'] : ''; ?></td>
                    </tr>
                    <!-- Vacancy -->
                    <tr>
                        <td><label id="ll0">Vacancy: &nbsp</label></td>
                        <td id="fl01"><input type="text" width="100%" name="vacancy" id="vacancy" value=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['vac_err']) ? $_SESSION['vac_err'] : ''; ?></td>
                    </tr>
                    <!-- Salary -->
                    <tr>
                        <td><label id="ll0">Salary: &nbsp</label></td>
                        <td id="fl01"><input type="text" width="100%" name="salary" id="salary" value=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['sal_err']) ? $_SESSION['sal_err'] : ''; ?></td>
                    </tr>
                    <!-- Description -->
                    <tr>
                        <td><label id="ll0">Description: &nbsp</label></td>
                        <td id="fl01"><textarea rows="6" width="100%" name="desc" id="desc"></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['desc_err']) ? $_SESSION['desc_err'] : ''; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="right" ><br><input class="styled" type="submit" name="jobpost" value="Post"></td>
                    </tr>
                </table>
                </div>
            </form>
            </td>
            </tr>
        </table>
            <!-- js error show -->
            <div id="dd2">
                <ul id="errorList"></ul>
            </div>
    </body>
</html>

<?php
    include_once ('../footer.php');
    unset($_SESSION['jb2']);
    unset($_SESSION["title_err"]);
    unset($_SESSION['type_err']);
    unset($_SESSION['loc_err']);
    unset($_SESSION['cat_err']);
    unset($_SESSION['exp_err']);
    unset($_SESSION['sal_err']);
    unset($_SESSION['vac_err']);
    unset($_SESSION['desc_err']);
?>