<?php

if(isset($_REQUEST['submit'])){
    include_once('./dbConn.inc.php');

    $initial = $_POST['initial'];
    $final = $_POST['final'];
    $busNo = $_POST['busNo'];
    $rate = $_POST['rate'];
    
    $sql = "INSERT INTO route (initial, final, busNo, rate) VALUES ('$initial', '$final', '$busNo', '$rate');";

    $res = mysqli_query($conn, $sql);

    if($res){
        header("location: ../pages/addRoute.php?msg=success");
    }else{
        header("location: ../pages/addRoute.php?msg=failed");
    }
}