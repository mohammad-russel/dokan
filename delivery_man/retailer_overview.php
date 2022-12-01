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
    <title>Delivery man Retailer Overview</title>
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
                            <?php
                            include '../php/config.php';
                            $sql1 = "SELECT *, SUM(quantity*price) AS total FROM cart WHERE status = 'order' AND rid = $rid ";
                            $result1 = mysqli_query($con, $sql1);
                            $row = mysqli_fetch_assoc($result1);

                            // ----------
                            $sql1 = "SELECT *, quantity*price AS total FROM cart WHERE status = 'order' AND rid = $rid ";
                            $result1 = mysqli_query($con, $sql1);
                            $list40 = mysqli_num_rows($result1);
                            //   ---------
                            $sql1 = "SELECT DISTINCT discount FROM cart WHERE status = 'order' AND rid = $rid ";
                            $result1 = mysqli_query($con, $sql1);
                            $row2 = mysqli_fetch_assoc($result1);

                            $sub_total = $row['total'] - $row2['discount'];

                            ?>
                            <div class="left">
                                <div class="item">ITEM : <?php echo $list40 ?></div>
                                <div class="ff">FULL PRICE : ৳<?php echo $row['total'] ?>/-</div>
                                <div class="dis">DISCOUNT : ৳<?php echo $row2['discount'] ?>/-</div>
                                <div class="tp">SUB TOTAL : ৳<?php echo $sub_total ?>/-</div>
                            </div>
                            <div class="right">
                                <div class="btn">
                                    <span class="complete_op">Complete</span>
                                    <span class="baki_op"><a href="baki_signature.php?rid=<?php echo $rid ?>">Baki</a></span>
                                </div>
                            </div>

                            <div class="complete_pop">
                                <div class="close_complete">
                                    <ion-icon name="close-outline"></ion-icon>
                                </div>
                                <form method="post" action="../php/signature.php" enctype="multipart/form-data">
                                    <?php
                                    date_default_timezone_set('Asia/Dhaka');
                                    $time = date("Y/m/d || h/i/s"); ?>
                                    <div id="signature-pad">
                                        <div>
                                            <div id="note" onmouseover="my_function();"></div>
                                            <canvas id="the_canvas" width="350px" height="600px"></canvas>
                                        </div>
                                        <div style="margin:10px;" class="input_box">
                                            <input type="hidden" id="sig" name="sig" value="<?php echo "signature_" . date("his") . ".png" ?>">
                                            <input type="hidden" id="signature" name="signature">
                                            <!-- -------------------- -->
                                            <input type="hidden" name="st" id="st" value="<?php echo $sub_total ?>">
                                            <input type="hidden" name="rid" id="rid" value="<?php echo $rid ?>">
                                            <input type="hidden" name="discount" id="discount" value="<?php echo $row2['discount'] ?>">
                                            <input type="hidden" name="item" id="item" value="<?php echo $list40 ?>">
                                            <input type="hidden" name="products" id="products" value="<?php

                                                                                                        include '../php/config.php';
                                                                                                        $sql1 = "SELECT *, quantity*price AS total FROM cart WHERE status = 'order' AND rid = $rid ";
                                                                                                        $result1 = mysqli_query($con, $sql1);
                                                                                                        if (mysqli_num_rows($result1)) {
                                                                                                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                                                                                                $pid = $row1['pid'];
                                                                                                                $sql2 = "SELECT * FROM product WHERE id = $pid ";
                                                                                                                $result2 = mysqli_query($con, $sql2);
                                                                                                                $row2 = mysqli_fetch_assoc($result2);
                                                                                                                echo "<span>{$row2['nam']} || price: {$row1['price']} || Quantity: {$row1['quantity']} || Total:{$row1['total']} </span><br>";
                                                                                                            }
                                                                                                        }
                                                                                                        ?>">
                                            <input type="hidden" name="time" id="time" value="<?php echo $time ?>">
                                            <!-- -------------------- -->
                                            <button type="button" id="clear_btn" class="btn btn-danger" data-action="clear"><span class="glyphicon glyphicon-remove"></span> Clear</button>
                                            <button type="submit" id="save_btn" class="btn btn-primary" data-action="save-png"><span class="glyphicon glyphicon-ok"></span> Complete</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                        <script>
                            $(document).ready(function() {
                                $(".complete_pop").hide()
                                $(".baki_pop").hide()

                                $(".complete_op").click(function() {
                                    $(".complete_pop").show()
                                })
                                $(".baki_op").click(function() {
                                    $(".baki_pop").show()
                                })

                                $(".close_complete").click(function() {
                                    $(".complete_pop").hide()
                                })
                                $(".close_baki").click(function() {
                                    $(".baki_pop").hide()
                                })
                            })
                        </script>
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
                                        <!-- <div class="bt complete<?php echo $row1['id'] ?>">Complete</div> -->
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- <script>
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
                            </script> -->

                        </div>
                        <div class="cardinfo">
                            <?php
                            include '../php/config.php';
                            $sql1 = "SELECT *, SUM(quantity*price) AS total FROM cart WHERE status = 'baki' AND rid = $rid ";
                            $result1 = mysqli_query($con, $sql1);
                            $row = mysqli_fetch_assoc($result1);

                            // ----------
                            $sql1 = "SELECT *, quantity*price AS total FROM cart WHERE status = 'baki' AND rid = $rid ";
                            $result1 = mysqli_query($con, $sql1);
                            $list4 = mysqli_num_rows($result1);
                            //   ---------
                            $sql1 = "SELECT DISTINCT discount FROM cart WHERE status = 'baki' AND rid = $rid ";
                            $result1 = mysqli_query($con, $sql1);
                            $row2 = mysqli_fetch_assoc($result1);

                            $sub_total = $row['total'] - $row2['discount'];

                            ?>
                            <div class="left">
                                <div class="item">ITEM : <?php echo $list4 ?></div>
                                <div class="ff">FULL PRICE : ৳<?php echo $row['total'] ?>/-</div>
                                <div class="dis">DISCOUNT : ৳<?php echo $row2['discount'] ?>/-</div>
                                <div class="tp">SUB TOTAL : ৳<?php echo $sub_total ?>/-</div>
                            </div>
                            <div class="right">
                                <div class="btn">
                                    <span class="complete_op"><a href="../php/delivery/cart_update_complete_1.php?rid=<?php echo $rid ?>"> Complete</a></span>
                                </div>
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
                                    <div class="name">সময়<br> <?php echo $row1['time'] ?></div>

                                </div>
                            <?php } ?>
                        </div>
                        <div class="cardinfo">
                            <?php
                            include '../php/config.php';
                            $sql1 = "SELECT *, SUM(quantity*price) AS total FROM cart WHERE status = 'complete' AND rid = $rid ";
                            $result1 = mysqli_query($con, $sql1);
                            $row = mysqli_fetch_assoc($result1);

                            // ----------
                            $sql1 = "SELECT *, quantity*price AS total FROM cart WHERE status = 'complete' AND rid = $rid ";
                            $result1 = mysqli_query($con, $sql1);
                            $list4 = mysqli_num_rows($result1);
                            //   ---------
                            $sql1 = "SELECT DISTINCT discount FROM cart WHERE status = 'complete' AND rid = $rid ";
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

    </div>

</body>

<script>
    var wrapper = document.getElementById("signature-pad");
    var clearButton = wrapper.querySelector("[data-action=clear]");
    var savePNGButton = wrapper.querySelector("[data-action=save-png]");
    var canvas = wrapper.querySelector("canvas");
    var el_note = document.getElementById("note");
    var signaturePad;
    signaturePad = new SignaturePad(canvas);
    clearButton.addEventListener("click", function(event) {
        document.getElementById("note").innerHTML = "The signature should be inside box";
        signaturePad.clear();
    });
    savePNGButton.addEventListener("click", function(event) {
        if (signaturePad.isEmpty()) {
            alert("Please provide signature first.");
            event.preventDefault();
        } else {
            var canvas = document.getElementById("the_canvas");
            var dataUrl = canvas.toDataURL();
            document.getElementById("signature").value = dataUrl;
        }
    });

    function my_function() {
        document.getElementById("note").innerHTML = "";
    }
</script>

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