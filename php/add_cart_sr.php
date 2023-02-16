<?php
include "config.php";

$rid = $_POST['rid'];
$pid =  $_POST['pid'];
$sid =  $_POST['sid'];
$pp =  $_POST['pp'];
$time = $_POST['time'];
$status = $_POST['status'];
$quantity = $_POST['quantity'];
$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['day'];
$ymd = $_POST['ymd'];
$deller = $_POST['deller'];
$total = $quantity * $pp;

$sql = "INSERT INTO cart(rid,pid,price,quantity,`time`,`status`,sr,deller,`year`,`month`,`day`,`ymd`) VALUES ($rid,$pid,$pp,$quantity,'$time','$status',$sid ,$deller,$year,$month,$day,$ymd)";
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

// ====================
$sql11 = "SELECT * FROM product WHERE id = $pid ";
$query11 = mysqli_query($con, $sql11);
$row1 = mysqli_fetch_assoc($query11);
$current_stock = $row1['stock'];
$us = $current_stock - $quantity;
$sql12 = "UPDATE product SET stock = $us WHERE id=$pid";
$query12 = mysqli_query($con, $sql12);