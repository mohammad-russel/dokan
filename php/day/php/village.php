<?php
@include "../../config.php";$village = $_POST['village'];
$union = $_POST['union_option1'];
$sql = "INSERT INTO vllage (vill_nam,uni) VALUES ('$village',$union)";
$result = mysqli_query($con,$sql);
