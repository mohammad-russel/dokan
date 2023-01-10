<?php
if (isset($_FILES["pic"]) && !empty($_FILES["pic"]["name"] )) {
    if (is_uploaded_file($_FILES["pic"]["tmp_name"]) && $_FILES["pic"]["error"] === 0) {
        include "config.php";
        $rpic = $_FILES['pic']['name'];
        $rtmp = $_FILES['pic']['tmp_name'];
        $id = $_POST['id'];
        $name = $_POST['name'];
        $shop = $_POST['shop'];
        $number = $_POST['number'];
        $area = $_POST['area'];
        $hat = $_POST['hat'];
        move_uploaded_file($rtmp, "../image/retailer/" . $rpic);

        $sql1 = "UPDATE retailer SET hat = '$hat', retailerpic='$rpic', nam='$name',num=$number, area='$area',shopname='$shop' WHERE id = $id ";
        $query1 = mysqli_query($con, $sql1);
        header("location:../admin/retailer_overview.php?retailer=$id");
        exit();
    }
}
include "config.php";

$id = $_POST['id'];
$name = $_POST['name'];
$shop = $_POST['shop'];
$number = $_POST['number'];
$area = $_POST['area'];
$hat = $_POST['hat'];

$sql1 = "UPDATE retailer SET hat = '$hat', nam='$name',num=$number, area='$area',shopname='$shop' WHERE id = $id ";
$query1 = mysqli_query($con, $sql1);
header("location:../admin/retailer_overview.php?retailer=$id");
