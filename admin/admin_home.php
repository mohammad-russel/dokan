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
    <div class="container acc">
        <!-- <div class="header">
            <div class="back">
                <a href="../admin_home.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        </div> -->
        <!-- <div class="adminmainbox">
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
        </div> -->

        <!-- -----------------------------
    -----------------------------
    ----------------------------- -->
        <div class="admin">
            <div class="toggle">
                <div class="show">
                    <ion-icon name="layers-outline"></ion-icon>
                </div>
                <div class="hide">
                    <ion-icon name="close-outline"></ion-icon>
                </div>
            </div>
            <div class="slider">
                <?php include "../components/slider.php"; ?>
            </div>
            <div class="cb cb_dashboard">
                <div class="short_box">
                    <div class="box">
                        <div class="text">
                            <div class="title">Total Earning</div>
                            <div class="number">5000৳</div>
                        </div>
                        <div class="icon">
                            <span>
                                <p>৳</p>
                            </span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="text">
                            <div class="title">Baki</div>
                            <div class="number">600৳</div>
                        </div>
                        <div class="icon">
                            <span>
                                <ion-icon name="logo-usd"></ion-icon>
                            </span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="text">
                            <div class="title">Baki</div>
                            <div class="number">600৳</div>
                        </div>
                        <div class="icon">
                            <span>
                                <ion-icon name="cart-outline"></ion-icon>
                            </span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="text">
                            <div class="title">Baki</div>
                            <div class="number">600৳</div>
                        </div>
                        <div class="icon">
                            <span>
                                <ion-icon name="bag-add-outline"></ion-icon>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="pr">
                    <div class="product_box">
                        <div class="box">
                            <div class="subbox">
                                <div class="image">
                                    <img src="../image/product/112-1122699_coca-cola-png-picture-soda-clipart-transparent-background.png" alt="">
                                </div>
                                <div class="name_price">
                                    <div class="name">Pran Jush</div>
                                    <div class="price">34৳</div>
                                </div>
                            </div>
                            <div class="statics">
                                <div class="boxs">
                                    <div class="color" style="width:50%;"></div>
                                </div>
                                <div class="percent">50%</div>
                            </div>

                        </div>
                        <div class="box">
                            <div class="subbox">
                                <div class="image">
                                    <img src="../image/product/112-1122699_coca-cola-png-picture-soda-clipart-transparent-background.png" alt="">
                                </div>
                                <div class="name_price">
                                    <div class="name">Pran Jush</div>
                                    <div class="price">34৳</div>
                                </div>
                            </div>
                            <div class="statics">
                                <div class="boxs">
                                    <div class="color" style="width:50%;"></div>
                                </div>
                                <div class="percent">50%</div>
                            </div>

                        </div>
                        <div class="box">
                            <div class="subbox">
                                <div class="image">
                                    <img src="../image/product/112-1122699_coca-cola-png-picture-soda-clipart-transparent-background.png" alt="">
                                </div>
                                <div class="name_price">
                                    <div class="name">Pran Jush</div>
                                    <div class="price">34৳</div>
                                </div>
                            </div>
                            <div class="statics">
                                <div class="boxs">
                                    <div class="color" style="width:50%;"></div>
                                </div>
                                <div class="percent">50%</div>
                            </div>

                        </div>
                        <div class="box">
                            <div class="subbox">
                                <div class="image">
                                    <img src="../image/product/112-1122699_coca-cola-png-picture-soda-clipart-transparent-background.png" alt="">
                                </div>
                                <div class="name_price">
                                    <div class="name">Pran Jush</div>
                                    <div class="price">34৳</div>
                                </div>
                            </div>
                            <div class="statics">
                                <div class="boxs">
                                    <div class="color" style="width:50%;"></div>
                                </div>
                                <div class="percent">50%</div>
                            </div>

                        </div>
                    </div>
                    <div class="retailer_box">
                        <div class="box">
                            <div class="subbox">
                                <div class="image">
                                    <img src="../image/retailer/IMG20210306170213.jpg" alt="">
                                </div>
                                <div class="info">
                                    <div class="name">Mohammad Russell</div>
                                    <div class="shop_name">Bhai Bhai Expo</div>
                                </div>
                            </div>


                            <div class="buy_info">
                                <div class="total">466৳</div>
                                <div class="percent">35.3%</div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="subbox">
                                <div class="image">
                                    <img src="../image/retailer/IMG20210306170213.jpg" alt="">
                                </div>
                                <div class="info">
                                    <div class="name">Mohammad Russell</div>
                                    <div class="shop_name">Bhai Bhai Expo</div>
                                </div>
                            </div>


                            <div class="buy_info">
                                <div class="total">466৳</div>
                                <div class="percent">35.3%</div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="subbox">
                                <div class="image">
                                    <img src="../image/retailer/IMG20210306170213.jpg" alt="">
                                </div>
                                <div class="info">
                                    <div class="name">Mohammad Russell</div>
                                    <div class="shop_name">Bhai Bhai Expo</div>
                                </div>
                            </div>


                            <div class="buy_info">
                                <div class="total">466৳</div>
                                <div class="percent">35.3%</div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="subbox">
                                <div class="image">
                                    <img src="../image/retailer/IMG20210306170213.jpg" alt="">
                                </div>
                                <div class="info">
                                    <div class="name">Mohammad Russell</div>
                                    <div class="shop_name">Bhai Bhai Expo</div>
                                </div>
                            </div>


                            <div class="buy_info">
                                <div class="total">466৳</div>
                                <div class="percent">35.3%</div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="subbox">
                                <div class="image">
                                    <img src="../image/retailer/IMG20210306170213.jpg" alt="">
                                </div>
                                <div class="info">
                                    <div class="name">Mohammad Russell</div>
                                    <div class="shop_name">Bhai Bhai Expo</div>
                                </div>
                            </div>


                            <div class="buy_info">
                                <div class="total">466৳</div>
                                <div class="percent">35.3%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<?php include "../components/script.php"; ?>

</html>