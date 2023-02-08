<?php
session_start();
if (!isset($_SESSION["rid"])) {
    header("location:login.php");
}
$rid = $_SESSION["rid"];
date_default_timezone_set("Asia/dhaka");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>retailer Dashboard</title>
    <?php @include "components/head.php"; ?>
</head>

<body>
    <div class="container deller_cont">
        <?php
        @include "../php/config.php";
        $sql = "SELECT * FROM retailer WHERE id = $rid ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
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
                            <a href="retailer.php" class="a1">
                                <div class="box">
                                    <div class="icon">
                                        <i class="fa-solid fa-chalkboard-user"></i>
                                    </div>
                                    <span>Dashboard</span>
                                </div>
                            </a>
                            <a href="retailer.php">
                                <div class="box">
                                    <div class="icon">
                                        <i class="fa-solid fa-user-group"></i>
                                    </div>
                                    <span>SR</span>
                                </div>
                            </a>
                            <a href="retailer.php">
                                <div class="box">
                                    <div class="icon">
                                        <i class="fa-solid fa-map-location-dot"></i>
                                    </div>
                                    <span>Sell by union</span>
                                </div>
                            </a>
                            <a href="../retailer/shop.php">
                                <div class="box">
                                    <div class="icon">
                                        <i class="fa-solid fa-bag-shopping"></i>
                                    </div>
                                    <span>Product</span>
                                </div>
                            </a>
                            <a href="retailer.php" class="a5">
                                <div class="box">
                                    <div class="icon">
                                        <i class="fa-solid fa-cubes-stacked"></i>
                                    </div>
                                    <span>Stock</span>
                                </div>
                            </a>
                            <a href="../retailer/user.php" class="a6">
                                <div class="box">
                                    <div class="icon">
                                        <i class="fa-solid fa-arrow-trend-up"></i>
                                    </div>
                                    <span>Orders</span>
                                </div>
                            </a>
                        </div>
                        <div class="foot">
                            <a href="../php/retailer_logout.php">
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
                                            $sql1 = "SELECT *, SUM(price*quantity) as total FROM `cart` WHERE `status` = 'complete' AND rid = $rid ";
                                            $result1 = mysqli_query($con, $sql1);
                                            if (mysqli_num_rows($result1) > 0) {
                                                $row1 = mysqli_fetch_assoc($result1);
                                            ?>
                                                <span>৳<?php echo $row1['total'] ?></span>
                                            <?php } else { ?>
                                                <span>৳ 0</span>
                                            <?php } ?>
                                            <div class="growth">
                                                <?php
                                                $today = date('ymd', strtotime('-0 days'));
                                                $today1 = date('ymd', strtotime('-1 days'));
                                                $today7 = date('ymd', strtotime('-6 days'));
                                                $today30 = date('ymd', strtotime('-29 days'));
                                                // ------------------
                                                $sql1 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd <= $today AND ymd >= $today7  AND rid = $rid AND `status` = 'complete' ";
                                                $result1 = mysqli_query($con, $sql1);
                                                $row7 = mysqli_fetch_assoc($result1);
                                                // ----------------
                                                $sql2 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd = $today1 AND rid = $rid   AND `status` = 'complete'";
                                                $result2 = mysqli_query($con, $sql2);
                                                $row2 = mysqli_fetch_assoc($result2);
                                                // ----------------------
                                                $sql3 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd = $today AND rid = $rid  AND `status` = 'complete'";
                                                $result3 = mysqli_query($con, $sql3);
                                                $row3 = mysqli_fetch_assoc($result3);
                                                // -----------------
                                                $td = $row3['aa'];
                                                $yd = $row2['aa'];

                                                if ($yd != 0) {
                                                    if ($td > $yd) {
                                                        $up = $td * 100 / $yd;
                                                        $a = $up - 100;
                                                ?>
                                                        <div class="grow" style="color: #00ae6e;text-align:right;font-size:12px">
                                                            <?php echo  number_format($a, 1)  ?>% <i class="fa-solid fa-arrow-trend-up"></i>
                                                        </div>
                                                    <?php
                                                    } elseif ($td < $yd) {
                                                        $down = $td * 100 / $yd;
                                                        $a = 100 - $down;
                                                    ?>
                                                        <div class="grow" style="color: red;text-align:right;font-size:12px">
                                                            <?php echo  number_format($a, 1)  ?>% <i class="fa-solid fa-arrow-trend-down"></i>
                                                        </div>
                                                    <?php
                                                    }
                                                } else { ?>
                                                    <div class="grow" style="color: #00ae6e;text-align:right;font-size:12px">
                                                        <?php echo $td ?>% <i class="fa-solid fa-arrow-trend-up"></i>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="text">
                                            <span>আজকে</span>
                                            <select name="mot" id="mot">
                                                <option value=""></option>
                                                <option value="week">সাপ্তাহে</option>
                                                <option value="month">মাসে</option>
                                            </select>
                                        </div>
                                        <div class="number">
                                            <?php
                                            date_default_timezone_set("Asia/dhaka");
                                            $date = date("ymd");
                                            $sql2 = "SELECT *, SUM(price*quantity) as total FROM `cart` WHERE ymd = $date AND `status` = 'complete' AND rid = $rid ";
                                            $result2 = mysqli_query($con, $sql2);
                                            if (mysqli_num_rows($result2)) {
                                                $row2 = mysqli_fetch_assoc($result2);
                                            ?>
                                                <span>৳<?php echo $row2['total'] ?></span>
                                            <?php } ?>
                                            <div class="growth">
                                                <?php
                                                $today = date('ymd', strtotime('-0 days'));
                                                $today1 = date('ymd', strtotime('-1 days'));
                                                $today7 = date('ymd', strtotime('-6 days'));
                                                $today30 = date('ymd', strtotime('-29 days'));
                                                // ------------------
                                                $sql1 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd <= $today AND ymd >= $today7  AND rid = $rid AND `status` = 'complete' ";
                                                $result1 = mysqli_query($con, $sql1);
                                                $row7 = mysqli_fetch_assoc($result1);
                                                // ----------------
                                                $sql2 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd = $today1 AND rid = $rid   AND `status` = 'complete'";
                                                $result2 = mysqli_query($con, $sql2);
                                                $row2 = mysqli_fetch_assoc($result2);
                                                // ----------------------
                                                $sql3 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd = $today AND rid = $rid  AND `status` = 'complete'";
                                                $result3 = mysqli_query($con, $sql3);
                                                $row3 = mysqli_fetch_assoc($result3);
                                                // -----------------
                                                $td = $row3['aa'];
                                                $yd = $row2['aa'];

                                                if ($yd != 0) {
                                                    if ($td > $yd) {
                                                        $up = $td * 100 / $yd;
                                                        $a = $up - 100;
                                                ?>
                                                        <div class="grow" style="color: #00ae6e;text-align:right;font-size:12px">
                                                            <?php echo  number_format($a, 1)  ?>% <i class="fa-solid fa-arrow-trend-up"></i>
                                                        </div>
                                                    <?php
                                                    } elseif ($td < $yd) {
                                                        $down = $td * 100 / $yd;
                                                        $a = 100 - $down;
                                                    ?>
                                                        <div class="grow" style="color: red;text-align:right;font-size:12px">
                                                            <?php echo  number_format($a, 1)  ?>% <i class="fa-solid fa-arrow-trend-down"></i>
                                                        </div>
                                                    <?php
                                                    }
                                                } else { ?>
                                                    <div class="grow" style="color: #00ae6e;text-align:right;font-size:12px">
                                                        <?php echo $td ?>% <i class="fa-solid fa-arrow-trend-up"></i>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="text">
                                            <span>বাকি টাকা</span>

                                        </div>
                                        <div class="number">
                                            <?php
                                            $sql3 = "SELECT *, SUM(price*quantity) as total FROM `cart` WHERE `status` = 'baki' ";
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
                                        $sql1 = "SELECT COUNT(rid) as ridcart FROM `cart` WHERE `status` = 'cart' AND `rid` = $rid ";
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
                                        $sql1 = "SELECT COUNT(rid) as ridcart FROM `cart` WHERE `status` = 'order' AND `rid` = $rid ";
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
                                        $sql1 = "SELECT COUNT(rid) as rid  FROM `cart` WHERE `status` = 'complete' AND `rid` = $rid";
                                        $result1 = mysqli_query($con, $sql1);
                                        if (mysqli_num_rows($result1) > 0) {
                                            $row1 = mysqli_fetch_assoc($result1);
                                        ?>
                                            <div class="num"><?php echo $row1['rid'] ?>টি</div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="div3">
                                    <div class="pro_box">
                                        <h3>বেশি ক্রয় হয়েছে</h3>
                                        <?php
                                        $sql4 = "SELECT *, SUM(quantity*price) AS per FROM cart WHERE rid = $rid GROUP BY pid ORDER BY per DESC";
                                        $result4 = mysqli_query($con, $sql4);
                                        if (mysqli_num_rows($result4)) {
                                            while ($row4 = mysqli_fetch_assoc($result4)) { ?>
                                                <div class="card">
                                                    <?php
                                                    // echo $row4['con'];           
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
                                                    $sql1 = "SELECT *,SUM(quantity*price) AS tot FROM cart WHERE rid =$rid ";
                                                    $result1 = mysqli_query($con, $sql1);
                                                    $row1 = mysqli_fetch_assoc($result1);
                                                    $per = $row4['per'];
                                                    $tot = $row1['tot'];
                                                    $percent = $per * 100 / $tot;
                                                    // echo $percent

                                                    ?>
                                                    <div class="progress_box">
                                                        <div class="progress" style="width:<?php echo number_format($percent, 1) ?>%;"></div>
                                                    </div>

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
                                        <div class="year"><?php echo date("M Y") ?> <i class="fa-regular fa-calendar"></i></div>
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
                                <?php
                                include "../php/config.php";
                                $sql = "SELECT `ymd`, SUM(price * quantity) as total_bill FROM cart WHERE `status` = 'complete' AND rid = $rid AND `ymd` >= DATE_SUB(CURRENT_DATE(), INTERVAL 7 DAY) GROUP BY ymd ORDER BY `ymd` DESC";
                                $result = mysqli_query($con, $sql);

                                // Create an array of dates for the last 7 days
                                $dateRange = new DatePeriod(
                                    new DateTime("-7 days"),
                                    new DateInterval("P1D"),
                                    new DateTime("now")
                                );
                                $dates = array();
                                foreach ($dateRange as $date) {
                                    $dates[] = $date->format("ymd");
                                }

                                // Create the chart data array
                                $chartData = array();
                                while ($row = $result->fetch_assoc()) {
                                    $chartData[$row['ymd']] = array(
                                        'day' => $row['ymd'],
                                        'total_bill' => $row['total_bill']
                                    );
                                }

                                // Add elements for missing dates with a value of 0
                                foreach ($dates as $date) {
                                    if (!array_key_exists($date, $chartData)) {
                                        $chartData[$date] = array(
                                            'day' => $date,
                                            'total_bill' => 0
                                        );
                                    }
                                }

                                ksort($chartData);
                                $chartData = array_values($chartData);
                                // echo json_encode($chartData);
                                ?>
                                <canvas id="myChart3" height="80px"></canvas>
                                <script>
                                    var chartData1 = <?php echo json_encode($chartData); ?>;
                                    var labels1 = chartData1.map(function(e1) {
                                        return e1.day;
                                    });
                                    var data1 = chartData1.map(function(e1) {
                                        return e1.total_bill;
                                    });
                                    var chart1 = document.getElementById('myChart3').getContext('2d');
                                    var gradient = chart1.createLinearGradient(0, 0, 0, 450);

                                    gradient.addColorStop(0.1, 'rgba(0, 122, 255, 0.18)');
                                    gradient.addColorStop(0.9, 'rgba(255, 255, 255, 0)');

                                    // var xValues = [id, 2, 3, 4, 5, 6, 7];
                                    new Chart("myChart3", {
                                        type: "line",
                                        data: {
                                            labels: [0, 1, 2, 3, 4, 5, 6, 7],
                                            datasets: [{
                                                data: data1,
                                                borderColor: "#007aff",
                                                backgroundColor: gradient,
                                                pointBackgroundColor: 'white',
                                                borderWidth: 1,
                                                borderColor: '#007aff',
                                                fill: true
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                x: {
                                                    grid: {
                                                        display: false,
                                                    }
                                                },
                                                y: {
                                                    grid: {
                                                        display: false,
                                                        drawBorder: false,
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