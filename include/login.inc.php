<?php
if (isset($_POST['submit'])) {
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);


    include_once('./dbConn.inc.php');

    $sql = "SELECT * FROM users WHERE phone='$phone' AND password='$password';";

    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            if ($row['phone'] == $phone && $row['password'] == $password) {
                session_start();
                $_SESSION['logged'] = 'true';
                $_SESSION['uid'] = $row['uid'];
                if ($row['type'] == 'admin') {
                    header("location: ../pages/admin.php?q=" . $row['name']);
                } else {
                    header("location: ../pages/profile.php?q=" . $row['name']);
                }
            }
        }
    } else {
        header("location: ../pages/login.php?msg=failed");
    }
}
