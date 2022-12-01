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
    <title>Admin Baki list</title>
    <?php include "../components/head2.php"; ?>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="back">
                <a href="baki.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        </div>
     <!-- ------------------- -->
     <?php
                include "../php/config.php";
                $id = $_GET['id'];
                $sql = "SELECT *, price*quantity AS total FROM cart WHERE status = 'baki' AND rid = $id";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result)) {
                ?>
            <div class="order_list">
                <?php while ($row = mysqli_fetch_assoc($result)) {
                        $pid = $row['pid'];
                        $sql1 = "SELECT * FROM product WHERE id = $pid";
                        $result1 = mysqli_query($con, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);
                ?>
                    <div class="card">
                        <div class="box image">
                            <img src="../image/product/<?php echo $row1['pic'] ?>" alt="">
                        </div>
                        <div class="box name"><?php echo $row1['nam'] ?></div>
                        <div class="box price">মূল্য : ৳ <?php echo $row['price'] ?></div>
                        <div class="box quantity">পরিমান : <?php echo $row['quantity'] ?></div>
                        <div class="box tp">মোট : ৳ <?php echo $row['total'] ?></div>
                        <div class="box btn">
                            <a href="retailer_overview.php?retailer=<?php echo $row['rid'] ?>" class="retailer">দোকানদার</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
     </div>
    </div>

</body>

</html>