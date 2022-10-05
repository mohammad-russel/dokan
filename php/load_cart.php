<?php
$rid = $_POST['id'];
include "config.php";

$sql = "SELECT * FROM cart WHERE rid = $rid AND status ='cart'";
$result = mysqli_query($con, $sql);
$row = mysqli_num_rows($result);
$output = "$row";
echo $output;
