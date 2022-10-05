<?php
include "config.php";

$id = $_GET['id'];
$sql = "DELETE FROM sr WHERE id = $id";
$query = mysqli_query($con, $sql);
header("location:../admin/sr.php");
