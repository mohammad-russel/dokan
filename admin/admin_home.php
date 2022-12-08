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
    <title>Admin Homepage</title>
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
                            <div class="number"> <?php
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
                            <div class="number">
                                <?php
                                include "../php/config.php";
                                $sql = "SELECT *,SUM(quantity*price) AS total FROM cart WHERE status = 'baki'";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result)) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <p>৳<?php echo $row['total'] ?>/-</p>
                                <?php }
                                } ?>
                            </div>
                        </div>
                        <div class="icon">
                            <span>
                                <ion-icon name="logo-usd"></ion-icon>
                            </span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="text">
                            <div class="title">Retailers</div>
                            <div class="number"> <?php
                                                    include "../php/config.php";
                                                    $sql = "SELECT * FROM retailer";
                                                    $result = mysqli_query($con, $sql);
                                                    $hm = mysqli_num_rows($result);
                                                    ?>
                                <p><?php echo $hm ?></p>
                            </div>
                        </div>
                        <div class="icon">
                            <span>
                                <ion-icon name="person-circle-outline"></ion-icon>
                            </span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="text">
                            <div class="title">Products</div>
                            <div class="number"> <?php
                                                    include "../php/config.php";
                                                    $sql = "SELECT * FROM product";
                                                    $result = mysqli_query($con, $sql);
                                                    $hm = mysqli_num_rows($result);
                                                    ?>
                                <p><?php echo $hm ?></p>
                            </div>
                        </div>
                        <div class="icon">
                            <span>
                                <ion-icon name="basket-outline"></ion-icon>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="pr">
                    <div class="product_box">
                        <?php
                        @include "../php/config.php";
                        $sql = "SELECT DISTINCT pid FROM cart WHERE `status` = 'complete' ";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result)) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="box">
                                    <div class="subbox">
                                        <div class="image">
                                            <?php
                                            @include "../php/config.php";
                                            $pid = $row['pid'];
                                            $sql1 = "SELECT * FROM product WHERE id = $pid ";
                                            $result1 = mysqli_query($con, $sql1);
                                            $row1 = mysqli_fetch_assoc($result1);
                                            ?>
                                            <img src="../image/product/<?php echo $row1['pic'] ?>" alt="">
                                        </div>
                                        <div class="name_price">
                                            <div class="name"><?php echo $row1['nam'] ?></div>
                                            <div class="price"><?php echo $row1['price'] ?>৳</div>
                                        </div>
                                    </div>
                                    <?php
                                    @include "../php/config.php";
                                    $sql2 = "SELECT SUM(quantity) AS tq FROM cart WHERE `status` = 'complete' AND pid =$pid ";
                                    $result2 = mysqli_query($con, $sql2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    $t_quantity = $row2['tq'];
                                    $price = $row1['price'];
                                    $total_per = $t_quantity * $price;

                                    include "../php/config.php";
                                    $sql3 = "SELECT *,SUM(quantity*price) AS total FROM cart WHERE status = 'complete'";
                                    $result3 = mysqli_query($con, $sql3);
                                    $row3 = mysqli_fetch_assoc($result3);
                                    $full_total = $row3['total'];
                                    $percent = $total_per * 100 / $full_total;
                                    ?>
                                    <div class="statics">
                                        <div class="boxs">
                                            <div class="color" style="width:<?php echo $percent ?>%;"></div>
                                        </div>
                                        <div class="percent"><?php echo number_format($percent, 1)  ?>%</div>
                                    </div>

                                </div>
                        <?php }
                        } ?>
                    </div>
                    <div class="retailer_box">
                        <?php
                        @include "../php/config.php";
                        $sql = "SELECT DISTINCT rid FROM cart WHERE `status` = 'complete' ";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result)) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="box">
                                    <div class="subbox">
                                        <div class="image">
                                            <?php
                                            @include "../php/config.php";
                                            $rid = $row['rid'];
                                            $sql1 = "SELECT * FROM retailer WHERE id = $rid ";
                                            $result1 = mysqli_query($con, $sql1);
                                            $row1 = mysqli_fetch_assoc($result1);
                                            ?>
                                            <img src="../image/retailer/<?php echo $row1['retailerpic'] ?>" alt="">
                                        </div>
                                        <div class="info">
                                            <div class="name"><?php echo $row1['nam'] ?></div>
                                            <div class="shop_name"><?php echo $row1['shopname'] ?></div>
                                        </div>
                                    </div>
                                    <?php
                                    @include "../php/config.php";
                                    $sql21 = "SELECT * FROM cart WHERE `status` = 'complete' AND rid = $rid ";
                                    $result21 = mysqli_query($con, $sql21);
                                    $row21 = mysqli_fetch_assoc($result21);

                                    $sql2 = "SELECT SUM(quantity) AS tq FROM cart WHERE `status` = 'complete' AND rid = $rid ";
                                    $result2 = mysqli_query($con, $sql2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    $t_quantity = $row2['tq'];
                                    $price = $row21['price'];
                                    $total_per = $t_quantity * $price;

                                    include "../php/config.php";
                                    $sql3 = "SELECT *,SUM(quantity*price) AS total FROM cart WHERE status = 'complete'";
                                    $result3 = mysqli_query($con, $sql3);
                                    $row3 = mysqli_fetch_assoc($result3);
                                    $full_total = $row3['total'];
                                    $percent = $total_per * 100 / $full_total;
                                    ?>
                                    <div class="buy_info">
                                        <div class="total"><?php echo $full_total ?>৳</div>
                                        <div class="percent"><?php echo number_format($percent, 1) ?>%</div>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
</body>
<script>
    $(document).ready(function() {
        $(".hide").hide();
        $(".show").click(function() {
            $(".hide").fadeIn();
            $(".show").slideUp();

            $(".slider").slideDown()

        })
        $(".hide").click(function() {
            $(".hide").fadeOut();
            $(".show").slideDown();
            $(".slider").slideUp()

        })
    })
</script>

</html>