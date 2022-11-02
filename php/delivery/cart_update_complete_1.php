<?php
include "../config.php";
$rid = $_GET['rid'];
$sql = "UPDATE cart SET status = 'complete' WHERE rid = $rid  AND status = 'baki'";
$result = mysqli_query($con, $sql);
if ($result) {
    $rid = $_GET['rid'];
    $sql = "UPDATE `order` SET status = 'complete' WHERE retailer = $rid  AND status = 'baki'";
    $result = mysqli_query($con, $sql);
}
header("location:https://happybd.online/delivery_man/retailer_overview.php?rid=$rid");
