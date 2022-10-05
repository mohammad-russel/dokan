<?php
                include "config.php";

$rid = $_POST['rid'];
$pid =  $_POST['pid'];
$sid =  $_POST['sid'];
$pp =  $_POST['pp'];
$time = $_POST['time'];
$status = $_POST['status'];
$quantity = $_POST['quantity'];
$sql = "INSERT INTO cart(rid,pid,price,quantity,time,status,sr) VALUES ($rid,$pid,$pp,$quantity,'$time','$status',$sid)";
$result = mysqli_query($con, $sql);

