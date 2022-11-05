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
            <span class="tity"><h1>Orders, Bakis, Completes & Carts</h1></span>

                <div class="order_box">
                    <div class="box box_order">
                        <div class="text">
                            <div class="t">Orders</div>
                            <div class="n">40</div>
                        </div>
                        <div class="icon">
                            <ion-icon name="bicycle-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="box box_baki">
                        <div class="text">
                            <div class="t">Baki</div>
                            <div class="n">23</div>
                        </div>
                        <div class="icon">
                            <ion-icon name="time-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="box box_complete">
                        <div class="text">
                            <div class="t">Complete</div>
                            <div class="n">32</div>
                        </div>
                        <div class="icon">
                            <ion-icon name="bag-check-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="box box_cart">
                        <div class="text">
                            <div class="t">Cart</div>
                            <div class="n">57</div>
                        </div>
                        <div class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </div>
                    </div>
                </div>
                <div class="list list_order">
                    <table>
                        <tr>
                            <th>Image</th>
                            <th>Name/Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Retailer</th>
                            <th>Time</th>
                        </tr>
                        <tr>
                            <td><img src="../image/product/olive-garden-italian-dressing.jpg" alt=""></td>
                            <td>Cup Of Coffe <br> 124৳</td>
                            <td>5</td>
                            <td>473৳</td>
                            <td><a href="">Mina Khan</a></td>
                            <td>02.04.05||01.14.32</td>
                        </tr>

                    </table>
                </div>
                <div class="list list_baki">
                    <table>
                        <tr>
                            <th>Image</th>
                            <th>Name/Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Retailer</th>
                            <th>Time</th>
                        </tr>
                        <tr>
                            <td><img src="../image/product/IMG_20190512_212238-removebg.png" alt=""></td>
                            <td>Cup Of Coffe <br> 124৳</td>
                            <td>5</td>
                            <td>473৳</td>
                            <td><a href="">Mina Khan</a></td>
                            <td>02.04.05||01.14.32</td>
                        </tr>

                    </table>
                </div>
                <div class="list list_complete">
                    <table>
                        <tr>
                            <th>Image</th>
                            <th>Name/Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Retailer</th>
                            <th>Time</th>
                        </tr>
                        <tr>
                            <td><img src="../image/product/IKIGAI1_1024x1024.jpg" alt=""></td>
                            <td>Cup Of Coffe <br> 124৳</td>
                            <td>5</td>
                            <td>473৳</td>
                            <td><a href="">Mina Khan</a></td>
                            <td>02.04.05||01.14.32</td>
                        </tr>

                    </table>
                </div>
                <div class="list list_cart">
                    <table>
                        <tr>
                            <th>Image</th>
                            <th>Name/Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Retailer</th>
                            <th>Time</th>
                        </tr>
                        <tr>
                            <td><img src="../image/product/71cw9tyLmPL._SX425_.jpg" alt=""></td>
                            <td>Cup Of Coffe <br> 124৳</td>
                            <td>5</td>
                            <td>473৳</td>
                            <td><a href="">Mina Khan</a></td>
                            <td>02.04.05||01.14.32</td>
                        </tr>

                    </table>
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