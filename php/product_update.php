<?php
include "config.php";
if (isset($_POST['addproduct'])) {
    $id = $con->real_escape_string($_POST['id']);
    $name = $con->real_escape_string($_POST['name']);
    $category = $con->real_escape_string($_POST['category']);
    $sr = $con->real_escape_string($_POST['sr']);
    $company = $con->real_escape_string($_POST['company']);
    $price = $con->real_escape_string($_POST['price']);
    $discription = $con->real_escape_string($_POST['discription']);
    $stock = $con->real_escape_string($_POST['stock']);
    $sql = "UPDATE product SET nam='$name',category='$category',sr='$sr',company='$company',discription='$discription',price=$price, stock = $stock WHERE id=$id";
    $query = mysqli_query($con, $sql);
}

header("location:../admin/admin_product.php");
