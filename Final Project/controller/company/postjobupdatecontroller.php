<?php
    require_once("../../model/userModel.php");
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Title Validation
        $title = $_POST['title'];
        function containsNumbersOrSpecialChars($input) {
            for ($i = 0; $i < strlen($input); $i++) {
                if (!isLetterOrSpace($input[$i])) {
                    return true;
                }
            }
            return false;
        }
        function isLetterOrSpace($char) {
            return (($char >= 'a' && $char <= 'z') || ($char >= 'A' && $char <= 'Z') || $char === ' ');
        }

        if (strlen($title) < 2 || containsNumbersOrSpecialChars($title)) {
            $_SESSION["title_err"] = "Title must be at least 2 characters long, and should not contain numbers or special characters.";
        }

        // Type Validation
        $type=$_POST['type'];
        if (empty($type)) {
            $_SESSION['type_err']="Please select a job type.";
        } 

    // Location Validation
    $location = $_POST['location'];
    function isDigit($char) {
        return ($char >= '0' && $char <= '9');
    }
    function containsNumbers($input) {
        for ($i = 0; $i < strlen($input); $i++) {
            if (isDigit($input[$i])) {
                return true;
            }
        }
        return false;
    }
    function isEmptyOrContainsNumbers($input) {
        // Check if the input is empty or contains numbers
        return trim($input) === "" || containsNumbers($input);
    }

    if (isEmptyOrContainsNumbers($location)) {
        $_SESSION['loc_err'] = "Location should not be empty and should not contain numbers.";
    }

    // Category Validation
    $category = $_POST['category'];
    if (empty($category)) {
        $_SESSION['cat_err']="Please select a category.";
    }

    // Experience Validation
    $exp = $_POST['exp'];
    function isEmptyOrNotInteger($input) {
        return trim($input) === "" || !is_numeric($input) || floor($input) != $input;
    }

    if (isEmptyOrNotInteger($exp)) {
        $_SESSION['exp_err'] = "Experience must be a non-empty integer.";
    }

    // Salary Validation
    $salary = $_POST['salary'];
    function isInteger($input) {
        // Check if the input is a valid integer
        return is_numeric($input) && floor($input) == $input;
    }
    function isEmptyOrNotInteger3($input) {
        // Check if the input is empty or not a valid integer
        return trim($input) === "" || !isInteger($input);
    }

    if (isEmptyOrNotInteger3($salary)) {
        $_SESSION['sal_err'] = "Salary must be a non-empty integer.";
    }

    // Vacancy Validation
    $vacancy = $_POST['vacancy'];
    function isInteger2($input) {
        // Check if the input is a valid integer
        return is_numeric($input) && floor($input) == $input;
    }

    function isEmptyOrNotInteger2($input) {
        // Check if the input is empty or not a valid integer
        return trim($input) === "" || !isInteger2($input);
    }
    
    if (isEmptyOrNotInteger2($vacancy)) {
        $_SESSION['vac_err'] = "Vacancy must be a non-empty integer.";
    }

    // Description Validation
    $desc = $_POST['desc'];
    if (trim($desc) === "" || strlen($desc) < 5) {
        $_SESSION['desc_err'] = "Description must not be empty and should be at least 5 characters long.";
    }

    if (
        !isset($_SESSION["title_err"]) &&
        !isset($_SESSION['type_err']) &&
        !isset($_SESSION['loc_err']) &&
        !isset($_SESSION['cat_err']) &&
        !isset($_SESSION['exp_err']) &&
        !isset($_SESSION['sal_err']) &&
        !isset($_SESSION['vac_err']) &&
        !isset($_SESSION['desc_err'])
    ) {
        $data = array(
            'title'=> $_POST['title'],
            'type'=>$_POST['type'],
            'loc'=>$_POST['location'],
            'category'=>$_POST['category'],
            'exp'=>$_POST['exp'],
            'vac'=>$_POST['vacancy'],
            'salary'=>$_POST['salary'],
            'desc'=>$_POST['desc']
        );

        $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
        $name = openssl_decrypt($_COOKIE['cname'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
        $userID = $_SESSION['edit_user_id'];

        $status = updatejob($userID,$name,$data);

        if($status){
            $_SESSION['jb3']="Job Updated Successfully...!";
            header("location: ../../view/comp_after_login/company_dash.php");
        }else{
            $_SESSION["jb4"] = "database error occurred..!";
            header("location: ../../view/comp_after_login/empupdatejob.php");
        }
        unset($_SESSION['edit_user_id']);
    }else{
        header("location: ../../view/comp_after_login/empupdatejob.php");
    }  
        
    }
?>