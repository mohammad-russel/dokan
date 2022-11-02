<?php
include "config.php";
if(isset($_POST['addproduct'])){
    $time = $con -> real_escape_string($_POST['time']);
$name = $con -> real_escape_string($_POST['name']);
$category = $con -> real_escape_string($_POST['category']);
$sr = $con -> real_escape_string($_POST['sr']);
$company = $con -> real_escape_string($_POST['company']);
$price = $con -> real_escape_string($_POST['price']);

$discription = $con -> real_escape_string($_POST['discription']);
$picname =$con -> real_escape_string ($_FILES['pic']['name']);
$pictmpname = $_FILES['pic']['tmp_name'];

$sql = "INSERT INTO product(nam,category,time,company,sr,price,discription,pic) VALUES ('$name','$category','$time','$company','$sr',$price,'$discription','$picname')";
}

move_uploaded_file($pictmpname, "../image/product/" . $picname);

$query = mysqli_query($con, $sql);
header("location:../admin/product.php");
?>