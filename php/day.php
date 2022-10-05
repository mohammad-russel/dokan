<?php
session_start();

include "config.php";
if(isset($_POST['add'])){
$day = $_POST['day'];
$village = $_POST['village'];
$sql1 = "SELECT * FROM delivery WHERE Village = '$village'";
$result1 = mysqli_query($con,$sql1);
if(mysqli_num_rows($result1)){
    if($result1){
        $_SESSION['day'] = "<span class='alerta'>Already Exist</span>";
    }
    header("location:../admin/day_insert.php");
}
else{
    $sql = "INSERT INTO delivery (village,day) VALUES ('$village','$day')";
    $result = mysqli_query($con,$sql);
    if($result){
        $_SESSION['day'] = "<span class='alerts'>Successfully Added Data</span>";
    }
    header("location:../admin/day_insert.php");
}
}
