<!-- <?php
include "config.php";
$cid = $_POST['cid'];
$qua = $_POST['qua'];
$sql ="UPDATE cart SET quantity = $qua WHERE id = $cid ";
$result= mysqli_query($con,$sql);
?> -->

<?php

// include the configuration file
include "config.php";

// check that the cid and qua variables are set in the POST data
if (isset($_POST['cid']) && isset($_POST['qua'])) {
  // sanitize the input data
  $cid = filter_input(INPUT_POST, 'cid', FILTER_SANITIZE_NUMBER_INT);
  $qua = filter_input(INPUT_POST, 'qua', FILTER_SANITIZE_NUMBER_INT);

  // create the UPDATE query
  $sql = "UPDATE cart SET quantity = ? WHERE id = ?";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, "ii", $qua, $cid);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

?>
