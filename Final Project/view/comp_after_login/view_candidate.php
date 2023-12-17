<?php
    include_once("empheader.php");
?>

<html>
    <head>
        <script src="../../js/view_candidate.js"></script>
        <link rel="stylesheet" href="../../asset/css/com_login/view_candidate.css">
    </head>
    <body onload="retrCandidate()">
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

                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>

<?php
    include_once ('../footer.php');
?>