<?php
include "config.php";
if (isset($_POST['addproduct'])) {
    $id = $con->real_escape_string($_POST['id']);
    $stock = $con->real_escape_string($_POST['stock']);
    $sql1 = "SELECT * FROM product WHERE id = $id ";
    $query1 = mysqli_query($con, $sql1);
    $row = mysqli_fetch_assoc($query1);
    $current_stock = $row['stock'];
    $us = $current_stock + $stock;
    $sql = "UPDATE product SET stock = $us WHERE id=$id";
    $query = mysqli_query($con, $sql);
}

header("location:../admin/admin_product.php");
