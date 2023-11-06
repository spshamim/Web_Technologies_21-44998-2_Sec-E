<html>
    <head>
        <title>ADMIN HOMEPAGE</title>
        <?php
            include "../model/userModel.php";
            require_once('../controller/adminsession.php');
            $loginID=0;

            if(isset($_SESSION['aid'])){
                /* session used */
                $loginID=$_SESSION['aid'];

                /* normal cookie */
                //$loginID=$_COOKIE['aid']; //if found store

                /* encrypted cookie used */
                //$encryptionKey = "kieuTTQQpl)(8!nn";
                //$loginID = openssl_decrypt($_COOKIE['aid'], 'aes-256-cbc', $encryptionKey, 0, $encryptionKey);
            }
        ?>
    </head>
    <body>
        <div>
        <table width="100%" style="padding: 15px; background-color: #00a1de; color: white; font-family: Verdana;">
            <tr>
            <td width="" align="left"><img src="../asset/logo.png" alt="" srcset="" height="80" width="280"></td>
                <td width="" align="left" style="font-size:25px; padding-right:300px; color:black; font-weight:bold">Welcome,&nbsp&nbsp" 
                <?php
                    if(isset($_SESSION['aid'])){
                        $row = ahNameShow($loginID);
                        echo $row['username'];
                    }
                    else {
                        echo "Unknown..!";
                    }
                ?> "
                </td>
                <td width="" align="right"><a href="../controller/logout.php?msg=ra" style="text-decoration : none; font-size:25px; color:black; font-weight:bold">Logout</a></td>
            </tr>
        </table>
        </div>
    </body>
</html>
