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
                    <ion-icon style="color: #3E5467;background: linear-gradient(315.13deg, rgba(194, 217, 237, 0.3) 5.21%, rgba(255, 255, 255, 0.3) 62.26%), #E9F0F7;
box-shadow: 4px 4px 12px rgba(138, 155, 189, 0.3), -5px -5px 15px rgba(255, 255, 255, 0.9); " name="arrow-back-outline"></ion-icon>
                </a>
            </div>
            <div class="back">
                <a href="../php/sr_logout.php">
                    <ion-icon style="color: #3E5467;background: linear-gradient(315.13deg, rgba(194, 217, 237, 0.3) 5.21%, rgba(255, 255, 255, 0.3) 62.26%), #E9F0F7;
box-shadow: 4px 4px 12px rgba(138, 155, 189, 0.3), -5px -5px 15px rgba(255, 255, 255, 0.9); "  name="log-out-outline"></ion-icon>
                </a>
            </div>
        </div>
        <div class="srmainbox">
            <a href="sr_complete.php?sr=<?php echo $sr ?>">
                <div class="box" style="color: #3E5467;">
                    <h3>Total Sell</h3>
                    <?php
                    include "../php/config.php";
                    $sql = "SELECT * FROM cart WHERE status = 'complete' AND sr = $sr ";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_num_rows($result);
                    ?>
                    <p>Item : <?php echo $row ?></p>
                </div>
            </a>

            <a class="dd" href="retailer.php">
                <div class="box">
                    <ion-icon name="storefront" style="color: #3E5467;"></ion-icon>
                    <h3 style="color: #3E5467;">Retailer</h1>
                        <?php
                        $sql1 = "SELECT * FROM retailer WHERE openersr = $sr ";
                        $result1 = mysqli_query($con, $sql1);
                        $row1 = mysqli_num_rows($result1);
                        ?>
                        <p><?php echo $row1 ?></p>
                </div>
            </a>
        </div>
    </div>

</body>

</html>