<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);


if (isset($_REQUEST['rid'])) {
    session_start();
    $rid = $_REQUEST['rid'];
    $date = $_REQUEST['date'];
    $seatNo = $_REQUEST['seat'];
    $uid = $_SESSION['uid'];
    echo $uid;

    include_once('./dbConn.inc.php');

    $sql = "INSERT INTO book (uid, rid, date, seatNo, status) VALUES ($uid, $rid, '$date', '$seatNo', 0);";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        header("location: ../pages/bookTicket.php?msg=success");
    } else {
        header("location: ../pages/bookTicket.php?msg=failed");
    }
} else {
    header("location: ../pages/profile.php");
}
