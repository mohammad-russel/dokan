<?php
include "config.php";
$cid = $_POST['cid'];
$sql = "DELETE FROM cart WHERE id = $cid ";
$result = mysqli_query($con,$sql);
$sql2 = "DELETE FROM pro WHERE cart = $cid ";
$result2 = mysqli_query($con,$sql2);
?>