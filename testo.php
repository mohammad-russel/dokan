<?php
@include "php/config.php";
$pid = $_POST['pid'];
$rid = $_POST['rid'];
$sr = $_POST['sr'];
$total = $_POST['total'];
$sql3 = "INSERT INTO pro(pid,rid,sr) VALUES ($pid,$rid,$sr)";
$result3 = mysqli_query($con,$sql3);
// --------------------------------
$sql1 = "SELECT * FROM pro WHERE pid = $pid";
$result1 = mysqli_query($con,$sql1);
$row = mysqli_fetch_assoc($result1);
$cur_total = $row['total'];
// ----------------------------
$full_total = $cur_total+$total;

$sql2 = "UPDATE pro SET total = $full_total WHERE pid = $pid";
$result2 = mysqli_query($con,$sql2);

header("location:test.php");
?>