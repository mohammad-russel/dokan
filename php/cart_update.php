<?php
include "config.php";
$cid = $_POST['cid'];
$qua = $_POST['qua'];
$sql ="UPDATE cart SET quantity = $qua WHERE id = $cid ";
$result= mysqli_query($con,$sql);
?>