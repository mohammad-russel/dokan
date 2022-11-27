<?php
include "config.php";
$id = $_GET['id'];
$sql = "DELETE FROM product WHERE id = $id ";
$result = mysqli_query($con, $sql);
if ($result) {
    $sql = "DELETE FROM cart WHERE pid = $id ";
    $result = mysqli_query($con, $sql);
    header("location:../admin/admin_product.php");
} else {
    echo "no";
}
