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
    <title>Admin Manage order</title>
    <?php include "../components/head2.php"; ?>
</head>

<body>
    <div class="container acc">
        <div class="admin">
            <div class="toggle">
                <div class="show">
                <ion-icon name="filter-outline"></ion-icon>
                </div>
                <div class="hide">
                    <ion-icon name="close-outline"></ion-icon>
                </div>
            </div>
            <div class="slider">
                <?php include "../components/slider.php"; ?>
            </div>
            <!-- --------------------------- -->
            <div class="cb cb_order">
                <span class="tity">
                    <h1>Orders, Bakis, Completes & Carts</h1>
                </span>

                <div class="order_box">
                    <div class="box box_order">
                        <div class="text">
                            <div class="t">Order Panding</div>
                            <?php
                            include "../php/config.php";
                            $sql = "SELECT * FROM cart WHERE status = 'order'";
                            $result = mysqli_query($con, $sql);
                            $order = mysqli_num_rows($result);
                            ?>
                            <div class="n"><?php echo $order ?></div>
                        </div>
                        <div class="icon">
                            <ion-icon name="bicycle-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="box box_baki">
                        <div class="text">
                            <div class="t">Baki</div>
                            <?php
                            include "../php/config.php";
                            $sql = "SELECT * FROM cart WHERE status = 'baki'";
                            $result = mysqli_query($con, $sql);
                            $order = mysqli_num_rows($result);
                            ?>
                            <div class="n"><?php echo $order ?></div>
                        </div>
                        <div class="icon">
                            <ion-icon name="time-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="box box_complete">
                        <div class="text">
                            <div class="t">Completed</div>
                            <?php
                            include "../php/config.php";
                            $sql = "SELECT * FROM cart WHERE status = 'complete'";
                            $result = mysqli_query($con, $sql);
                            $complete = mysqli_num_rows($result);
                            ?>
                            <div class="n"><?php echo $complete ?></div>
                        </div>
                        <div class="icon">
                            <ion-icon name="bag-check-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="box box_cart">
                        <div class="text">
                            <div class="t">Cart</div>
                            <?php
                            include "../php/config.php";
                            $sql = "SELECT * FROM cart WHERE status = 'cart'";
                            $result = mysqli_query($con, $sql);
                            $cart = mysqli_num_rows($result);
                            ?>
                            <div class="n"><?php echo $cart ?></div>
                        </div>
                        <div class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </div>
                    </div>
                </div>
                <div class="list list_order">
                    <div class="box">
                        <div class="title">
                            <h1>Order</h1>
                        </div>
                        <div class="column">
                            <?php
                            include "../php/config.php";
                            $sql = "SELECT *, price*quantity AS total FROM cart WHERE `status` = 'order' ";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                    <div class="row">
                                        <?php
                                        $id = $row['pid'];
                                        $sql1 = " SELECT * FROM product WHERE id = $id";
                                        $result1 = mysqli_query($con, $sql1);
                                        $row1 = mysqli_fetch_assoc($result1);
                                        ?>
                                        <div class="image">
                                            <img src="../image/product/<?php echo $row1['pic'] ?>" alt="ww">
                                        </div>
                                        <div class="name">
                                            <?php echo $row1['nam'] ?> <br>Price : <span><?php echo $row1['price'] ?></span>
                                        </div>
                                        <div class="quantity">
                                            Quantity <br> <span><?php echo $row['quantity'] ?></span>
                                        </div>
                                        <div class="total">
                                            Total <br> <span><?php echo $row['total'] ?>৳</span>
                                        </div>
                                        <div class="retailer">
                                            <?php
                                            $rid = $row['rid'];
                                            $sql2 = " SELECT * FROM retailer WHERE id = $rid";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = mysqli_fetch_assoc($result2);
                                            ?>
                                            Retailer <br> <span><a href="#"><?php echo $row2['nam'] ?></a></span>
                                        </div>
                                        <div class="time">
                                            Time <br> <span><?php echo $row['time'] ?></span>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="list list_baki">
                    <div class="box">
                        <div class="title">
                            <h1>Baki</h1>
                        </div>
                        <div class="column">
                            <?php
                            include "../php/config.php";
                            $sql = "SELECT *, price*quantity AS total FROM cart WHERE `status` = 'baki' ";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                    <div class="row">
                                        <?php
                                        $id = $row['pid'];
                                        $sql1 = " SELECT * FROM product WHERE id = $id";
                                        $result1 = mysqli_query($con, $sql1);
                                        $row1 = mysqli_fetch_assoc($result1);
                                        ?>
                                        <div class="image">
                                            <img src="../image/product/<?php echo $row1['pic'] ?>" alt="ww">
                                        </div>
                                        <div class="name">
                                            <?php echo $row1['nam'] ?> <br>Price :  <span><?php echo $row1['price'] ?></span>
                                        </div>
                                        <div class="quantity">
                                            Quantity <br> <span><?php echo $row['quantity'] ?></span>
                                        </div>
                                        <div class="total">
                                            Total <br> <span><?php echo $row['total'] ?>৳</span>
                                        </div>
                                        <div class="retailer">
                                            <?php
                                            $rid = $row['rid'];
                                            $sql2 = " SELECT * FROM retailer WHERE id = $rid";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = mysqli_fetch_assoc($result2);
                                            ?>
                                            Retailer <br> <span><a href="#"><?php echo $row2['nam'] ?></a></span>
                                        </div>
                                        <div class="time">
                                            Time <br> <span><?php echo $row['time'] ?></span>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="list list_complete">
                    <div class="box">
                        <div class="title">
                            <h1>Complete</h1>
                        </div>
                        <div class="column">
                            <?php
                            include "../php/config.php";
                            $sql = "SELECT *, price*quantity AS total FROM cart WHERE `status` = 'complete' ";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                    <div class="row">
                                        <?php
                                        $id = $row['pid'];
                                        $sql1 = " SELECT * FROM product WHERE id = $id";
                                        $result1 = mysqli_query($con, $sql1);
                                        $row1 = mysqli_fetch_assoc($result1);
                                        ?>
                                        <div class="image">
                                            <img src="../image/product/<?php echo $row1['pic'] ?>" alt="ww">
                                        </div>
                                        <div class="name">
                                            <?php echo $row1['nam'] ?> <br>Price : <span><?php echo $row1['price'] ?></span>
                                        </div>
                                        <div class="quantity">
                                            Quantity <br> <span><?php echo $row['quantity'] ?></span>
                                        </div>
                                        <div class="total">
                                            Total <br> <span><?php echo $row['total'] ?>৳</span>
                                        </div>
                                        <div class="retailer">
                                            <?php
                                            $rid = $row['rid'];
                                            $sql2 = " SELECT * FROM retailer WHERE id = $rid";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = mysqli_fetch_assoc($result2);
                                            ?>
                                            Retailer <br> <span><a href="#"><?php echo $row2['nam'] ?></a></span>
                                        </div>
                                        <div class="time">
                                            Time <br> <span><?php echo $row['time'] ?></span>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="list list_cart">
                    <div class="box">
                        <div class="title">
                            <h1>Cart</h1>
                        </div>
                        <div class="column">
                            <?php
                            include "../php/config.php";
                            $sql = "SELECT *, price*quantity AS total FROM cart WHERE `status` = 'cart' ";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                    <div class="row">
                                        <?php
                                        $id = $row['pid'];
                                        $sql1 = " SELECT * FROM product WHERE id = $id";
                                        $result1 = mysqli_query($con, $sql1);
                                        $row1 = mysqli_fetch_assoc($result1);
                                        ?>
                                        <div class="image">
                                            <img src="../image/product/<?php echo $row1['pic'] ?>" alt="ww">
                                        </div>
                                        <div class="name">
                                            <?php echo $row1['nam'] ?> <br> Price : <span><?php echo $row1['price'] ?></span>
                                        </div>
                                        <div class="quantity">
                                            Quantity <br> <span><?php echo $row['quantity'] ?></span>
                                        </div>
                                        <div class="total">
                                            Total <br> <span><?php echo $row['total'] ?>৳</span>
                                        </div>
                                        <div class="retailer">
                                            <?php
                                            $rid = $row['rid'];
                                            $sql2 = " SELECT * FROM retailer WHERE id = $rid";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = mysqli_fetch_assoc($result2);
                                            ?>
                                            Retailer <br> <span><a href="#"><?php echo $row2['nam'] ?></a></span>
                                        </div>
                                        <div class="time">
                                            Time <br> <span><?php echo $row['time'] ?></span>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</body>
<?php include "../components/script.php"; ?>
<script>
    $(document).ready(function() {

        $(".list_baki").hide();
        $(".list_complete").hide();
        $(".list_cart").hide();

        $(".box_order").click(function() {
            $(".list_baki").hide();
            $(".list_complete").hide();
            $(".list_cart").hide();
            $(".list_order").show();
        })
        $(".box_baki").click(function() {
            $(".list_order").hide();
            $(".list_complete").hide();
            $(".list_cart").hide();
            $(".list_baki").show();

        })
        $(".box_complete").click(function() {
            $(".list_baki").hide();
            $(".list_order").hide();
            $(".list_cart").hide();
            $(".list_complete").show();

        })
        $(".box_cart").click(function() {
            $(".list_baki").hide();
            $(".list_order").hide();
            $(".list_complete").hide();
            $(".list_cart").show();

        })
    })
</script>

</html>