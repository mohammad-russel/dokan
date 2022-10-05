<?php
include "config.php";
$rid = $_POST['rid'];
$sid = $_POST['sid'];
$discount = $_POST['discount'];
$status = $_POST['status'];
$sql ="UPDATE cart SET status = '$status', discount = $discount WHERE rid = $rid  AND status ='cart' AND sr = $sid ";
$result= mysqli_query($con,$sql);

header("location:../sr/retailer.php");

?>