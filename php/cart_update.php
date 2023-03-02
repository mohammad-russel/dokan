<?php
include "config.php";
$cid = $_POST['cid'];
$qua = $_POST['qua'];
$discount = $_POST['discount'];
$sql = "UPDATE cart SET discount = $discount WHERE id = $cid ";
$result = mysqli_query($con, $sql);
$sql1 = "UPDATE cart SET quantity = $qua WHERE id = $cid ";
$result1 = mysqli_query($con, $sql1);
?>
