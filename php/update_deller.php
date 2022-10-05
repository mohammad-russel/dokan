<?php
include "config.php";

$id = $_POST['id'];
$name = $_POST['name'];
$number = $_POST['number'];
$company = $_POST['company'];

$sql1 = "UPDATE deller SET nam='$name',num=$number, company='$company' WHERE id = $id ";
$query1 = mysqli_query($con, $sql1);
header("location:../admin/deller_overview.php?deller=$id");
