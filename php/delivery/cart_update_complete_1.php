<?php
include "../config.php";
$rid = $_GET['rid'];
$sql = "UPDATE cart SET status = 'complete' WHERE rid = $rid  AND status = 'baki'";
$result = mysqli_query($con, $sql);
header("location:http://localhost/dokan/delivery_man/retailer_overview.php?rid=$rid");