<?php
session_start();
if (!isset($_SESSION["sid"])) {
    header("location:login.php");
}
$rid = $_GET['rid'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../components/head2.php"; ?>
    <title>SR Product</title>
    <style>
        .back a {
            text-decoration: none;
        }

        .count {
            position: relative;
            background: #484848;
            color: white;
            padding: 0px 6px;
            font-size: 13px;
            border-radius: 50%;
            top: -20px;
            z-index: 1;
            left: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="back">
                <a href="retailer.php">
                    <ion-icon style="color: #3E5467; background: linear-gradient(315.13deg, rgba(194, 217, 237, 0.3) 5.21%, rgba(255, 255, 255, 0.3) 62.26%), #E9F0F7;
box-shadow: 4px 4px 12px rgba(138, 155, 189, 0.3), -5px -5px 15px rgba(255, 255, 255, 0.9);" name="arrow-back-outline"></ion-icon>
                </a>
            </div>
            <div class="back">
                <a href="cart.php?rid=<?php echo $rid ?>">
                    <span class="count"></span>
                    <ion-icon style="color: #3E5467; background: linear-gradient(315.13deg, rgba(194, 217, 237, 0.3) 5.21%, rgba(255, 255, 255, 0.3) 62.26%), #E9F0F7;
box-shadow: 4px 4px 12px rgba(138, 155, 189, 0.3), -5px -5px 15px rgba(255, 255, 255, 0.9);" name="cart-outline"></ion-icon>
                </a>
            </div>
        </div>
        <!-- -------- -->
        <div class="sr_product">
            <?php
            $id = $_SESSION["sid"];
            @include "../php/config.php";
            $sql1 = "SELECT * FROM sr WHERE id = $id ";
            $result1 = mysqli_query($con, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            $srid = $row1['srnum'];
            @include "../php/config.php";
            $sql = "SELECT * FROM product WHERE sr='$srid'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="card">
                        <div class="image">
                            <img src="../image/product/<?php echo $row['pic'] ?>" alt="">
                        </div>
                        <?php
                        date_default_timezone_set('Asia/Dhaka');
                        $time = date("Y.m.d || h.i.s");
                        $year = date("y");
                        $month = date("m");
                        $day = date("d");
                        $ymd = date("ymd");
                        ?>
                     
                            <!-- --------- -->
                            <div class="name"><?php echo $row['nam'] ?></div>
                            <div class="price">৳ <?php echo $row['price'] ?></div>
                            <div class="btn">
                                <?

                                ?>
                                <input type="hidden" name="rid" id="rid<?php echo $row['id'] ?>" value="<?php echo $rid ?>">
                                <input type="hidden" name="pid" id="pid<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>">
                                <input type="hidden" name="sid" id="sid<?php echo $row['id'] ?>" value="<?php echo $id ?>">
                                <input type="hidden" name="deller" id="deller<?php echo $row['id'] ?>" value="<?php echo $row1['deller'] ?>">
                                <input type="hidden" name="pp" id="pp<?php echo $row['id'] ?>" value="<?php echo $row['price'] ?>">
                                <input type="hidden" name="time" id="time<?php echo $row['id'] ?>" value="<?php echo $time ?>">
                                <input type="hidden" name="status" id="status<?php echo $row['id'] ?>" value="cart">
                                <input type="number" name="quantity" id="quantity<?php echo $row['id'] ?>" value="1">
                                <!-- ----------------------------- -->
                                <input type="hidden" name="year" id="year<?php echo $row['id'] ?>" value="<?php echo $year ?>">
                                <input type="hidden" name="month" id="month<?php echo $row['id'] ?>" value="<?php echo $month ?>">
                                <input type="hidden" name="day" id="day<?php echo $row['id'] ?>" value="<?php echo $day ?>">
                                <input type="hidden" name="ymd" id="ymd<?php echo $row['id'] ?>" value="<?php echo $ymd ?>">

                                <!-- ----------------------------------- -->
                                <button class="addcart addcart<?php echo $row['id'] ?>" name="add"><ion-icon name="add-outline"></ion-icon></button>
                            </div>
                            <script>
                                $(".addcart<?php echo $row['id'] ?>").click(function() {
                                    var rid = $("#rid<?php echo $row['id'] ?>").val()
                                    var pid = $("#pid<?php echo $row['id'] ?>").val()
                                    var sid = $("#sid<?php echo $row['id'] ?>").val()
                                    var pp = $("#pp<?php echo $row['id'] ?>").val()
                                    var time = $("#time<?php echo $row['id'] ?>").val()
                                    var status = $("#status<?php echo $row['id'] ?>").val()
                                    var quantity = $("#quantity<?php echo $row['id'] ?>").val()
                                    var year = $("#year<?php echo $row['id'] ?>").val()
                                    var month = $("#month<?php echo $row['id'] ?>").val()
                                    var day = $("#day<?php echo $row['id'] ?>").val()
                                    var ymd = $("#ymd<?php echo $row['id'] ?>").val()
                                    var deller = $("#deller<?php echo $row['id'] ?>").val()
                                    $.ajax({
                                        url: "../php/add_cart_sr.php",
                                        type: "POST",
                                        data: {
                                            rid: rid,
                                            pid: pid,
                                            sid: sid,
                                            pp: pp,
                                            time: time,
                                            status: status,
                                            quantity: quantity,
                                            year: year,
                                            month: month,
                                            day: day,
                                            ymd: ymd,
                                            deller: deller
                                        },
                                        success: function(data) {
                                            $('#quantity<?php echo $row['id'] ?>').val('')
                                        }
                                    })
                                })
                            </script>
                        </div>

                <?php  }
            } ?>
                    </div>
        </div>

</body>
<script>
    $(document).ready(function() {
        var page = 0;

        function load() {
            $.ajax({
                url: "../php/load_product.php",
                type: "POST",
                data: {
                    page: page
                },
                success: function(data) {

                    $(".more").remove();
                    $(".retailermain").append(data);

                }
            })
        }
        load();
        $(document).on("click", ".loadmore", function() {
            page += 5;
            load();
        })

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
        $(document).on("click", ".addcart", function() {
            cartload();
        })
        // ---------

    })
</script>

</html>