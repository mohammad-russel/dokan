<?php
session_start();
if (!isset($_SESSION["rid"])) {
    header("location:login.php");
}
$rid = $_SESSION["rid"];
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../components/head2.php"; ?>
    <title>Retailer profile</title>
</head>

<body>
    <div class="container">
        <?php include "../components/header.php" ?>
        <?php
        include "../php/config.php";
        $sql = "SELECT * FROM retailer WHERE id = $rid";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="userbox">
            <div class="info">
                <div class="image">
                    <img src="../image/retailer/<?php echo $row['retailerpic']  ?>" alt="">
                </div>
                <div class="name"><?php echo $row['nam'] ?></div>
                <div class="shop"><?php echo $row['shopname']  ?></div>
            </div>
            <div class="card">
                <div class="box complete">
                    <?php
                    include "../php/config.php";
                    $sql1 = "SELECT * FROM cart WHERE rid = $rid AND status ='complete'  ";
                    $result1 = mysqli_query($con, $sql1);
                    $quantity = mysqli_num_rows($result1);
                    ?>
                    <h2>complete</h2>
                    <p>ITEM : <?php echo $quantity ?></p>
                </div>
                <div class="box cart">
                    <?php
                    include "../php/config.php";
                    $sql1 = "SELECT * FROM cart WHERE rid = $rid AND status ='cart' ";
                    $result1 = mysqli_query($con, $sql1);
                    $quantity = mysqli_num_rows($result1);
                    ?>
                    <h2>cart</h2>
                    <p>ITEM : <?php echo $quantity ?></p>
                </div>
                <div class="box baki">
                    <?php
                    include "../php/config.php";
                    $sql1 = "SELECT * FROM cart WHERE rid = $rid AND status ='baki' ";
                    $result1 = mysqli_query($con, $sql1);
                    $quantity = mysqli_num_rows($result1);
                    ?>
                    <h2>Baki</h2>
                    <p>ITEM : <?php echo $quantity ?></p>
                </div>
                <div class="box order">
                    <?php
                    include "../php/config.php";
                    $sql1 = "SELECT * FROM cart WHERE rid = $rid AND status ='order' ";
                    $result1 = mysqli_query($con, $sql1);
                    $quantity = mysqli_num_rows($result1);
                    ?>
                    <h2>Orders</h2>
                    <p>ITEM : <?php echo $quantity ?></p>
                </div>
            </div>
            <div class="cocb">
                <?php
                $sql = "SELECT *,price*quantity AS total FROM cart WHERE rid = $rid AND status = 'cart'";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result)) {
                ?>
                    <div class="bo cartbo">
                        <div class="head">cart</div>
                        <div class="box">
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $pid = $row['pid'];
                                $sql1 = "SELECT * FROM product WHERE id = $pid";
                                $result1 = mysqli_query($con, $sql1);
                                $row1 = mysqli_fetch_assoc($result1)
                            ?>
                                <div class="card">
                                    <div class="image">
                                        <img src="../image/product/<?php echo $row1['pic'] ?>" alt="">
                                    </div>
                                    <div class="name"><?php echo $row1['nam'] ?></div>
                                    <div class="price">৳<?php echo $row['price'] ?></div>
                                    <div class="quantity">পরিমাণ : <?php echo $row['quantity'] ?></div>
                                    <div class="total">মোট : ৳<?php echo $row['total'] ?></div>
                                    <div class="time"><?php echo $row['time'] ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <!-- ------------------------- -->
                <?php
                $sql = "SELECT *,price*quantity AS total FROM cart WHERE rid = $rid AND status = 'order'";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result)) {
                ?>
                    <div class="bo orderbo">
                        <div class="head">order</div>
                        <div class="box">

                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $pid = $row['pid'];
                                $sql1 = "SELECT * FROM product WHERE id = $pid";
                                $result1 = mysqli_query($con, $sql1);
                                $row1 = mysqli_fetch_assoc($result1)
                            ?>
                                <div class="card">
                                    <div class="image">
                                        <img src="../image/product/<?php echo $row1['pic'] ?>" alt="">
                                    </div>
                                    <div class="name"><?php echo $row1['nam'] ?></div>
                                    <div class="price">৳<?php echo $row['price'] ?></div>
                                    <div class="quantity">পরিমাণ : <?php echo $row['quantity'] ?></div>
                                    <div class="total">মোট : ৳<?php echo $row['total'] ?></div>
                                    <div class="time"><?php echo $row['time'] ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <!-- -------------------------- -->
                <?php
                $sql = "SELECT *,price*quantity AS total FROM cart WHERE rid = $rid AND status = 'complete'";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result)) {
                ?>
                    <div class="bo completebo">
                        <div class="head">complete</div>
                        <div class="box">
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $pid = $row['pid'];
                                $sql1 = "SELECT * FROM product WHERE id = $pid";
                                $result1 = mysqli_query($con, $sql1);
                                $row1 = mysqli_fetch_assoc($result1)
                            ?>
                                <div class="card">
                                    <div class="image">
                                        <img src="../image/product/<?php echo $row1['pic'] ?>" alt="">
                                    </div>
                                    <div class="name"><?php echo $row1['nam'] ?></div>
                                    <div class="price">৳<?php echo $row['price'] ?></div>
                                    <div class="quantity">পরিমাণ : <?php echo $row['quantity'] ?></div>
                                    <div class="total">মোট : ৳<?php echo $row['total'] ?></div>
                                    <div class="time"><?php echo $row['time'] ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <!-- ---------------------------- -->
                <?php
                $sql = "SELECT *,price*quantity AS total FROM cart WHERE rid = $rid AND status = 'baki'";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result)) {
                ?>
                    <div class="bo bakibo">
                        <div class="head">baki</div>
                        <div class="box">
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $pid = $row['pid'];
                                $sql1 = "SELECT * FROM product WHERE id = $pid";
                                $result1 = mysqli_query($con, $sql1);
                                $row1 = mysqli_fetch_assoc($result1)
                            ?>
                                <div class="card">
                                    <div class="image">
                                        <img src="../image/product/<?php echo $row1['pic'] ?>" alt="">
                                    </div>
                                    <div class="name"><?php echo $row1['nam'] ?></div>
                                    <div class="price">৳<?php echo $row['price'] ?></div>
                                    <div class="quantity">পরিমাণ : <?php echo $row['quantity'] ?></div>
                                    <div class="total">মোট : ৳<?php echo $row['total'] ?></div>
                                    <div class="time"><?php echo $row['time'] ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {

        function cartload() {
            var id = <?php echo $rid ?>;
            $.ajax({
                url: "../php/load_cart.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function(data1) {
                    $(".count").html(data1);

                }
            })
        }
        cartload();
        // ---------
        $(".orderbo").hide()
        $(".completebo").hide()
        $(".cartbo").hide()
        $(".bakibo").hide()
        $(".order").click(function() {
            $(".orderbo").toggle()
            $(".completebo").hide()
            $(".cartbo").hide()
            $(".bakibo").hide()
        })
        $(".complete").click(function() {
            $(".completebo").toggle()
            $(".orderbo").hide()
            $(".cartbo").hide()
            $(".bakibo").hide()
        })
        $(".baki").click(function() {
            $(".bakibo").toggle()
            $(".orderbo").hide()
            $(".completebo").hide()
            $(".cartbo").hide()
        })
        $(".cart").click(function() {
            $(".cartbo").toggle()
            $(".orderbo").hide()
            $(".completebo").hide()
            $(".bakibo").hide()
        })

    })
</script>

</html>