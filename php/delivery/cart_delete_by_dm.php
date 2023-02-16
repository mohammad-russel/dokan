<?php
include "../config.php";
$id = $_POST['id'];

$sql1 = "SELECT * FROM cart WHERE id = $id";
$result1 = mysqli_query($con,$sql1);
$row = mysqli_fetch_assoc($result1);
$quantity = $row['quantity'];
$pid = $row['pid'];

$sql3 = "SELECT * FROM product WHERE id = $pid ";
$query1 = mysqli_query($con, $sql3);
$row1 = mysqli_fetch_assoc($query1);
$current_stock = $row1['stock'];
$us = $current_stock + $quantity;
$sql4 = "UPDATE product SET stock = $us WHERE id = $pid";
$query = mysqli_query($con, $sql4);

$sql = "DELETE FROM cart WHERE id = $id";
$result = mysqli_query($con,$sql);
$sql2 = "DELETE FROM pro WHERE cart = $id ";
$result2 = mysqli_query($con,$sql2);
