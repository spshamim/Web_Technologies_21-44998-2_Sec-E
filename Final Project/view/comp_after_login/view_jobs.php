<?php
    include_once("empheader.php");
?>

<html>
    <head>
        <title>Job Search</title>
        <script src="../../js/companyjobsearch.js"></script>
        <link rel="stylesheet" href="../../asset/css/com_login/view_jobs.css">
    </head>
    <body>
        <table align="center" width="1000px" id="tt1">
            <tr align="center">
                <td>
                    <label align="center"></label>
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
                <td>
                    <div id="dd1">
                        <table width="1000px">
                                <tr>
                                    <td>Job Title :</td>
                                    <td colspan="4"><input type="text" name="title" id="title" value=""></td>

                                    <td>Company Name :</td>
                                    <td><input type="text" name="comp_name" id="comp_name" value=""></td>
                                </tr>
                                <tr>
                                    <td colspan="7"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <legend id="ll1">Catagory</legend><br>
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
                                    <td>
                                        <legend>Type</legend><br>
                                        <select name="type" id="type">
                                            <option value="" selected>Any</option>
                                            <option value="full-time">Full-Time</option>
                                            <option value="part-time">Part-Time</option>
                                            <option value="internship">Internship</option>
                                        </select>
                                    </td>
                                    <td>
                                    <legend>Salary</legend><br>
                                    <select name="salary" id="salary">
                                        <option value="" selected>Any</option>
                                        <option value="<10000">&lt; $10000</option>
                                        <option value="10000-25000">$10000 - $25000</option>
                                        <option value="25000-50000">$25000 - $50000</option>
                                        <option value=">50000">&gt; $50000</option>
                                    </select>

                                    </td>
                                    <td>
                                    <legend>Experience</legend><br>
                                        <select name="experience" id="experience">
                                            <option value="" selected>Any</option>
                                            <option value="<1">&lt; 1 year</option>
                                            <option value="1-3">1 - 3 years</option>
                                            <option value="3-5">3 - 5 years</option>
                                            <option value=">5">&gt; 5 years</option>
                                        </select>

                                    </td>
                                    <td colspan="5">
                                        <legend>Location :</legend><br>
                                        <input type="text" name="location" id="location" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" align="center" id="td002">
                                        <input class="styled" type="button" value="Search" onclick="xx()">
                                    </td>
                                </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr align="center">
                <td>
                    <div id="error-container" style="width: 1200px; height: 200px; overflow-y: auto;"></div>
                </td>
            </tr>
        </table>
    </body>
</html>

<?php
    include_once ('../footer.php');
?>