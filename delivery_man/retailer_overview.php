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

<body> <?php
        include '../php/config.php';
        $rid = $_GET['rid'];
        $sql = "SELECT * FROM retailer WHERE id = $rid ";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
    <div class="container">
        <div class="header">
            <div class="back">
                <a href="retailer.php?village=<?php echo $row['village'] ?>">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        </div>

        <!-- __________________ -->
        <div class="d_overview_retailer">

            <div class="profile">
                <div class="image">
                    <img src="../image/retailer/<?php echo $row['retailerpic'] ?>" alt="">
                </div>
                <div class="name"><?php echo $row['nam'] ?></div>
                <div class="shop"><?php echo $row['shopname'] ?></div>
            </div>
            <div class="order">
                <?php
                include '../php/config.php';
                $sql1 = "SELECT *, quantity*price AS total FROM cart WHERE status = 'order' AND rid = $rid ";
                $result1 = mysqli_query($con, $sql1);
                if ($list = mysqli_num_rows($result1)) {

                ?>

                    <div class="button_order buttons">Order <?php echo $list ?></div>
                    <div class="box_order boxs">
                        <div class="box">
                        <?php
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            $pid = $row1['pid'];
                            $sql2 = "SELECT * FROM product WHERE id = $pid ";
                            $result2 = mysqli_query($con, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                        ?>
                            <div class="card card<?php echo $row1['id'] ?>">
                                <div class="image">
                                    <img src="../image/product/<?php echo $row2['pic'] ?>" alt="">
                                </div>
                                <div class="name"><?php echo $row2['nam'] ?></div>
                                <div class="price">দামঃ <?php echo $row1['price'] ?></div>
                                <div class="quantity">পরিমানঃ <?php echo $row1['quantity'] ?></div>
                                <div class="tp">মোটঃ <?php echo $row1['total'] ?></div>
                                <div class="btn">
                                    <div class="bt complete<?php echo $row1['id'] ?>">Complete</div>
                                    <div class="bt baki<?php echo $row1['id'] ?>">Baki</div>
                                    <div class="bt cancel<?php echo $row1['id'] ?>">Cancel</div>
                                </div>
                                <?php
                                date_default_timezone_set('Asia/Dhaka');
                                $time = date("Y/m/d || h/i/s"); ?>

                                <script>
                                    $(document).ready(function() {
                                        $(".complete<?php echo $row1['id'] ?>").click(function() {
                                            var id = <?php echo $row1['id'] ?>;
                                            var time = "<?php echo $time ?>";
                                            $.ajax({
                                                url: "../php/delivery/cart_update_complete.php",
                                                type: "post",
                                                data: {
                                                    id: id,
                                                    time: time
                                                },
                                                success: function(data) {
                                                    $(".card<?php echo $row1['id'] ?>").fadeOut()
                                                }
                                            })
                                        })
                                        // ---------------------
                                        $(".baki<?php echo $row1['id'] ?>").click(function() {
                                            var id = <?php echo $row1['id'] ?>;
                                            var time = "<?php echo $time ?>";
                                            $.ajax({
                                                url: "../php/delivery/cart_update_baki.php",
                                                type: "post",
                                                data: {
                                                    id: id,
                                                    time: time
                                                },
                                                success: function(data) {
                                                    $(".card<?php echo $row1['id'] ?>").fadeOut()
                                                }
                                            })
                                        })
                                        // -----------------------
                                        $(".cancel<?php echo $row1['id'] ?>").click(function() {
                                            var id = <?php echo $row1['id'] ?>;
                                            var time = "<?php echo $time ?>";
                                            $.ajax({
                                                url: "../php/delivery/cart_delete_by_dm.php",
                                                type: "post",
                                                data: {
                                                    id: id
                                                },
                                                success: function(data) {
                                                    $(".card<?php echo $row1['id'] ?>").fadeOut()
                                                }
                                            })
                                        })

                                    })
                                </script>
                            </div>
                        <?php } ?>
                        </div>
                        <div class="cardinfo">
                            <div class="left">
                                <div class="item">ITEM : 6</div>
                                <div class="ff">FULL PRICE : $400/-</div>
                                <div class="dis">DISCOUNT : $60/-</div>
                                <div class="tp">SUB TOTAL : $340/-</div>
                            </div>
                            <div class="right">
                                <div class="btn">
                                    <span class="complete_op">Complete</span>
                                    <span class="baki_op">Baki</span>
                                </div>
                            </div>

                            <div class="complete_pop">
                                <form action="" method="post"></form>
                            </div>
                            <div class="baki_pop">
                                <form action="" method="post"></form>
                            </div>
                        </div>
                    </div>

                <?php
                } ?>
            </div>
            <div class="baki">
                <?php
                include '../php/config.php';
                $sql1 = "SELECT *, quantity*price AS total FROM cart WHERE status = 'baki' AND rid = $rid ";
                $result1 = mysqli_query($con, $sql1);
                if ($list = mysqli_num_rows($result1)) {

                ?>
                    <div class="button_baki buttons">Baki <?php echo $list ?></div>
                    <div class="box_baki boxs">
                        <div class="box">
                            <?php
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                $pid = $row1['pid'];
                                $sql2 = "SELECT * FROM product WHERE id = $pid ";
                                $result2 = mysqli_query($con, $sql2);
                                $row2 = mysqli_fetch_assoc($result2);
                            ?>
                                <div class="card card<?php echo $row1['id'] ?>">
                                    <div class="image">
                                        <img src="../image/product/<?php echo $row2['pic'] ?>" alt="">
                                    </div>
                                    <div class="name"><?php echo $row2['nam'] ?></div>
                                    <div class="price">দামঃ <?php echo $row1['price'] ?></div>
                                    <div class="quantity">পরিমানঃ <?php echo $row1['quantity'] ?></div>
                                    <div class="tp">মোটঃ <?php echo $row1['total'] ?></div>
                                    <div class="btn">
                                        <div class="bt complete<?php echo $row1['id'] ?>">Complete</div>
                                    </div>
                                </div>
                            <?php } ?>

                            <script>
                                <?php
                                date_default_timezone_set('Asia/Dhaka');
                                $time = date("Y/m/d || h/i/s"); ?>
                                $(document).ready(function() {
                                    $(".complete<?php echo $row1['id'] ?>").click(function() {
                                        var id = <?php echo $row1['id'] ?>;
                                        var time = "<?php echo $time ?>";
                                        $.ajax({
                                            url: "../php/delivery/cart_update_complete.php",
                                            type: "post",
                                            data: {
                                                id: id,
                                                time: time
                                            },
                                            success: function(data) {
                                                $(".card<?php echo $row1['id'] ?>").fadeOut()
                                            }
                                        })
                                    })
                                })
                            </script>

                        </div>
                        <div class="cardinfo">
                            <div class="left">
                                <div class="item">ITEM : 6</div>
                                <div class="ff">FULL PRICE : $400/-</div>
                                <div class="dis">DISCOUNT : $60/-</div>
                                <div class="tp">SUB TOTAL : $340/-</div>
                            </div>
                            <div class="right">
                                <div class="btn">
                                    <span class="complete_op"><a href=""> Complete</a></span>
                                </div>
                            </div>

                            <div class="complete_pop">
                                <form action="" method="post"></form>
                            </div>
                            <div class="baki_pop">
                                <form action="" method="post"></form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="complete">
                <?php
                include '../php/config.php';
                $sql1 = "SELECT *, quantity*price AS total FROM cart WHERE status = 'complete' AND rid = $rid ";
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

                                </div>
                            <?php } ?>
                        </div>
                        <div class="cardinfo">
                            <div class="left">
                                <div class="item">ITEM : 6</div>
                                <div class="ff">FULL PRICE : $400/-</div>
                                <div class="dis">DISCOUNT : $60/-</div>
                                <div class="tp">SUB TOTAL : $340/-</div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>

    </div>

</body>
<script>
    $(document).ready(function() {
        $(".box_order").hide()
        $(".box_baki").hide()
        $(".box_complete").hide()

        $(".button_order").click(function() {
            $(".box_order").toggle()
        })
        $(".button_baki").click(function() {
            $(".box_baki").toggle()
        })
        $(".button_complete").click(function() {
            $(".box_complete").toggle()
        })
    })
</script>

</html>