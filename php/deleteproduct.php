<?php
include "config.php";
$id = $_POST['id'];
$sql = "DELETE FROM product WHERE id = $id ";
$result = mysqli_query($con, $sql);
if ($result) {
    $sql = "DELETE FROM cart WHERE pid = $id ";
    $result = mysqli_query($con, $sql);
} else {
    echo 2;
}
