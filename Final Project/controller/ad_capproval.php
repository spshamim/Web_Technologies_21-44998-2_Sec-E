<?php

require_once "../model/userModel.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['approve'])) {
        $uID = $_GET['approve'];
        updateCompanyApproval($uID);
    }
}

header("location: ../view/admin.php");
exit;

?>
