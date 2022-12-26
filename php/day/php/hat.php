<?php
@include "../../config.php";$hat = $_POST['hat'];
$uni = $_POST['union_option'];
$sql = "INSERT INTO hat (hat_nam,uni) VALUES ('$hat',$uni)";
$result = mysqli_query($con,$sql);
?>