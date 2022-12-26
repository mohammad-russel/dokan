<?php
session_start();

include "config.php";
if(isset($_POST['add'])){
$day = $_POST['day'];
$union = $_POST['union'];

$sql1 = "SELECT * FROM delivery WHERE `uni` = '$union'";
$result1 = mysqli_query($con,$sql1);
if(mysqli_num_rows($result1)){
    if($result1){
        $_SESSION['day'] = "<span class='alerta'>Already Exist</span>";
    }
    header("location:../admin/admin_setday.php");
}
else{
    $sql = "INSERT INTO delivery (`day`,`uni`) VALUES ('$day', '$union')";
    $result = mysqli_query($con,$sql);
    if($result){
        $_SESSION['day'] = "<span class='alerts'>Successfully Added Data</span>";
    }
    header("location:../admin/admin_setday.php");
}
}
