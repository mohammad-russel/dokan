<?php
include "../config.php";
$id = $_POST['id'];
$sql = "DELETE FROM cart WHERE id = $id";
$result = mysqli_query($con,$sql);
$sql2 = "DELETE FROM pro WHERE cart = $id ";
$result2 = mysqli_query($con,$sql2);
