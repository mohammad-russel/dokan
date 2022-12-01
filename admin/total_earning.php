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
    <title>Admin Total Earning</title>
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
                <a href="admin_home.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
         
        </div>
        <div class="complete">
                <?php
                include '../php/config.php';
                $sql1 = "SELECT *, quantity*price AS total FROM cart WHERE status = 'complete'";
                $result1 = mysqli_query($con, $sql1);
                if ($list = mysqli_num_rows($result1)) {
                ?>
                    <div class="button_complete buttons">Complete <?php echo $list ?></div>
                    <div class="box_complete boxs">
                        <div class="box">
                            <?php
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                $pid = $row1['pid'];
                                $sql2 = "SELECT * FROM product WHERE id = $pid ";
                                $result2 = mysqli_query($con, $sql2);
                                $row2 = mysqli_fetch_assoc($result2);
                            ?>
                                <div class="card">
                                    <div class="image">
                                        <img src="../image/product/<?php echo $row2['pic'] ?>" alt="">
                                    </div>
                                    <div class="name"><?php echo $row2['nam'] ?></div>
                                    <div class="price">দামঃ <?php echo $row1['price'] ?></div>
                                    <div class="quantity">পরিমানঃ <?php echo $row1['quantity'] ?></div>
                                    <div class="tp">মোটঃ <?php echo $row1['total'] ?></div>
                                    <div class="name">সময়<br> <?php echo $row1['time'] ?></div>

                                </div>
                            <?php } ?>
                        </div>
                        <div class="cardinfo">
                            <?php
                            include '../php/config.php';
                            $sql1 = "SELECT *, SUM(quantity*price) AS total FROM cart WHERE status = 'complete' ";
                            $result1 = mysqli_query($con, $sql1);
                            $row = mysqli_fetch_assoc($result1);

                            // ----------
                            $sql1 = "SELECT *, quantity*price AS total FROM cart WHERE status = 'complete' ";
                            $result1 = mysqli_query($con, $sql1);
                            $list4 = mysqli_num_rows($result1);
                            //   ---------
                            $sql1 = "SELECT DISTINCT discount FROM cart WHERE status = 'complete'  ";
                            $result1 = mysqli_query($con, $sql1);
                            $row2 = mysqli_fetch_assoc($result1);



                            ?>
                            <div class="left">
                                <div class="item">ITEM : <?php echo $list4 ?></div>
                                <div class="ff">FULL PRICE : ৳<?php echo $row['total'] ?>/-</div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
    </div>

</body>

</html>