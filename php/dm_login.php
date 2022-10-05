<?php
session_start();
if (isset($_POST['login'])) {
include "config.php";
$number =  mysqli_real_escape_string($con,$_POST['number']);
$password =  mysqli_real_escape_string($con,$_POST['password']);
$sql = "SELECT * FROM d_m WHERE number=$number AND password='{$password}'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION["delid"] = $row['id'];
if (mysqli_num_rows($result) > 0) {
    header("location:../delivery_man/d_home.php");
} else {
    header("location:../delivery_man/login.php");
}
}
?>