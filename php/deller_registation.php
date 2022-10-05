<?php
if (isset($_POST['add'])) {
    include "config.php";
    $number =  mysqli_real_escape_string($con, $_POST['number']);
    $password =  mysqli_real_escape_string($con, $_POST['password']);
    $time =  mysqli_real_escape_string($con, $_POST['time']);
    $name =  mysqli_real_escape_string($con, $_POST['name']);
    $company =  mysqli_real_escape_string($con, $_POST['company']);
    $dpic =  $_FILES['dpic']['name'];
    $dtmp = $_FILES['dpic']['tmp_name'];
    $sql = "INSERT INTO deller(nam,num,pass,deller_pic,company) VALUES ('$name',$number,'$password','$dpic','$company') ";
}
move_uploaded_file($dtmp,  "../image/deller/" . $dpic);

$result = mysqli_query($con, $sql);
header("location:../admin/deller.php");
