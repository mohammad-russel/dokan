<?php
session_start();
if (!isset($_SESSION["aid"])) {
    header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php include "../components/head2.php"; ?>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="back">
                <a href="complete.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        </div>
     <!-- ------------------- -->
     <?php
                include "../php/config.php";
                $id = $_GET['id'];
                $sql = "SELECT *, total-discount AS stotal FROM order WHERE status = 'complete' AND retailer = $id";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result)) {
                ?>
            <div class="order_list">
                <?php while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="card">
                       <div class="item"><?php echo $row['item'] ?></div>
                       <div class="total"></div>
                       <div class="discount"></div>
                       <div class="subtotal"></div>
                       <div class="product"></div>
                       <div class="time"></div>
                       <div class="signature">
                        <img src="../image/signature/" alt="">
                       </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
     </div>
    </div>

</body>

</html>