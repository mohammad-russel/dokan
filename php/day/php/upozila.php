<?php
@include "../../config.php";$upozila = $_POST['upozila'];
$sql = "INSERT INTO upozila (upozila_nam) VALUES ('$upozila')";
$result = mysqli_query($con,$sql);
?>