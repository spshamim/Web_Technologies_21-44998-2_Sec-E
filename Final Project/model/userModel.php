<?php
    require_once('db.php');
    
    /* =================== LOGIN ========================== */

    function login($username, $password){
        $conn = getConnection();
        $sql = "SELECT login.*, company.approval, company.name
                FROM login
                LEFT JOIN company ON login.id = company.userID
                WHERE login.username = '{$username}' AND login.password = '{$password}'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) {
            $userData = array(
                'success' => true,
                'id' => $user['id'],
                'email' => $user['email'],
                'usertype' => $user['usertype'],
                'compname' => $user['name'],
                'approval' => $user['approval'] // Include the approval status
            );
            return $userData;
        } else {
            return array('success' => false);
        }
    }

    function checkPassword($uname){
        $conn = getConnection();
        $sqlUserCheck = "SELECT password FROM login WHERE username = '{$uname}'";
        $result = mysqli_query($conn, $sqlUserCheck);
        
        if($result && mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            return $row['password'];
        }else{
            return false;
        }
    }    

    function forgotPassword($email){
        $conn = getConnection();
        $sql4 = "SELECT password FROM login WHERE email='$email'";
        $result = mysqli_query($conn, $sql4);
        
        if ($result) {
            $data5 = mysqli_fetch_assoc($result);
            return $data5 ? $data5['password'] : false;
        } else {
            return false;
        }
    }    
    
    /* ========================= admin profile ===================== */

    function retrievePassforAdmin($adminID){
        $conn = getConnection();
        $sqlUserCheck = "SELECT password FROM login WHERE id = $adminID";
        $result = mysqli_query($conn, $sqlUserCheck);
        
        while ($row = mysqli_fetch_assoc($result)) {
            return $row['password'];
        }
    }

    function updatePassforAdmin($adminID,$finalpass,$curr_pass){
        $conn = getConnection();
        // Check if the current password matches for the given user ID
        $checkSql = "SELECT id FROM login WHERE id = '$adminID' AND password = '$curr_pass'";
        $result = mysqli_query($conn, $checkSql);
   
        if ($result && mysqli_num_rows($result) > 0) {
            // Current password matches
            $updateSql = "UPDATE login SET password = '$finalpass' WHERE id = '$adminID'";
            $updateResult = mysqli_query($conn, $updateSql);
   
            if ($updateResult) {
                return true; // Password changed successfully
            }
        }else{
            return false;
        }
    }

    function profileRetrieveAdmin($adminID){
        $conn = getConnection();
        $sqlUserCheck = "SELECT username,email FROM login WHERE id  = $adminID;";
        $result = mysqli_query($conn, $sqlUserCheck);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function updateAdminProfile($uname,$email,$adminID){
        $conn = getConnection();
        $sql = "UPDATE login SET
            username = '$uname',
            email = '$email'
            WHERE id = $adminID";

        $result = mysqli_query($conn,$sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function updateAdminMetadata($adminId, $filename) {
        $conn = getConnection();
        $sql = "UPDATE admin_data SET fileMetaData = '$filename' WHERE userID = $adminId";
        $rr = mysqli_query($conn,$sql);

        if($rr){
            return true;
        }else{
            return false;
        }
    }

    function getCurrentPictureFilename($adminId) {
        $conn = getConnection();
    
        $sql = "SELECT fileMetaData FROM admin_data WHERE userID = $adminId";
        $result = mysqli_query($conn, $sql);
    
        if ($result !== false && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['fileMetaData'];
        } else {
            return 'default_picture.png';
        }
    }
    
    function deleteAdminProfilePicture($adminId) {
        $conn = getConnection();
        $sql = "UPDATE admin_data SET fileMetaData = '0' WHERE userID = $adminId";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /* =================== company signup ========================== */

    function empsignup($form_data){
        $conn = getConnection();
        $name = $form_data["name"];
        $username = $form_data["username"];
        $password = $form_data["password"];
        $email = $form_data["email"];       
        $type = $form_data["type"];      
        $contact = $form_data["contact"];
        $location = $form_data["location"];
        $website = $form_data["website"];
        $license = $form_data["license"];

        $sql = "INSERT INTO login (email, username, password ,usertype)
        VALUES ('$email', '$username', '$password', 'company');";
        $result=mysqli_query($conn,$sql);  

        $lastID=mysqli_insert_id($conn); //retrieving last query id to match with next query insertion(retrieve from AUTO_INCREMENT Column)

        $sql1 = "INSERT INTO company (userID,name,email,type,contact,location,website,license) VALUES ('$lastID','$name','$email', '$type', '$contact', '$location', '$website','$license')";
        $result2=mysqli_query($conn,$sql1);

        if ($result && $result2){
            return true;
        } else{
            return false;
        }
    }
    
    /* =================== admin registration ========================== */

    function adminsignup($uname,$pass,$email){
        $conn = getConnection();

        $username = $uname;
        $password = $pass;
        $email = $email;       
        
        $sql1 = "INSERT INTO login (email, username, password ,usertype)
        VALUES ('$email', '$username', '$password', 'admin');";
        $result2=mysqli_query($conn,$sql1);    
        
        $llastID=mysqli_insert_id($conn);

        $sql3 = "INSERT INTO admin_data (userID, username)
        VALUES ($llastID, '$username');";
        $result3=mysqli_query($conn,$sql3);

        if ($result2&&$result3){
            return true;
        } else{
            return false;
        }
    }

    /* =================== showing name in admin_header ========================== */

    function ahNameShow($loginID){
        $conn = getConnection();
        $sql = "SELECT * FROM login WHERE id=$loginID;";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    /* ========================= seeker registration ================================ */

    /*function seekreg($fname,$uname,$email,$pass){
        $conn = getConnection();

        $fname = $fname;
        $password = $pass;
        $email = $email;
        $uname = $uname;
             
        $sql = "INSERT INTO login (email, username, password ,usertype)
        VALUES ('$email', '$uname', '$password', 'seeker');";
        $result=mysqli_query($conn,$sql);

        $lastID = mysqli_insert_id($conn);
        
        $sql1 = "INSERT INTO seekerinfo (userID, email, name)
        VALUES ($lastID, '$email', '$fname');";
        $result1=mysqli_query($conn,$sql1);
        
        $sql2 = "INSERT INTO seekerappliedjobs (userID,email)
        VALUES ($lastID,'$email');";
        $result2=mysqli_query($conn, $sql2);
        
        $sql3 = "INSERT INTO seekereducation (userID,email)
        VALUES ($lastID,'$email');";
        $result3=mysqli_query($conn, $sql3);

        $sql4 = "INSERT INTO seekerskill (userID,email)
        VALUES ($lastID,'$email');";
        $result4=mysqli_query($conn, $sql4);

        $sql5 = "INSERT INTO seekerworkexperience (userID,email)
        VALUES ($lastID,'$email');";
        $result5=mysqli_query($conn, $sql5);
        
        if ($result && $result1 && $result2 && $result3 && $result4 && $result5){
            return true;
        } else{
            return false;
        }
    }*/

    /* ================ Check duplicate username and email in the database ============== */

    function checkuname($uname){
        $conn = getConnection();
        $sqlUserCheck = "SELECT * FROM login WHERE username = '$uname'";
            $result = mysqli_query($conn, $sqlUserCheck);

            while ($row = mysqli_fetch_assoc($result)) {
                return $row['username'];     
            }
    }

    function checkumail($email){
        $conn = getConnection();
        $sqlUserCheck = "SELECT * FROM login WHERE email = '$email'";
        $result = mysqli_query($conn, $sqlUserCheck);
        
        while ($row = mysqli_fetch_assoc($result)) {
            return $row['email'];
        }
    }

    /* ============================= admin_sek application =============================== */

    function getJobSeekers() {
        $conn = getConnection();
        $sql = "SELECT * FROM seekerinfo";
        $result = mysqli_query($conn, $sql);
        $jobSeekers = [];
    
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($jobSeekers, $row); // storing associative arrays as array elements
        }
    
        return $jobSeekers;
    }
    
    function getUsernameByUserID($userID) {
        $conn = getConnection();
        $sql = "SELECT username FROM login WHERE id = $userID";
        $result = mysqli_query($conn, $sql);
        $usernameData = mysqli_fetch_assoc($result);
        return $usernameData['username'];
    }
    
    function removeJobSeeker($userID) {
        $conn = getConnection();
        $sql1 = "DELETE FROM seekerinfo WHERE userID = $userID";
        $sql2 = "DELETE FROM seekerskill WHERE userID = $userID";
        $sql3 = "DELETE FROM seekerworkexperience WHERE userID = $userID";
        $sql4 = "DELETE FROM seekereducation WHERE userID = $userID";
        $sql5 = "DELETE FROM seekerappliedjobs WHERE userID = $userID";
        $sql6 = "DELETE FROM login WHERE id = $userID";
    
        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql2);
        mysqli_query($conn, $sql3);
        mysqli_query($conn, $sql4);
        mysqli_query($conn, $sql5);
        mysqli_query($conn, $sql6);
    }

    /* ============================ admin_emp application ===================================== */

    function removeCompany($userID) {
        $conn = getConnection();
        $sql1 = "DELETE FROM login WHERE id = $userID";
        $sql2="DELETE FROM company WHERE userID=$userID";
        mysqli_query($conn,$sql1);
        mysqli_query($conn,$sql2);
    }

    function getCompany() {
        $conn = getConnection();
        $sql = "SELECT * FROM company WHERE approval = 1;";
        $result = mysqli_query($conn, $sql);
        $companies = [];
    
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($companies, $row);
        }
    
        return $companies;
    }

    /* =========================== admin approval queue ======================================== */
    
    function updateCompanyApproval($uID){
        $conn = getConnection();
        $sql1="UPDATE company SET approval=1 WHERE userID=$uID";
        mysqli_query($conn,$sql1);
    }
    
    function unapprovedCompany(){
        $conn = getConnection();
        $sql1 = "SELECT * FROM company WHERE approval = 0;";
        $result = mysqli_query($conn,$sql1);
        $inqueue = [];

        while($rows=mysqli_fetch_assoc($result)){
            array_push($inqueue, $rows);
        }

        return $inqueue;
    }
    
    /* ============================ admin_admin application =================================== */ 
    
    function getAdmins(){
        $conn = getConnection();
        $sql = "SELECT * FROM login WHERE usertype = 'admin';";
        $result = mysqli_query($conn,$sql);  
        $admins = [];                              
        while($rows=mysqli_fetch_assoc($result)){
            array_push($admins, $rows);
        }

        return $admins;
    }

    function delAdmin($uID){
        $conn = getConnection();
        $sql1="DELETE FROM login WHERE id=$uID";
        mysqli_query($conn,$sql1);
    }

    /* =============================== myProfile ===================================== */

    /*function profileRetrieve($userID){
        $conn = getConnection();
        $sqlUserCheck = "SELECT name,prof_title,gender,age,cgpa,salary,experience,website,aboutMe,phone,email,address,city,google,twitter,facebook,linkedin FROM seekerinfo WHERE userID  = $userID;";
        $result = mysqli_query($conn, $sqlUserCheck);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }*/

    /*function updateProfile($userID, $name, $profTitle, $gender, $age, $cgpa, $salary, $experience, $website, $aboutMe, $phone, $email, $address, $city, $google, $twitter, $facebook, $linkedin) {
        $conn = getConnection();
        $sql = "UPDATE seekerinfo SET
            name = '$name',
            prof_title = '$profTitle',
            gender = '$gender',
            age = $age,
            cgpa = $cgpa,
            salary = $salary,
            experience = $experience,
            website = '$website',
            aboutMe = '$aboutMe',
            phone = '$phone',
            email = '$email',
            address = '$address',
            city = '$city',
            google = '$google',
            twitter = '$twitter',
            facebook = '$facebook',
            linkedin = '$linkedin'
            WHERE userID = $userID";

        $result = mysqli_query($conn,$sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }*/

    /*function myEducation($userID,$deg_name,$yty,$ins_name){
        $conn = getConnection();
        $sql = "UPDATE seekereducation SET
            deg_name = '$deg_name',
            yeartoyear = '$yty',
            ins_name = '$ins_name'
            WHERE userID = $userID";

        $result = mysqli_query($conn,$sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }*/

    /*function eduRetrieve($userID){
        $conn = getConnection();
        $sqlUserCheck = "SELECT deg_name,yeartoyear,ins_name FROM seekereducation WHERE userID  = $userID;";
        $result = mysqli_query($conn, $sqlUserCheck);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }*/
    
    /*function changePassword($currentPassword, $newPassword, $uid) {
         $conn = getConnection();
        
         // Check if the current password matches for the given user ID
         $checkSql = "SELECT id FROM login WHERE id = '$uid' AND password = '$currentPassword'";
         $result = mysqli_query($conn, $checkSql);
    
         if ($result && mysqli_num_rows($result) > 0) {
             // Current password matches, update the password
             $updateSql = "UPDATE login SET password = '$newPassword' WHERE id = '$uid'";
             $updateResult = mysqli_query($conn, $updateSql);
    
             if ($updateResult) {
                 return true; // Password changed successfully
             }
         }
    
         return false;
    }*/

    ///////////////////////////////// Company Job ////////////////////////////////////

    function insertjob($id,$name,$data){
        $conn = getConnection();
        $title = $data["title"];
        $type = $data["type"];
        $loc = $data["loc"];
        $category = $data["category"];
        $exp = $data["exp"];
        $vac = $data["vac"];
        $salary = $data["salary"];
        $desc = $data["desc"];
 
        $sql2 = "INSERT INTO job (comp_id,comp_name,title,type,location,category,experience,vacancy,salary,description)
        VALUES ($id,'$name','$title','$type','$loc','$category','$exp','$vac','$salary','$desc');";
        $result = mysqli_query($conn, $sql2);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    function getjobs($id) {
        $conn = getConnection();
        $sql = "SELECT * FROM job WHERE comp_id = $id;";
        $result = mysqli_query($conn, $sql);
        $jobs = [];
    
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($jobs, $row);
        }
    
        return $jobs;
    }

    function removejobs($uID){
        $conn = getConnection();
        $sql1 = "DELETE FROM job WHERE id = $uID;";
        $result = mysqli_query($conn,$sql1);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    function jobsRetrieve($userID){
        $conn = getConnection();
        $sq4 = "SELECT title,type,category,location,vacancy,salary,experience,description FROM job WHERE id = $userID";
        $result = mysqli_query($conn, $sq4);
        $rows = mysqli_fetch_assoc($result);
        return $rows;
    }

    function updatejob($userID,$name,$data){
        $conn = getConnection();

        $title = $data["title"];
        $type = $data["type"];
        $loc = $data["loc"];
        $category = $data["category"];
        $exp = $data["exp"];
        $vac = $data["vac"];
        $salary = $data["salary"];
        $desc = $data["desc"];

        $sql = "UPDATE job SET
            title = '$title',
            type = '$type',
            category = '$category',
            location = '$loc',
            vacancy = $vac,
            salary = $salary,
            experience = $exp,
            description = '$desc'
            WHERE comp_name = '$name' AND id = $userID";
        $result = mysqli_query($conn,$sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function searchJobs($title, $comp_name, $category, $type, $salary, $experience, $location) {
        $conn = getConnection();
        $sql = "SELECT * FROM job WHERE 1";

        if (!empty($title)) {
            $sql .= " AND title = '$title'";
        }

        if (!empty($comp_name)) {
            $sql .= " AND comp_name = '$comp_name'";
        }

        if (!empty($category)) {
            $sql .= " AND category = '$category'";
        }

        if (!empty($type)) {
            $sql .= " AND type = '$type'";
        }

        if (!empty($salary)) {
            $salaryValue = $salary;
        
            if (strpos($salaryValue, '<') !== false) {
                $minSalary = 0;
                $maxSalary = (int)str_replace('<', '', $salaryValue);
            } elseif (strpos($salaryValue, '>') !== false) {
                $minSalary = (int)str_replace('>', '', $salaryValue);
                $maxSalary = PHP_INT_MAX;
            } else {
                $rangeValues = explode('-', $salaryValue);
                $minSalary = $rangeValues[0];
                $maxSalary = $rangeValues[1];
            }
        
            $sql .= " AND salary BETWEEN $minSalary AND $maxSalary";
        }

        if (!empty($experience)) {
            $experienceValue = $experience;
        
            if (strpos($experienceValue, '<') !== false) {
                $minExperience = 0;
                $maxExperience = (int)str_replace('<', '', $experienceValue);
            } elseif (strpos($experienceValue, '>') !== false) {
                $minExperience = (int)str_replace('>', '', $experienceValue);
                $maxExperience = PHP_INT_MAX;
            } else {
                $rangeValues = explode('-', $experienceValue);
                $minExperience = $rangeValues[0];
                $maxExperience = $rangeValues[1];
            }
        
            $sql .= " AND experience BETWEEN $minExperience AND $maxExperience";
        }

        if (!empty($location)) {
            $sql .= " AND location = '$location'";
        }

        $result = mysqli_query($conn, $sql);

        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }
    
    function ehNameShow($id){
        $conn = getConnection();
        $sql10 = "SELECT * FROM company WHERE userID=$id;";
        $result = mysqli_query($conn,$sql10);

        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);    
            return $row; 
        }else{
            return false;
        }
    }

    function deletejobbyadmin($uID){
        $conn = getConnection();
        $sql1 = "DELETE FROM job WHERE id = $uID;";
        $result = mysqli_query($conn,$sql1);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    function retrieveCandidate($id){
        $conn = getConnection();

        $compNameQuery = "SELECT name FROM company WHERE userID = $id";
        $compNameResult = mysqli_query($conn, $compNameQuery);

        if ($compNameResult) {
            $row = mysqli_fetch_assoc($compNameResult);
            $retrComp = $row['name'];

            $appliedJobsQuery = "SELECT * FROM seekerappliedjobs WHERE comp_name = '$retrComp' AND approval = 0";
            $appliedJobsResult = mysqli_query($conn, $appliedJobsQuery);

            if ($appliedJobsResult) {
                $data = array();
                while ($row = mysqli_fetch_assoc($appliedJobsResult)) {
                    $data[] = $row;
                }
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function approveCandidate($jobid,$comid){
        $conn = getConnection();

        $selectCompanyInfoQuery = "SELECT email, contact FROM company WHERE userID = $comid";
        $companyInfoResult = mysqli_query($conn, $selectCompanyInfoQuery);

        if ($companyInfoResult) {
            $companyInfo = mysqli_fetch_assoc($companyInfoResult);

            $cmail = $companyInfo['email'];
            $cphone = $companyInfo['contact'];

            $updateQuery = "UPDATE seekerappliedjobs SET approval = 1, comp_mail = '$cmail', comp_number = '$cphone' WHERE id = $jobid";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

       /* ========================= Fahim ================================ */

    function sekRegistration($sekdata) 
    {
        $conn = getConnection();
    
        $s1 = $sekdata['sekname'];
        $s2 = $sekdata['username'];
        $s3 = $sekdata['sekemail'];
        $s4 = $sekdata['sekpass'];
  
    
        $sql = "INSERT INTO login (username, email, password ,usertype)
        VALUES ('$s2', '$s3', '$s4', 'seeker');";
        $result = mysqli_query($conn, $sql);

        
        $lastID = mysqli_insert_id($conn);
        
        $sql1 = "INSERT INTO seekerinfo (userID, name, email)
        VALUES ('$lastID', '$s1', '$s3');";
        $result1=mysqli_query($conn,$sql1);
            
        $sql2 = "INSERT INTO seekereducation (userID, email)
        VALUES ('$lastID','$s3');";
        $result2=mysqli_query($conn, $sql2);
    
        $sql3 = "INSERT INTO seekerskill (userID, email)
        VALUES ('$lastID','$s3');";
        $result3=mysqli_query($conn, $sql3);
    
        $sql4 = "INSERT INTO seekerworkexperience (userID, email)
        VALUES ('$lastID','$s3');";
        $result4=mysqli_query($conn, $sql4);
            
        if ($result && $result1 && $result2 && $result3 && $result4)
        {
            return true;
        } 
        else
        {
            return false;
        }
    }


    /* ========================= seeker Change Password ================================ */

    function retypepassCheck($userID){
        $conn = getConnection();
        $sqlUserCheck = "SELECT password FROM login WHERE id = $userID";
        $result = mysqli_query($conn, $sqlUserCheck);
        
        $row = mysqli_fetch_assoc($result);
        return $row['password'];
        
    }


    function myChangePassword($userID, $newpass){
        $conn = getConnection();
        $sql = "UPDATE login SET password = '$newpass' WHERE id = '$userID' ";
        $result = mysqli_query($conn, $sql);
        //$user = mysqli_fetch_assoc($result);
        
        return $result['password'];
    }

    /* ================ Check duplicate username and email in the database ============== */

    function checkusername($name){
        $conn = getConnection();
        $sqlUserCheck = "SELECT * FROM login WHERE username = '$name' ";
        $result = mysqli_query($conn, $sqlUserCheck);

        while ($row = mysqli_fetch_assoc($result)) {
            return $row['username'];     
        }
    }

    function checksekemail($email){
        $conn = getConnection();
        $sqlUserCheck = "SELECT * FROM login WHERE username = '$email' ";
        $result = mysqli_query($conn, $sqlUserCheck);

        while ($row = mysqli_fetch_assoc($result)) {
            return $row['email'];     
        }
    }

    /* ================ Upload Picture ============== */

    // function upload_Picture($userID, $image)
    // {
    //     $conn = getConnection();
    //     $sql = "UPDATE seekerinfo SET Picture ='{$image}' WHERE id = '{$userID}'";
    //     $result = mysqli_query($conn, $sql);
    
    //     return $result['Picture'];
    // } 
    


    function myEducationDB($userID, $degname, $year1, $instname)
    {
        $conn = getConnection();
        $sql = "UPDATE seekereducation SET 
        deg_name = '$degname', yeartoyear = '$year1', ins_name = '$instname' WHERE userID = '$userID' ";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    function myProfileDetails($userID){
        $conn = getConnection();
        $sqlUserCheck = "SELECT * FROM seekerinfo WHERE userID = $userID;";
        $result = mysqli_query($conn, $sqlUserCheck);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function myProfileDB($userID, $name, $profTitle, $gender, $age, $cgpa, $salary, $experience, 
    $website,  $aboutMe, $phone, $email, $address, $city, $google, $twitter, $facebook, $linkedin) 
    {
        $conn = getConnection();
        $sql = "UPDATE seekerinfo SET
            name = '$name',
            prof_title = '$profTitle',
            gender = '$gender',
            age = $age,
            cgpa = '$cgpa',
            salary = $salary,
            experience = $experience,
            website = '$website',
            aboutMe = '$aboutMe',
            phone = '$phone',
            email = '$email',
            address = '$address',
            city = '$city',
            google = '$google',
            twitter = '$twitter',
            facebook = '$facebook',
            linkedin = '$linkedin'
            WHERE userID = '$userID' ";

        $result = mysqli_query($conn,$sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    function mySkillsDB($userID, $skillname, $skillpercent)
    {
        $conn = getConnection();
        $sql = "UPDATE seekerskill SET 
        skill = '$skillname, $skillpercent' WHERE userID = $userID ";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function myWorkDB($userID, $designationtitle, $y1, $y2, $compname)
    {
        $conn = getConnection();
        $sql = "UPDATE seekerworkexperience SET 
        year = '$y1 - $y2', designation = '$designationtitle', description = '$compname'  WHERE userID = '$userID' ";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function applySeekerJob($compName, $salary, $title, $category, $type, $seekerID)
    {
        $conn = getConnection();
    
        // Check if the job application already exists
        $checkSql = "SELECT * FROM seekerappliedjobs WHERE comp_name='$compName' AND salary='$salary' AND title='$title' AND category='$category' AND type='$type' AND userID=$seekerID";
        
        $checkResult = mysqli_query($conn, $checkSql);
    
        if (mysqli_num_rows($checkResult) > 0) {
            // Job application already exists
            return false;
        }else{
            // If not, insert the job application
            $insertSql = "INSERT INTO seekerappliedjobs (comp_name, salary, title, category, type, userID, approval)
            VALUES ('$compName','$salary','$title','$category','$type', $seekerID, 0);";

            $result = mysqli_query($conn, $insertSql);

            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }
    
    function deleteApplyJob($sID) 
    {
        $conn = getConnection();
    
        $sql = "DELETE FROM seekerappliedjobs WHERE id = $sID";
        $result = mysqli_query($conn, $sql);
    
        if ($result) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    function getAllSeekerApprovedJobs()
    {
        $conn = getConnection();
    
        $sql = "SELECT * FROM seekerappliedjobs";
        $result = mysqli_query($conn, $sql);
        $info = [];

        while($user = mysqli_fetch_assoc($result))
        {
            array_push($info, $user);
        }
        
        return $info;
    }

    function getAllSeekerAppliedJobs()
    {
        $con = getConnection();
        $sql = "SELECT * FROM seekerappliedjobs";
        $result = mysqli_query($con, $sql);
        $info = [];
        
        while($user = mysqli_fetch_assoc($result))
        {
            array_push($info, $user);
        }
        
        return $info;
    }

    function updatePictureDB($userID, $filename) 
    {
        $conn = getConnection();
        $sql = "UPDATE seekerinfo SET picture = '$filename' WHERE userID = $userID";
        $result = mysqli_query($conn,$sql);

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function updateCVDB($userID, $filename) 
    {
        $conn = getConnection();
        $sql = "UPDATE seekerinfo SET file_name = '$filename' WHERE userID = $userID";
        $result = mysqli_query($conn,$sql);

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    function getAllaboutMeDB($id)
    {
        $con = getConnection();
    
        $sql = "SELECT seekerinfo.*, seekereducation.*, seekerskill.*, seekerworkexperience.*
                FROM seekerinfo
                JOIN seekereducation ON seekerinfo.userID = seekereducation.userID
                JOIN seekerskill ON seekerinfo.userID = seekerskill.userID
                JOIN seekerworkexperience ON seekerinfo.userID = seekerworkexperience.userID
                WHERE seekerinfo.userID = $id";
    
        $result = mysqli_query($con, $sql);
    
        $user = mysqli_fetch_assoc($result);
        return $user;
    }
    

    function getImagePath($ID){
        $conn = getConnection();
        $sql = "SELECT picture FROM seekerinfo WHERE userID = $ID";
        $result = mysqli_query($conn,$sql);
        if($result){
            $data = mysqli_fetch_assoc($result);
            return $data['picture'];
        }else{
            return false;
        }
    }

 /* ************************ Fahim end**************************** */

?>