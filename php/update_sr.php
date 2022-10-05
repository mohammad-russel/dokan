<?php
include "config.php";

$id = $_POST['id'];
$name = $_POST['name'];
$deller = $_POST['deller'];
$number = $_POST['number'];
$company = $_POST['company'];

$sql1 = "UPDATE sr SET nam='$name',num=$number, company='$company',deller='$deller' WHERE id = $id ";
$query1 = mysqli_query($con, $sql1);
header("location:../admin/sr_overview.php?sr=$id");
