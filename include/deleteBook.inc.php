<?php

include_once('./dbConn.inc.php');
if (isset($_REQUEST['bid'])) {
    $bid = $_REQUEST['bid'];

    $sql1 = "DELETE FROM book WHERE bid=$bid;";

    $res = mysqli_query($conn, $sql1);
    if ($res) {
        header('location:../pages/admin.php?msg=success');
    } else {
        header('location:../pages/admin.php?msg=failed');
    }
}
else{
    header('location:../pages/login.php');
}