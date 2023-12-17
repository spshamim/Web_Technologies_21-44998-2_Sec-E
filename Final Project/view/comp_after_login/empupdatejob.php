<?php
    include_once "empheader.php";
    require_once "../../model/userModel.php";

    $userID = $_GET['edit'];
    $row = jobsRetrieve($userID);
    $_SESSION['title']       = $row['title'];
    $_SESSION['type']        = $row['type'];
    $_SESSION['category']    = $row['category'];
    $_SESSION['location']    = $row['location'];
    $_SESSION['vacancy']     = $row['vacancy'];
    $_SESSION['salary']      = $row['salary'];
    $_SESSION['experience']  = $row['experience'];
    $_SESSION['description'] = $row['description'];
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
                            <a class="styled" href="company_dash.php">Go Back</a>
                        </td> 
                    </tr>
                </table>
            </td>
        </tr>    
        <tr>
            <td width="50%" align="center">
            <form action="../../controller/company/postjobupdatecontroller.php" method="POST" onsubmit="return postValidation()">
                <div align="left" id="dd1">
                <label id="ll1"><?php echo isset($_SESSION['jb4']) ? $_SESSION['jb4'] : ''; ?></label>
                <table width="100%">
                    <!-- Title -->
                    <tr>
                        <td><label id="ll0">Title: &nbsp</label></td>
                        <td id="fl01"><input type="text" width="100%" name="title" id="title" value="<?php echo isset($_SESSION['title']) ? $_SESSION['title'] : ''; ?>"></td>
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
                                    <td><input type="radio" name="type" id="type" value="part-time" <?php if (isset($_SESSION['type']) && $_SESSION['type'] == "part-time") { echo "checked"; } ?>><label>Part time</label></td>
                                    <td><input type="radio" name="type" id="type" value="full-time" <?php if (isset($_SESSION['type']) && $_SESSION['type'] == "full-time") { echo "checked"; } ?>><label>Full time</label></td>
                                    <td><input type="radio" name="type" id="type" value="internship" <?php if (isset($_SESSION['type']) && $_SESSION['type'] == "internship") { echo "checked"; } ?>><label>Internship</label></td>
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
                        <td id="fl01"><input type="text" width="100%" name="location" id="location" value="<?php echo isset($_SESSION['location']) ? $_SESSION['location'] : ''; ?>"></td>
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
                            <?php
                                $categories = array(
                                    "Accounting", "Banking", "Development", "Insurance", "IT", "Healthcare", 
                                    "Marketing", "Management", "General Management", "Medical", "Garments", 
                                    "Engineer", "Bank/Non-Bank Fin. Institution", "Beauty Care", "Education", 
                                    "Tourism", "Security", "Supply Chain", "Research", "Receptionist", 
                                    "Data Entry", "Others"
                                );

                                foreach ($categories as $category) {
                                    $isSelected = isset($_SESSION['category']) && $_SESSION['category'] == $category;
                                    echo '<option value="' . $category . '" ' . ($isSelected ? 'selected' : '') . '>' . $category . '</option>';
                                }
                            ?>   
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
                        <td id="fl01"><input type="text" width="100%" name="exp" id="exp" value="<?php echo isset($_SESSION['experience']) ? $_SESSION['experience'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['exp_err']) ? $_SESSION['exp_err'] : ''; ?></td>
                    </tr>
                    <!-- Vacancy -->
                    <tr>
                        <td><label id="ll0">Vacancy: &nbsp</label></td>
                        <td id="fl01"><input type="text" width="100%" name="vacancy" id="vacancy" value="<?php echo isset($_SESSION['vacancy']) ? $_SESSION['vacancy'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['vac_err']) ? $_SESSION['vac_err'] : ''; ?></td>
                    </tr>
                    <!-- Salary -->
                    <tr>
                        <td><label id="ll0">Salary: &nbsp</label></td>
                        <td id="fl01"><input type="text" width="100%" name="salary" id="salary" value="<?php echo isset($_SESSION['salary']) ? $_SESSION['salary'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['sal_err']) ? $_SESSION['sal_err'] : ''; ?></td>
                    </tr>
                    <!-- Description -->
                    <tr>
                        <td><label id="ll0">Description: &nbsp</label></td>
                        <td id="fl01"><textarea rows="6" width="100%" name="desc" id="desc"><?php echo isset($_SESSION['description']) ? $_SESSION['description'] : ''; ?></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="errorTD"><?php echo isset($_SESSION['desc_err']) ? $_SESSION['desc_err'] : ''; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="right" ><br><input class="styled" type="submit" name="jobpost" value="Update"></td>
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
    $_SESSION['edit_user_id'] = $userID;
    unset($_SESSION['title']);   
    unset($_SESSION['type']);        
    unset($_SESSION['category']);    
    unset($_SESSION['location']);   
    unset($_SESSION['vacancy']);     
    unset($_SESSION['salary']);      
    unset($_SESSION['experience']);  
    unset($_SESSION['description']);
    unset($_SESSION['jb4']);

    unset($_SESSION["title_err"]);
    unset($_SESSION['type_err']);
    unset($_SESSION['loc_err']);
    unset($_SESSION['cat_err']);
    unset($_SESSION['exp_err']);
    unset($_SESSION['sal_err']);
    unset($_SESSION['vac_err']);
    unset($_SESSION['desc_err']);
?>