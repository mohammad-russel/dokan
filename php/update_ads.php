<?php


include "config.php";
// $number =  mysqli_real_escape_string($con, $_POST['number']);
// $password =  mysqli_real_escape_string($con, $_POST['password']);
// $time =  mysqli_real_escape_string($con, $_POST['time']);
// $name =  mysqli_real_escape_string($con, $_POST['name']);
// $company =  mysqli_real_escape_string($con, $_POST['company']);
// $deller =  mysqli_real_escape_string($con, $_POST['deller']);
// $srnn = "sr_" . $company . "_" . $name;

$ads =  $_POST['ads'];
// $rpic =  $_FILES['pic']['name'];
// $rtmp = $_FILES['pic']['tmp_name'];
$sql = "UPDATE ads SET adss = '$ads' ";

// move_uploaded_file($rtmp,  "../image/ads/" . $rpic);

$result = mysqli_query($con, $sql);
header("location:../admin/admin_other.php");
