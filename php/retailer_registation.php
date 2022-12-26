
<?php
if (isset($_POST['add'])) {
    include "config.php";
    $number =  mysqli_real_escape_string($con, $_POST['number']);
    $password =  mysqli_real_escape_string($con, $_POST['password']);
    $time =  mysqli_real_escape_string($con, $_POST['time']);
    $name =  mysqli_real_escape_string($con, $_POST['name']);
    $shop =  mysqli_real_escape_string($con, $_POST['shop']);
    $sr =  mysqli_real_escape_string($con, $_POST['sr']);
    $zila =  mysqli_real_escape_string($con, $_POST['zila']);
    // $root =  mysqli_real_escape_string($con, $_POST['root']);
    $union =  mysqli_real_escape_string($con, $_POST['union']);
    $hat =  mysqli_real_escape_string($con, $_POST['hat']);
    $village =  mysqli_real_escape_string($con, $_POST['village']);
    $area =  mysqli_real_escape_string($con, $_POST['area']);
    $spic = $_FILES['spic']['name'];
    $rpic =  $_FILES['rpic']['name'];
    $stmp = $_FILES['spic']['tmp_name'];
    $rtmp = $_FILES['rpic']['tmp_name'];
    $sql = "INSERT INTO retailer(nam,num,pass,shoppic,retailerpic,openersr,`union`,village,area,shopname,hat,zila) VALUES ('$name',$number,'$password','$spic','$rpic','$sr','$union','$village','$area','$shop', '$hat', '$zila' ) ";
}
move_uploaded_file($rtmp,  "../image/retailer/" . $rpic);
move_uploaded_file($stmp,  "../image/shop/" . $spic);
$result = mysqli_query($con, $sql);
header("location:../sr/retailer.php");
