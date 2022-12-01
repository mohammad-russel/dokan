<?php
include "config.php";

$rid = $_POST['rid'];
$pid =  $_POST['pid'];
$pp =  $_POST['pp'];
$time = $_POST['time'];
$sid =  $_POST['sid'];
$status = $_POST['status'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO cart(sr,rid,pid,price,quantity,`time`,`status`) VALUES ($sid,$rid,$pid,$pp,$quantity,'$time','$status')";
$result = mysqli_query($con, $sql);
