
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
  $location = "../image/retailer/" . $rpic;
  $stmp = $_FILES['spic']['tmp_name'];
  $rtmp = $_FILES['rpic']['tmp_name'];

  $info = getimagesize($_FILES['rpic']['tmp_name']);
  if ($info['mime'] == 'image/jpeg') {
    $img = imagecreatefromjpeg($rtmp);
  }
  
  $sql = "INSERT INTO retailer(nam,num,pass,shoppic,retailerpic,openersr,`union`,village,area,shopname,hat,zila) VALUES ('$name',$number,'$password','$spic','$rpic','$sr','$union','$village','$area','$shop', '$hat', '$zila' ) ";
  $result = mysqli_query($con, $sql);
  if(isset($img)){
    $out_img = $location;
    imagejpeg($img,$location,10);
    // echo "<img src='$out_img'>";
   }
  // move_uploaded_file($output_image, $location);
  header("location:../sr/retailer.php");
}
