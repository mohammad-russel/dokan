<?php
include "../config.php";
$id = $_POST['id1'];
$time = $_POST['time1'];
$sql = "UPDATE cart SET status = 'complete', time = '$time'  WHERE id = $id ";
$result = mysqli_query($con,$sql);
