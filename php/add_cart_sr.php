<?php
include "config.php";

$rid = $_POST['rid'];
$pid =  $_POST['pid'];
$sid =  $_POST['sid'];
$pp =  $_POST['pp'];
$time = $_POST['time'];
$status = $_POST['status'];
$quantity = $_POST['quantity'];
$total = $quantity * $pp;

$sql = "INSERT INTO cart(rid,pid,price,quantity,`time`,`status`,sr) VALUES ($rid,$pid,$pp,$quantity,'$time','$status',$sid)";
$result = mysqli_query($con, $sql);

$sql4 = "SELECT MAX(id) AS cid FROM cart ";
$result4 = mysqli_query($con, $sql4);
$row4 = mysqli_fetch_assoc($result4);
$cid =  $row4['cid'];
// ----------------------
$sql3 = "INSERT INTO pro(pid,rid,sr,`status`,cart) VALUES ($pid,$rid,$sid,'no',$cid)";
$result3 = mysqli_query($con, $sql3);
// --------------------------------
$sql1 = "SELECT * FROM pro WHERE pid = $pid AND rid = $rid ";
$result1 = mysqli_query($con, $sql1);
$row = mysqli_fetch_assoc($result1);
$cur_total = $row['total'];
// ----------------------------
$full_total = $cur_total + $total;

$sql2 = "UPDATE pro SET total = $full_total WHERE pid = $pid AND rid = $rid";
$result2 = mysqli_query($con, $sql2);
