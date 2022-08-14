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

if (isset($_REQUEST['id'])) {
    $bid = $_REQUEST['id'];



    $sql = "DELETE FROM book WHERE bid=$bid;";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('location:../pages/profile.php?msg=success');
    } else {
        header('location:../pages/profile.php?msg=failed');
    }
}
