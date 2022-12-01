<?php
include "config.php";
$rid = $_POST['rid'];

$sql ="UPDATE cart SET status = 'order' WHERE rid = $rid AND status ='cart' ";
$result= mysqli_query($con,$sql);

header("location:../retailer/homepage.php");

?>