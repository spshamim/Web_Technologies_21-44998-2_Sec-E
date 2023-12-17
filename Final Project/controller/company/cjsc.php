<?php
    require_once("../../model/userModel.php");

    $jsonData = $_POST['data'];
    $data = json_decode($jsonData, true); // True = For associative array, if not given then it will return an object

    $title = $data['title'];
    $comp_name = $data['comp_name'];
    $category = $data['category'];
    $type = $data['type'];
    $salary = $data['salary'];
    $experience = $data['experience'];
    $location = $data['location'];

    $jobs = searchJobs($title, $comp_name, $category, $type, $salary, $experience, $location);

    if (!empty($jobs)) {
        echo json_encode($jobs);
    } else {
        echo "e1";
    }

?>
