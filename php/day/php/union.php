<?php
@include "../../config.php";
$union = $_POST['union'];
$uo = $_POST['upozila_option'];
$sql = "INSERT INTO `union` (uni_nam,upo) VALUES ('$union',$uo)";
$result = mysqli_query($con,$sql);
