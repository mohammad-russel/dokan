<?php
include "config.php";
$cid = $_POST['cid'];
$sql = "DELETE FROM cart WHERE id = $cid ";
$result = mysqli_query($con,$sql);
?>