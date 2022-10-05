<?php
session_start();
if (!isset($_SESSION["delid"])) {
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

                <a href="d_home.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        </div>
        <!-- __________________ -->
        <div class="d_retailer_list">
            <?php
            include '../php/config.php';
            $sql = "SELECT DISTINCT rid FROM cart WHERE status = 'order' OR status = 'baki'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $rid = $row['rid'];
                    $village = $_GET['village'];
                    $sql1 = "SELECT * FROM retailer WHERE id = $rid AND village = '$village'";
                    $result1 = mysqli_query($con, $sql1);
                    if (mysqli_num_rows($result1)) {
                        while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                            <a href="retailer_overview.php?rid=<?php echo $row1['id'] ?>">
                                <div class="card">
                                    <div class="image">
                                        <img src="../image/retailer/<?php echo $row1['retailerpic'] ?>" alt="">
                                    </div>
                                    <div class="name"><?php echo $row1['nam'] ?></div>
                                    <div class="shop"><?php echo $row1['shopname'] ?></div>
                                    <?php 
                                    $r = $row1['id'];
                                      $sql4 = "SELECT * FROM cart WHERE status = 'order' AND rid = $r ";
                                      $result4 = mysqli_query($con, $sql4);
                                     $orders= mysqli_num_rows($result4);
                                    ?>
                                    <div class="order">Order : <?php echo $orders ?></div>
                                    <?php 
                                      $sql5 = "SELECT * FROM cart WHERE status = 'baki' AND rid = $r  ";
                                      $result5 = mysqli_query($con, $sql5);
                                     $baki= mysqli_num_rows($result5);
                                    ?>
                                    <div class="baki">Baki : <?php echo $baki ?></div>
                                </div>
                            </a>

            <?php
                        }
                    }
                }
            }
            ?>

        </div>

</body>

</html>