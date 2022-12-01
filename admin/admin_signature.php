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
            <!-- --------------------------- -->
            <div class="cb cb_order">
                <span class="tity">
                    <h1>Orders, Bakis, Completes & Carts</h1>
                </span>

                <div class="order_box">

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
                            <div class="t">Complete</div>
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

                </div>

                <div class="list list_baki">
                    <div class="box">
                        <div class="title">
                            <h1>Baki</h1>
                        </div>
                        <div class="column">
                            <?php
                            include "../php/config.php";
                            $sql = "SELECT * FROM `order` WHERE `status` = 'baki' ";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                    <div class="row">

                                        <div class="item">
                                            Items <br> <span><?php echo $row['item'] ?></span>
                                        </div>
                                        <div class="discount">
                                            Discount <br> <span><?php echo $row['discount'] ?></span>
                                        </div>
                                        <div class="products">
                                            Products <br> <span>
                                                <div class="see-product">
                                                    <span class="sp">See Products</span>
                                                    <div class="product-popup">
                                                        <div class="product-close">
                                                            <ion-icon name="close-outline"></ion-icon>
                                                        </div>
                                                        <?php echo $row['products'] ?>
                                                    </div>
                                                </div>
                                            </span>

                                        </div>
                                        <div class="total">
                                            Total <br> <span><?php echo $row['total'] ?>৳</span>
                                        </div>
                                        <div class="retailer">
                                            <?php
                                            $rid = $row['retailer'];
                                            $sql2 = " SELECT * FROM retailer WHERE id = $rid";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = mysqli_fetch_assoc($result2);
                                            ?>
                                            Retailer <br> <span><a href="#"><?php echo $row2['nam'] ?></a></span>
                                        </div>
                                        <div class="time">
                                            Time <br> <span><?php echo $row['time'] ?></span>
                                        </div>
                                        <div class="signature">
                                            Signature <br> <span>
                                                <div class="see-signature">
                                                    <span class="ss"> See Signature</span>
                                                    <div class="signature-popup">
                                                        <div class="img-box">
                                                            <div class="img-close">
                                                                <ion-icon name="close-outline"></ion-icon>
                                                            </div>
                                                            <img src="../image/signature/<?php echo $row['signature'] ?>" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
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
                            $sql = "SELECT * FROM `order` WHERE `status` = 'complete' ";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                    <div class="row">

                                        <div class="item">
                                            Items <br> <span><?php echo $row['item'] ?></span>
                                        </div>
                                        <div class="discount">
                                            Discount <br> <span><?php echo $row['discount'] ?></span>
                                        </div>
                                        <div class="products">
                                            Products <br> <span>
                                                <div class="see-product">
                                                    <span class="sp">See Products</span>
                                                    <div class="product-popup">
                                                        <div class="product-close">
                                                            <ion-icon name="close-outline"></ion-icon>
                                                        </div>
                                                        <?php echo $row['products'] ?>
                                                    </div>
                                                </div>
                                            </span>

                                        </div>
                                        <div class="total">
                                            Total <br> <span><?php echo $row['total'] ?>৳</span>
                                        </div>
                                        <div class="retailer">
                                            <?php
                                            $rid = $row['retailer'];
                                            $sql2 = " SELECT * FROM retailer WHERE id = $rid";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = mysqli_fetch_assoc($result2);
                                            ?>
                                            Retailer <br> <span><a href="#"><?php echo $row2['nam'] ?></a></span>
                                        </div>
                                        <div class="time">
                                            Time <br> <span><?php echo $row['time'] ?></span>
                                        </div>
                                        <div class="signature">
                                            Signature <br> <span>
                                                <div class="see-signature">
                                                    <span class="ss"> See Signature</span>
                                                    <div class="signature-popup">
                                                        <div class="img-box">
                                                            <div class="img-close">
                                                                <ion-icon name="close-outline"></ion-icon>
                                                            </div>
                                                            <img src="../image/signature/<?php echo $row['signature'] ?>" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
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
        // -----------------------
        $(".product-popup").hide();
        $(".signature-popup").hide();

        $(".ss").click(function() {
            $(this).closest(".see-signature").children(".signature-popup").fadeIn();
        })
        $(".sp").click(function() {
            $(this).closest(".see-product").children(".product-popup").fadeIn();
        })
        $(".img-close").click(function() {
            $(this).closest(".img-box").closest(".signature-popup").fadeOut()
        })
        $(".product-close").click(function() {
            $(this).closest(".product-popup").fadeOut()
        })
    })
</script>

</html>