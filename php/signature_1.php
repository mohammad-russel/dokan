<?php
$sig_string = $_POST['signature'];
include "config.php";
$sig = $_POST['sig'];
$st = $_POST['st'];
$rid = $_POST['rid'];
$discount = $_POST['discount'];
$item = $_POST['item'];
$time = $_POST['time'];
$products = $_POST['products'];
$sql = "INSERT INTO `order`(`signature`,`item`,`total`,`discount`,`products`,`time`,`retailer`,`status`) VALUES ('$sig',$item,$st,$discount,'$products','$time',$rid,'baki')";
$result = mysqli_query($con, $sql);
$nama_file = "../image/signature/$sig";
file_put_contents($nama_file, file_get_contents($sig_string));
if (file_exists($nama_file)) {
  echo "<p>File Signature berhasil disimpan - " . $nama_file . "</p>";
  echo "<p style='border:solid 1px teal;width:355px;height:110px;'><img src='" . $nama_file . "'></p>";
}


$sql = "UPDATE cart SET status = 'baki' WHERE rid = $rid  AND status = 'order'";
$result = mysqli_query($con, $sql);
header("location:../delivery_man/retailer_overview.php?rid=$rid");