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
                <a href="retailer.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        </div>
        <?php
        include "../php/config.php";

        $rid = $_GET['retailer'];
        $sql = "SELECT * FROM retailer WHERE id = $rid";
        $query = mysqli_query($con, $sql);
        if (mysqli_num_rows($query)) {
            $row = mysqli_fetch_assoc($query);
        ?>
            <div class="sr_overview">
                <div class="head">
                    <div class="image">
                        <img style="width:100px ;" src="../image/retailer/<?php echo $row['retailerpic'] ?>" alt="">
                    </div>

                </div>
                <div class="info">
                    <div class="left">
                        <div class="box">
                            <h3>Baki</h3>
                            <?php
                            include "../php/config.php";
                            $sr = $row['id'];
                            $sql5 = "SELECT * FROM cart WHERE rid = $rid AND status ='baki'";
                            $result5 = mysqli_query($con, $sql5);
                            $row5 = mysqli_num_rows($result5);
                            ?>
                            <p><?php echo $row5 ?></p>
                        </div>
                        <div class="box">
                            <h3>Opener</h3>
                            <?php
                           $sr = $row['openersr'];
                           $sql2 = "SELECT * FROM sr WHERE id = $sr";
                           $query2 = mysqli_query($con, $sql2);
                           $row2 = mysqli_fetch_assoc($query2);
                           ?>
                          <p><?php echo $row2['srnum'];?></p>
                        </div>
                    </div>
                    <div class="middle">
                        <div class="name"><?php echo $row['nam'] ?></div>
                        <div class="number"><?php echo $row['num'] ?></div>
                        <div class="password"><?php echo $row['pass'] ?></div>

                    </div>
                    <div class="right">
                        <div class="box">
                            <h3>Buy Product</h3>
                            <?php
                            include "../php/config.php";
                            $sr = $row['id'];
                            $sql5 = "SELECT * FROM cart WHERE rid = $rid AND status ='complete'";
                            $result5 = mysqli_query($con, $sql5);
                            $row5 = mysqli_num_rows($result5);
                            ?>
                            <p><?php echo $row5 ?></p>
                        </div>
                        <div class="box">
                            <h3>Order</h3>
                            <?php
                            include "../php/config.php";
                            $sr = $row['id'];
                            $sql5 = "SELECT * FROM cart WHERE rid = $rid AND status ='order'";
                            $result5 = mysqli_query($con, $sql5);
                            $row5 = mysqli_num_rows($result5);
                            ?>
                            <p><?php echo $row5 ?></p>
                        </div>
                    </div>
                </div>
                <!-- -------------------------- -->

                <!-- -------------------------- -->
            </div>
        <?php } ?>
    </div>

</body>

</html>