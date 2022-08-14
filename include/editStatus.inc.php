<?php
if(isset($_REQUEST['bid'])){
    $bid = $_REQUEST['bid'];
    $status = $_REQUEST['s'];

    include_once('./dbConn.inc.php');

    $sql = "";
    if($status == 0){
        $sql = "UPDATE book SET status=1 WHERE bid=$bid;";
    }
    if($status == 1){
        $sql = "UPDATE book SET status=0 WHERE bid=$bid;";
    }

    $res = mysqli_query($conn, $sql);
    if($res){
        header('location:../pages/admin.php?msg=success');
    }else{
        header('location:../pages/admin.php?msg=failed');
    }
}