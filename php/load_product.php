<?php
session_start();
$rid = $_SESSION["rid"];
include "config.php";
$limit = 5;
$start = $_POST['page'];
$sql = "SELECT * FROM product LIMIT $start,$limit";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)) { ?>

    <?php while ($row = mysqli_fetch_assoc($result)) {
        $srnum = $row['sr'];
        $sql3 = "SELECT * FROM sr WHERE srnum = '$srnum'";
        $result3 = mysqli_query($con, $sql3);
        $row3 = mysqli_fetch_assoc($result3);


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
            <div class="name"><?php echo $row['nam'] ?></div>
            <div class="price">৳ <?php echo $row['price'] ?></div>
            <div class="btn">
                <?

                ?>

                <!-- -------------------------------- -->
                <input type="hidden" name="rid" id="rid<?php echo $row['id'] ?>" value="<?php echo $rid ?>">
                <input type="hidden" name="pid" id="pid<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>">
                <input type="hidden" name="pp" id="pp<?php echo $row['id'] ?>" value="<?php echo $row['price'] ?>">
                <input type="hidden" name="sid" id="sid<?php echo $row['id'] ?>" value="<?php echo $row3['id'] ?>">
                <input type="hidden" name="deller" id="deller<?php echo $row['id'] ?>" value="<?php echo $row3['deller'] ?>">
                <input type="hidden" name="time" id="time<?php echo $row['id'] ?>" value="<?php echo $time ?>">
                <input type="hidden" name="status" id="status<?php echo $row['id'] ?>" value="cart">
                <input type="number" name="quantity" id="quantity<?php echo $row['id'] ?>" value="1">
                <!-- ----------------- -->
                <input type="hidden" name="year" id="year<?php echo $row['id'] ?>" value="<?php echo $year ?>">
                <input type="hidden" name="month" id="month<?php echo $row['id'] ?>" value="<?php echo $month ?>">
                <input type="hidden" name="day" id="day<?php echo $row['id'] ?>" value="<?php echo $day ?>">
                <input type="hidden" name="ymd" id="ymd<?php echo $row['id'] ?>" value="<?php echo $ymd ?>">

                <button class="addcart addcart<?php echo $row['id'] ?>" name="add">
                    <ion-icon name="add-outline"></ion-icon>
                </button>

            </div>
            <script>
                $(".addcart<?php echo $row['id'] ?>").click(function() {
                    var rid = $("#rid<?php echo $row['id'] ?>").val()
                    var pid = $("#pid<?php echo $row['id'] ?>").val()
                    var pp = $("#pp<?php echo $row['id'] ?>").val()
                    var sid = $("#sid<?php echo $row['id'] ?>").val()
                    var time = $("#time<?php echo $row['id'] ?>").val()
                    var status = $("#status<?php echo $row['id'] ?>").val()
                    var quantity = $("#quantity<?php echo $row['id'] ?>").val()
                    var year = $("#year<?php echo $row['id'] ?>").val()
                    var month = $("#month<?php echo $row['id'] ?>").val()
                    var day = $("#day<?php echo $row['id'] ?>").val()
                    var ymd = $("#ymd<?php echo $row['id'] ?>").val()
                    var deller = $("#deller<?php echo $row['id'] ?>").val()
                    var sr = $("#sr<?php echo $row['id'] ?>").val()

                    $.ajax({
                        url: "../php/add_cart.php",
                        type: "POST",
                        data: {
                            rid: rid,
                            pid: pid,
                            pp: pp,
                            sid: sid,
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

    <?php } ?>
    <div class="loadmore more">Load More</div>
<?php

} ?>