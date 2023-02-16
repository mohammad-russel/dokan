<?php
error_reporting(E_ERROR | E_PARSE);
@include "../php/config.php";

$mot = $_POST['mot'];
$did = $_POST['did'];
$sid = $_POST['sid'];
$rid = $_POST['rid'];

if (isset($_POST['rid'])) {
    $sql1 = "SELECT *, SUM(price*quantity) as total FROM `cart` WHERE `status` = 'complete' AND rid = $rid AND ymd = $mot";
    $result1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        $row1 = mysqli_fetch_assoc($result1);
?>
        <span>৳<?php echo $row1['total'] ?></span>
    <?php } else { ?>
        <span>৳ 0</span>
<?php }
} 
elseif (isset($_POST['did'])) {
    $sql1 = "SELECT *, SUM(price*quantity) as total FROM `cart` WHERE `status` = 'complete' AND deller = $did AND ymd = $mot";
    $result1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        $row1 = mysqli_fetch_assoc($result1);
?>
        <span>৳<?php echo $row1['total'] ?></span>
    <?php } else { ?>
        <span>৳ 0</span>
<?php }
} 
elseif (isset($_POST['sid'])) {
    $sql1 = "SELECT *, SUM(price*quantity) as total FROM `cart` WHERE `status` = 'complete' AND sr = $sid AND ymd = $mot";
    $result1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        $row1 = mysqli_fetch_assoc($result1);
?>
        <span>৳<?php echo $row1['total'] ?></span>
    <?php } else { ?>
        <span>৳ 0</span>
<?php }
} ?>