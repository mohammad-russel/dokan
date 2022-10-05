<?php
session_start();
if (isset($_POST['login'])) {
include "config.php";
$number =  mysqli_real_escape_string($con,$_POST['number']);
$password =  mysqli_real_escape_string($con,$_POST['password']);
$sql = "SELECT * FROM sr WHERE num=$number AND pass='{$password}'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION["sid"] = $row['id'];
if (mysqli_num_rows($result) > 0) {
    header("location:../sr/sr_home.php");
} else {
    header("location:../sr/login.php");
}
}
