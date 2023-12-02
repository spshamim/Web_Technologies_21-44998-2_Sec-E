<html>
    <head>
        <script src="../js/updatedelete.js"></script>
    </head>
    <body>
        <?php
    require_once("../model/userModel.php");
    require_once('../controller/adminsession.php');

    $username = $_POST['uname'];
    $result = getSearchedUser($username);

    if ($result) {
        $response = '<td style="background-color: #d3d3d3;">' . $result['empname'] . '</td>' .
                    '<td style="background-color: #d3d3d3;">' . $result['contactno'] . '</td>' .
                    '<td style="background-color: #d3d3d3;">' . $result['username'] . '</td>' .
                    '<td style="background-color: #d3d3d3;">' . $result['password'] . '</td>' .
                    '<td style="background-color: #d3d3d3;">' .
                    '<a style="background-color: greenyellow; color:black; font-weight:bold;text-decoration:none; border:2px solid black" href="#" onclick="updateEmp(\'' . $result['userID'] . '\')"> UPDATE </a> | ' .
                    '<a style="background-color: greenyellow; color:black; font-weight:bold;text-decoration:none; border:2px solid black" href="#" onclick="deleteEmp(\'' . $result['userID'] . '\')"> DELETE </a>' .
                    '</td>';
    } else {
        $response = '<td style="background-color: #d3d3d3;text-align:center ;font-weight:bold;" colspan="5">User not found</td>';
    }

    echo $response;
    ?>

    </body>
</html>

