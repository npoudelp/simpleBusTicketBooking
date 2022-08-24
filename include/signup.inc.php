<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = md5($_POST['password']);
    $passwordR = md5($_POST['passwordR']);
    
    $type = 'users';
    if ($password != $passwordR) {
        header("location: ../pages/signup.php?msg=failed");
    }
    include_once("./dbConn.inc.php");

    $checkUsers = "SELECT * FROM users WHERE phone='$phone';";
    $check = mysqli_query($conn, $checkUsers);
    if (mysqli_num_rows($check) > 0) {
        while ($phone = mysqli_fetch_assoc($check)) {
            if ($phone['phone'] == $phone) {
                header("location: ../pages/signup.php?msg=phone_number_exists");
                die();
            }
        }
    }

    if ($password == $passwordR) {
        $sql = "INSERT INTO users (name, phone, address, password, type) VALUES ('$name', '$phone', '$address', '$password', '$type');";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            header("location: ../pages/signup.php?msg=success");
        } else {
            header("location: ../pages/signup.php?msg=failed");
        }
    } else {
        header("location: ../pages/signup.php?msg=password_confirm_not_matched");
    }
}
