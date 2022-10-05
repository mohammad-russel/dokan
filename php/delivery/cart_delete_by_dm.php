<?php
include "../config.php";
$id = $_POST['id'];
$sql = "DELETE FROM cart WHERE id = $id";
$result = mysqli_query($con,$sql);

?>