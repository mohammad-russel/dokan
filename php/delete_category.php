<?php
include "config.php";
$id = $_GET['id'];
$sql = "DELETE FROM category WHERE id = $id";
$result = mysqli_query($con,$sql);
header("location:../admin/admin_categories.php");
?>