<?php
include "../config.php";
$id = $_POST['id'];
$time = $_POST['time'];
$sql = "UPDATE cart SET status = 'baki', time = '$time'  WHERE id = $id ";
$result = mysqli_query($con,$sql);
