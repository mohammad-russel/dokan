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
    <title>Admin Slogan Edit</title>
    <?php include "../components/head2.php"; ?>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="back">
                <a href="../admin_home.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        
        </div>
        <div class="adminmainbox">
            <div class="buttonbox">
                <a href="#">
                    <ion-icon name="cash-outline"></ion-icon>
                    <div class="btn">
                        <h3>Total Earning</h3>
                        <?php
                        include "../php/config.php";
                        $sql = "SELECT *,SUM(quantity*price) AS total FROM cart WHERE status = 'complete'";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result)) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <p>৳<?php echo $row['total'] ?>/-</p>
                        <?php }
                        } ?>
                    </div>
                </a>
                <a href="#">
                    <ion-icon name="podium-outline"></ion-icon>
                    <div class="btn">
                        <h3>Baki Taka</h3>
                        <?php
                        include "../php/config.php";
                        $sql = "SELECT *,SUM(quantity*price) AS total FROM cart WHERE status = 'baki'";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result)) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                                <p>৳ <?php echo $row['total'] ?>/-</p>
                        <?php }
                        } ?>
                    </div>
                </a>
                <a href="day_insert.php">
                    <div class="btn">
                        <h3>Set Delivery</h3>
                        <?php
                        include "../php/config.php";
                        $sql = "SELECT * FROM delivery";
                        $result = mysqli_query($con, $sql);
                        $hm = mysqli_num_rows($result);
                        ?>
                        <p>Village : <?php echo $hm ?></p>
                    </div>
                </a>
            </div>
            <!-- ------------- -->
            <div class="buttonbox">
                <a href="complete.php">
                    <ion-icon name="basket-outline"></ion-icon>
                    <div class="btn">
                        <h3>Complete</h3>
                        <?php
                        include "../php/config.php";
                        $sql = "SELECT * FROM cart WHERE status = 'complete'";
                        $result = mysqli_query($con, $sql);
                        $hm = mysqli_num_rows($result);
                        ?>
                        <p><?php echo $hm ?></p>
                    </div>
                </a>
                <a href="order.php">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                    <div class="btn">
                        <h3>orders</h3>
                        <?php
                        include "../php/config.php";
                        $sql = "SELECT * FROM cart WHERE status = 'order'";
                        $result = mysqli_query($con, $sql);
                        $hm = mysqli_num_rows($result);
                        ?>
                        <p><?php echo $hm ?></p>
                    </div>
                </a>
                <a href="baki.php">
                    <ion-icon name="bag-remove-outline"></ion-icon>
                    <div class="btn">
                        <h3>Baki</h3>
                        <?php
                        include "../php/config.php";
                        $sql = "SELECT * FROM cart WHERE status = 'baki'";
                        $result = mysqli_query($con, $sql);
                        $hm = mysqli_num_rows($result);
                        ?>
                        <p><?php echo $hm ?></p>
                    </div>
                </a>
            </div>
            <!-- ---------- -->
            <div class="buttonbox">
                <a href="cart.php">
                    <ion-icon name="cart-outline"></ion-icon>
                    <div class="btn">
                        <h3>Cart</h3>
                        <?php
                        include "../php/config.php";
                        $sql = "SELECT * FROM cart WHERE status = 'cart'";
                        $result = mysqli_query($con, $sql);
                        $hm = mysqli_num_rows($result);
                        ?>
                        <p><?php echo $hm ?></p>
                    </div>
                </a>
                <a href="product.php">
                    <ion-icon name="fish-outline"></ion-icon>
                    <div class="btn">
                        <h3>Product</h3>
                        <?php
                        include "../php/config.php";
                        $sql = "SELECT * FROM product";
                        $result = mysqli_query($con, $sql);
                        $hm = mysqli_num_rows($result);
                        ?>
                        <p><?php echo $hm ?></p>
                    </div>
                </a>
                <a href="category_insert.php">
                    <ion-icon name="list-outline"></ion-icon>
                    <div class="btn">
                        <h3>Categories</h3>
                        <?php
                        include "../php/config.php";
                        $sql = "SELECT * FROM category ";
                        $result = mysqli_query($con, $sql);
                        $hm = mysqli_num_rows($result);
                        ?>
                        <p><?php echo $hm ?></p>
                    </div>
                </a>
                <br>
            </div>
            <div class="buttonbox">
            <a href="retailer.php">
                    <ion-icon name="people-circle-outline"></ion-icon>
                    <div class="btn">
                        <h3>Retailer</h3>
                        <?php
                        include "../php/config.php";
                        $sql = "SELECT * FROM retailer";
                        $result = mysqli_query($con, $sql);
                        $hm = mysqli_num_rows($result);
                        ?>
                        <p><?php echo $hm ?></p>
                    </div>
                </a>
                <a href="sr.php">
                    <ion-icon name="people-outline"></ion-icon>
                    <div class="btn">
                        <h3>SR</h3>
                        <?php
                        include "../php/config.php";
                        $sql = "SELECT * FROM sr";
                        $result = mysqli_query($con, $sql);
                        $hm = mysqli_num_rows($result);
                        ?>
                        <p><?php echo $hm ?></p>
                    </div>
                </a>
                <a href="deller.php">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <div class="btn">
                        <h3>Deller</h3>
                        <?php
                        include "../php/config.php";
                        $sql = "SELECT * FROM deller";
                        $result = mysqli_query($con, $sql);
                        $hm = mysqli_num_rows($result);
                        ?>
                        <p><?php echo $hm ?></p>
                    </div>
                </a>
            </div>
        </div>
        <!-- ---------- -->

    </div>

</body>

</html>