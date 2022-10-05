<?php

if (isset($_POST['add'])) {
    include "config.php"; 
    $number =  mysqli_real_escape_string($con, $_POST['number']);
    $password =  mysqli_real_escape_string($con, $_POST['password']);
    $time =  mysqli_real_escape_string($con, $_POST['time']);
    $name =  mysqli_real_escape_string($con, $_POST['name']);
    $company =  mysqli_real_escape_string($con, $_POST['company']);
    $deller =  mysqli_real_escape_string($con, $_POST['deller']);
    $srnn = "sr_".$company."_".$name;
 
    $rpic =  $_FILES['rpic']['name'];
 
    $rtmp = $_FILES['rpic']['tmp_name'];
    $sql = "INSERT INTO sr(nam,num,pass,srpic,deller,company,srnum) VALUES ('$name',$number,'$password','$rpic','$deller','$company','$srnn') ";
}
move_uploaded_file($rtmp,  "../image/sr/" . $rpic);

$result = mysqli_query($con, $sql);
header("location:../admin/sr.php");
