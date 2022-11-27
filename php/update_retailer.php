<?php
include "config.php";

$id = $_POST['id'];
$name = $_POST['name'];
$shop = $_POST['shop'];
$number = $_POST['number'];
$area = $_POST['area'];

$sql1 = "UPDATE retailer SET nam='$name',num=$number, area='$area',shopname='$shop' WHERE id = $id ";
$query1 = mysqli_query($con, $sql1);
header("location:../admin/retailer_overview.php?retailer=$id");
