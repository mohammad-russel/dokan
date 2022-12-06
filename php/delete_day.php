<?php
include "config.php";
$id = $_GET['id'];
$sql = "DELETE FROM delivery WHERE id = $id";
$result = mysqli_query($con,$sql);
header("location:../admin/admin_setday.php");
?>