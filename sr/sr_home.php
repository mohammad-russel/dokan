<?php
session_start();
if (!isset($_SESSION["sid"])) {
    header("location:login.php");
}
$sr = $_SESSION["sid"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../components/head2.php"; ?>
    <title>SR Homepage</title>
    <style>
        .dd {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="back">
                <a href="../index.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
            <div class="back">
                <a href="../php/sr_logout.php">
                    <ion-icon name="log-out-outline"></ion-icon>
                </a>
            </div>
        </div>
        <div class="srmainbox">
            <div class="box">
                <h3>Total Sell</h3>
                <?php
                include "../php/config.php";
                $sql = "SELECT * FROM cart WHERE status = 'complete' AND sr = $sr ";
                $result = mysqli_query($con, $sql);
                $row = mysqli_num_rows($result);
                ?>
                <p>Item : <?php echo $row ?></p>
            </div>
            <div class="box">
                <a class="dd" href="retailer.php">
                    <p>Retailer</p>
                    <?php
                     $sql1 = "SELECT * FROM retailer WHERE openersr = $sr ";
                     $result1 = mysqli_query($con, $sql1);
                     $row1 = mysqli_num_rows($result1);
                    ?>
                    <p><?php echo $row1 ?></p>
                </a>
            </div>
        </div>
    </div>

</body>

</html>