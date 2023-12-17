<html>
	<head>
		<script src="../../js/myJobSearch.js"></script>
		<link rel="stylesheet" href="../../asset/css/seeker/myJobSearch.css">
		<title>Job Search</title>
	</head>
	<body>
		<div style="display: flex;">
		<?php
		include_once("Dashboard.php");
		?>
		<div class="main-content">
		<table align = "center">
			<tr>
				<td>
					<div>
						<table>
								<tr>
                                    <td>Job Title :</td>
                                    <td colspan="4"><input type="text" name="title" id="title" value=""></td>

                                    <td>Company Name :</td>
                                    <td><input type="text" name="comp_name" id="comp_name" value=""></td>
                                </tr>
								<tr>
									<td>
										<legend>Catagory</legend><br>
										<center>
											<select name="category" id="category" class="select-itm">
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
										</center>
									</td>
									<td>
										<legend>Type</legend><br>
										<center>
											<select name="type" id="type" class="select-itm">
												<option value="" selected>Any Type</option>
												<option value="full-time">Full-Time</option>
												<option value="part-time">Part-Time</option>
												<option value="internship">Internship</option>
											</select>
										</center>
									</td>
									<td>
										<legend>Salary</legend><br>
										<center>
											<select name="salary" id="salary" class="select-itm">
												<option value="" selected>Any Salary</option>
												<option value="<10000">&lt; $10000</option>
												<option value="10000-25000">$10000 - $25000</option>
												<option value="25000-50000">$25000 - $50000</option>
												<option value=">50000">&gt; $50000</option>
											</select>
										</center>
									</td>
									<td>
										<legend>Experience</legend><br>
										<center>
											<select name="experience" id="experience" class="select-itm">
												<option value="" selected>Any Experience</option>
												<option value="<1">&lt; 1 year</option>
                                            	<option value="1-3">1 - 3 years</option>
                                            	<option value="3-5">3 - 5 years</option>
                                            	<option value=">5">&gt; 5 years</option>
											</select>
										</center>
									</td>
									<td colspan="5">
										<legend>Location</legend><br>
										<center><input type="text" name="location" id="location" placeholder="location" class="select-itm"></center>
									</td>
								</tr>
								<tr>
									<td colspan="8"><br></td>
								</tr>
								<tr>
									<td colspan="7" align="center">
										<input type="submit" value="Search" onclick="myJobSearchValidation()" class="submit-btn">
									</td>
								</tr>
						</table>
					</div>
				</td>
			</tr>
			<tr align="center">
				<td>
					<div id="error-message"></div>
				</td>
			</tr>
		</table>
		</div>
		</div>
	</body>
</html>
