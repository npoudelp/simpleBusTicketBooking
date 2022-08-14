<?php
$dbUrl = '127.0.0.1';
$dbUsername = "root";
$dbPassword = "root";
$dbName = "dTicket";

$conn = mysqli_connect($dbUrl, $dbUsername, $dbPassword, $dbName);
if(!$conn){
    die($conn);
}