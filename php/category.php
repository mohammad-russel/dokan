<?php
include "config.php";
if(isset($_POST['add'])){
$category = $_POST['category'];
    $sql = "INSERT INTO category (cat) VALUES ('$category')";
    $result = mysqli_query($con,$sql);
    header("location:../admin/category_insert.php");

}
