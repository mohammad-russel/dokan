<?php
session_start();
if (!isset($_SESSION["rid"])) {
    header("location:login.php");
}
$rid = $_SESSION["rid"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deller Dashboard</title>
    <?php @include "components/head.php"; ?>
</head>

<body>
    <div class="container deller_cont">
        <?php
        @include "../php/config.php";
        $sql = "SELECT * FROM retailer WHERE id = $rid ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);

        ?>
            <div class="box">
                <div class="header">
                    <div class="div1">
                        <div class="toggle_btn tb1">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                        <div class="toggle_btn tb2">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                        <div class="name"><?php echo $row['nam'] ?></div>
                    </div>
                    <div class="div2">
                        <div class="links">
                            <a href="#">Dashbord</a>
                            <a href="#">About Me</a>
                            <a href="#">Sell</a>
                            <a href="#">SR</a>
                        </div>
                    </div>
                    <div class="div3">
                        <div class="search_box">
                            <div class="icon r-i">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                            <input type="search" name="search" id="search" placeholder="Search something">
                            <div class="icon l-i">
                                <i class="fa-solid fa-chevron-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="div4">
                        <div class="btns">
                            <div class="profile">
                                <img src="../image/retailer/<?php echo $row['retailerpic'] ?>" alt="">
                                <span><?php echo $row['nam'] ?></span>
                            </div>
                            <div class="notify">
                                <i class="fa-solid fa-bell"></i>
                            </div>
                            <div class="close">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ----------------------- -->
                <div class="contant">
                    <div class="side_box">
                        <div class="head">

                            <div class="extra"></div>
                            <div class="image">
                                <img src="../image/retailer/<?php echo $row['retailerpic'] ?>" alt="">
                            </div>
                            <div class="name"><?php echo $row['nam'] ?></div>
                            <div class="number"><?php echo $row['num'] ?></div>

                        </div>
                        <div class="link_box">
                            <a href="" class="a1">
                                <div class="box">
                                    <div class="icon">
                                        <i class="fa-solid fa-chalkboard-user"></i>
                                    </div>
                                    <span>Dashboard</span>
                                </div>
                            </a>
                            <a href="">
                                <div class="box">
                                    <div class="icon">
                                        <i class="fa-solid fa-user-group"></i>
                                    </div>
                                    <span>SR</span>
                                </div>
                            </a>
                            <a href="">
                                <div class="box">
                                    <div class="icon">
                                        <i class="fa-solid fa-map-location-dot"></i>
                                    </div>
                                    <span>Sell by union</span>
                                </div>
                            </a>
                            <a href="">
                                <div class="box">
                                    <div class="icon">
                                        <i class="fa-solid fa-bag-shopping"></i>
                                    </div>
                                    <span>Product</span>
                                </div>
                            </a>
                            <a href="" class="a5">
                                <div class="box">
                                    <div class="icon">
                                        <i class="fa-solid fa-cubes-stacked"></i>
                                    </div>
                                    <span>Stock</span>
                                </div>
                            </a>
                            <a href="" class="a6">
                                <div class="box">
                                    <div class="icon">
                                        <i class="fa-solid fa-arrow-trend-up"></i>
                                    </div>
                                    <span>Sell</span>
                                </div>
                            </a>
                        </div>
                        <div class="foot">
                            <a href="">
                                <div class="icon">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                </div>
                                <span>প্রস্থান</span>
                            </a>
                        </div>
                    </div>
                    <div class="main_box">
                        <div class="box">
                            <div class="head">
                                <div class="sec_box">
                                    <div class="sec">
                                        <div class="icon">
                                            <i class="fa-solid fa-arrow-trend-up"></i>
                                        </div>
                                        <span>Sell</span>
                                    </div>
                                    <div class="sec">
                                        <div class="icon">
                                            <i class="fa-solid fa-grip"></i>
                                        </div>
                                        <span>board</span>
                                    </div>
                                    <div class="sec">
                                        <div class="icon">
                                            <i class="fa-solid fa-map-location-dot"></i>
                                        </div>
                                        <span>union</span>
                                    </div>
                                    <div class="sec">
                                        <div class="icon">
                                            <i class="fa-solid fa-user-group"></i>
                                        </div>
                                        <span>SR</span>
                                    </div>
                                </div>
                                <div class="search_box">
                                    <div class="icon">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </div>
                                    <input type="search" name="search" id="search" placeholder="search">
                                </div>
                            </div>
                            <div class="retailer_shorts">
                                <div class="div1">
                                    <div class="card">
                                        <div class="text">
                                            <span>মোট ক্রয়</span>
                                            <select name="mot" id="mot">
                                                <option value=""></option>
                                                <option value="week">সাপ্তাহে</option>
                                                <option value="month">মাসে</option>
                                            </select>
                                        </div>
                                        <div class="number">
                                            <?php
                                            $sql1 = "SELECT SUM(total) as total FROM `order` WHERE `status` = 'complete' ";
                                            $result1 = mysqli_query($con, $sql1);
                                            if (mysqli_num_rows($result1) > 0) {
                                                $row1 = mysqli_fetch_assoc($result1);
                                            ?>
                                                <span>৳<?php echo $row1['total'] ?></span>
                                            <?php } else { ?>
                                                <span>৳ 0</span>
                                            <?php } ?>
                                            <div class="grow">
                                                12.3% <i class="fa-solid fa-arrow-trend-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="text">
                                            <span>এই সাপ্তাহে</span>
                                            <select name="mot" id="mot">
                                                <option value=""></option>
                                                <option value="week">সাপ্তাহে</option>
                                                <option value="month">মাসে</option>
                                            </select>
                                        </div>
                                        <div class="number">
                                            <?php
                                            $sql2 = "SELECT SUM(total) as total FROM `order` ";
                                            $result2 = mysqli_query($con, $sql2);
                                            if (mysqli_num_rows($result2)) {
                                                $row2 = mysqli_fetch_assoc($result2);
                                            ?>
                                                <span>৳<?php echo $row2['total'] ?></span>
                                            <?php } ?>
                                            <div class="grow">
                                                12.3% <i class="fa-solid fa-arrow-trend-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="text">
                                            <span>বাকি টাকা</span>

                                        </div>
                                        <div class="number">
                                            <?php
                                            $sql3 = "SELECT SUM(total) as total FROM `order` WHERE `status` = 'baki' ";
                                            $result3 = mysqli_query($con, $sql3);
                                            if (mysqli_num_rows($result3) > 0) {
                                                $row3 = mysqli_fetch_assoc($result3);
                                            ?>
                                                <span>৳<?php echo $row3['total'] ?></span>
                                            <?php } else { ?>
                                                <span>৳ 0 </span>
                                            <?php  } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="div2">
                                    <div class="card">
                                        <div class="text">কার্ট</div>
                                        <?php
                                        $sql1 = "SELECT COUNT(rid) as ridcart FROM `cart` WHERE `status` = 'cart' ";
                                        $result1 = mysqli_query($con, $sql1);
                                        if (mysqli_num_rows($result1) > 0) {
                                            $row1 = mysqli_fetch_assoc($result1);
                                        ?>
                                            <div class="num"><?php echo $row1['ridcart'] ?>টি</div>
                                        <?php } ?>
                                    </div>
                                    <div class="card">
                                        <div class="text">পেন্ডিং</div>
                                        <?php
                                        $sql1 = "SELECT COUNT(rid) as ridcart FROM `cart` WHERE `status` = 'order' ";
                                        $result1 = mysqli_query($con, $sql1);
                                        if (mysqli_num_rows($result1) > 0) {
                                            $row1 = mysqli_fetch_assoc($result1);
                                        ?>
                                            <div class="num"><?php echo $row1['ridcart'] ?>টি</div>
                                        <?php } ?>
                                    </div>
                                    <div class="card">
                                        <div class="text">ক্রয় সম্পূর্ণ</div>
                                        <?php
                                        $sql1 = "SELECT COUNT(rid) as ridcart FROM `cart` WHERE `status` = 'complete' ";
                                        $result1 = mysqli_query($con, $sql1);
                                        if (mysqli_num_rows($result1) > 0) {
                                            $row1 = mysqli_fetch_assoc($result1);
                                        ?>
                                            <div class="num"><?php echo $row1['ridcart'] ?>টি</div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="div3">
                                    <div class="pro_box">
                                        <h3>বেশি ক্রয় হয়েছে</h3>
                                        <?php
                                        $sql4 = "SELECT DISTINCT pid FROM pro WHERE `status` = 'yes' order by total DESC  LIMIT 5 ";
                                        $result4 = mysqli_query($con, $sql4);
                                        if (mysqli_num_rows($result4)) {
                                            while ($row4 = mysqli_fetch_assoc($result4)) { ?>
                                                <div class="card">
                                                    <?php
                                                    @include "../php/config.php";
                                                    $pid = $row4['pid'];
                                                    $sql1 = "SELECT * FROM product WHERE id = $pid ";
                                                    $result1 = mysqli_query($con, $sql1);
                                                    $row1 = mysqli_fetch_assoc($result1);
                                                    ?>
                                                    <div class="image">
                                                        <img src="../image/product/<?php echo $row1['pic'] ?>" alt="">
                                                    </div>
                                                    <?php
                                                    $sql5 = "SELECT SUM(total) as tot FROM pro WHERE `status`='yes' ";
                                                    $result5 = mysqli_query($con, $sql5);
                                                    $row5 = mysqli_fetch_assoc($result5);
                                                    $total = $row5['tot'];

                                                    $sql = "SELECT * FROM pro WHERE pid = $pid AND `status`='yes' ";
                                                    $result = mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $per_total = $row['total'];

                                                    $percent = $per_total * 100 / $total;
                                                    ?>
                                                    <div class="progress_box">
                                                        <div class="progress" style="width:<?php echo $percent ?>%;"></div>
                                                    </div>
                                                    <!-- <?php echo $per_total ?>
                                                    <br>
                                                    <?php echo $total ?>
                                                    <br>
                                                    <?php echo $percent ?> -->
                                                </div>
                                        <?php }
                                        } ?>



                                    </div>
                                </div>
                            </div>
                            <div class="statics_box">
                                <div class="header">
                                    <div class="text">ব্যবসার পর্যবেক্ষণ</div>
                                    <div class="dates">
                                        <div class="year">jan 2023 <i class="fa-regular fa-calendar"></i></div>
                                        <select name="based" id="based">
                                            <option value="week">
                                                <span>This Week</span>
                                                <div class="icon">
                                                    <i class="fa-solid fa-chevron-down"></i>
                                                </div>
                                            </option>
                                            <option value="month">
                                                <span>This Month</span>
                                                <div class="icon">
                                                    <i class="fa-solid fa-chevron-down"></i>
                                                </div>
                                            </option>
                                            <option value="year">
                                                <span>This Year</span>
                                                <div class="icon">
                                                    <i class="fa-solid fa-chevron-down"></i>
                                                </div>
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <canvas id="myChart"></canvas>
                                <script>
                                    var xValues = [1, 2, 3, 4, 5, 6, 7];

                                    new Chart("myChart", {
                                        type: "line",
                                        data: {
                                            labels: xValues,
                                            datasets: [{
                                                data: [1060, 1070, 9110, 1330, 2210, 7830, 2478],
                                                borderColor: "#1c5ddf",
                                                fill: true
                                            }, {
                                                data: [16300, 1700, 4000, 5000, 6000, 7000, 3233],
                                                borderColor: "#8d9bb7",
                                                fill: false
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    grid: {
                                                        display: false,
                                                        drawBorder: false, // <-- this removes y-axis line
                                                        lineWidth: 0.5,
                                                    }
                                                }
                                            },

                                            legend: {
                                                display: false
                                            }
                                        }
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>


<script>
    $(document).ready(function() {
        $(".side_box").toggleClass("css_head")
        $(".side_box").children(".link_box").toggleClass("css_link_box")
        $(".side_box").children(".link_box").children("a").toggleClass("css_bornone")
        $(".side_box").children(".foot").children("a").toggleClass("age")

        $(".tb1").click(function() {
            $(".side_box").toggleClass("head_css")
            $(".side_box").children(".head").toggleClass("span_css")
            $(".side_box").children(".link_box").toggleClass("link_box_css")
            $(".side_box").children(".link_box").children("a").toggleClass("bornone")
            $(".side_box").children(".link_box").children("a").children(".box").children("span").toggleClass("span_css")
            $(".side_box").children(".foot").children("a").children("span").toggleClass("span_css")
            $(".side_box").children(".foot").children("a").toggleClass("bornone")
        })
        $(".tb2").click(function() {
            $(".side_box").toggle()
        })
    })
</script>

</html>