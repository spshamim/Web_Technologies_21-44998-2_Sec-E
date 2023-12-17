<?php

    require_once("../../controller/companysession.php");
    require_once("../../model/userModel.php");
    session_start();

    $encryptionKey = "kieuTTQQpl)(8!nn"; //Encryption key (secret)
    $id = openssl_decrypt($_COOKIE['cid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
?>

<html>
    <head>
        <title>COMPANY</title>
    </head>
    <body>
        <div>
            <table width="100%" style="padding: 15px; background-color: #00a1de; color: white; font-family: Verdana;">
                <tr>
                    <td width="" align="left"><img src="../../asset/logo.png" alt="" srcset="" height="80" width="280"></td>
                    <td width="" align="left" style="font-size:25px; padding-right:300px; font-weight:bold">Welcome,&nbsp&nbsp" 
                        <?php
                            if(isset($_COOKIE['cid'])){
                                $row = ehNameShow($id);
                                echo $row['name'];
                            }
                            else {
                                echo "Unknown..!";
                            }
                        ?> "
                    </td>
                    <td width="" align="center">&nbsp</td>
                    <td width="" align="center">&nbsp</td>
                    <td width="" align="center">&nbsp</td>
                    <td width="" align="right"><a href="../../controller/logout.php?msg=rc" style="text-decoration : none; font-size:25px; color:white ;">Log out</a></td>
                </tr>
            </table>
        </div>
    </body>
</html>