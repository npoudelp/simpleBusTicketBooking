<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $passwordR = $_POST['passwordR'];
    $type = 'users';
    if($password != $passwordR){
        header("location: ../pages/signup.php?msg=failed");
    }
    include_once("./dbConn.inc.php");
    $sql = "INSERT INTO users (name, phone, address, password, type) VALUES ('$name', '$phone', '$address', '$password', '$type');";
    $res = mysqli_query($conn, $sql);
    if($res){
        header("location: ../pages/signup.php?msg=success");
    }else{
        header("location: ../pages/signup.php?msg=failed");
    }

}