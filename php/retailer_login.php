<?php
session_start();
if (isset($_POST['login'])) {
include "config.php";
$number =  mysqli_real_escape_string($con,$_POST['number']);
$password =  mysqli_real_escape_string($con,$_POST['password']);
$sql = "SELECT * FROM retailer WHERE num=$number AND pass='{$password}'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION["rid"] = $row['id'];
if (mysqli_num_rows($result) > 0) {
    header("location:../retailer/homepage.php");
} else {
    header("location:../retailer/login.php");
}
}
?>