<?php
session_start();
if (!isset($_SESSION["sid"])) {
    header("location:../sr/login.php");
}
$sid = $_SESSION["sid"];
date_default_timezone_set("Asia/dhaka");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sr Dashboard</title>
    <?php @include "components/head.php"; ?>
</head>

<body>
    <div class="container deller_cont">
        <?php
        @include "../php/config.php";
        $sql = "SELECT * FROM sr WHERE id = $sid";
        $result = mysqli_query($con, $sql);
        $row = $result->fetch_assoc();
        $srnum = $row['srnum'];
        // echo $delnum;
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
                            <img src="../image/sr/<?php echo $row['srpic'] ?>" alt="">
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

            <div class="contant">
                <div class="side_box">
                    <div class="head">
                        <div class="extra"></div>
                        <div class="image">
                            <img src="../image/sr/<?php echo $row['srpic'] ?>" alt="">
                        </div>
                        <div class="name"><?php echo $row['nam'] ?></div>
                        <div class="number"><?php echo $row['num'] ?></div>
                    </div>
                    <div class="link_box">
                        <a href="sr.php" class="a1">
                            <div class="box">
                                <div class="icon">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                </div>
                                <span>Dashboard</span>
                            </div>
                        </a>
                        <a href="../sr/retailer.php">
                            <div class="box">
                                <div class="icon">
                                    <i class="fa-solid fa-user-group"></i>
                                </div>
                                <span>Retailers</span>
                            </div>
                        </a>
                        <a href="sr.php">
                            <div class="box">
                                <div class="icon">
                                    <i class="fa-solid fa-map-location-dot"></i>
                                </div>
                                <span>Sell by union</span>
                            </div>
                        </a>
                        <a href="../sr/sr_complete.php">
                            <div class="box">
                                <div class="icon">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </div>
                                <span>Product</span>
                            </div>
                        </a>
                        <a href="sr.php" class="a5">
                            <div class="box">
                                <div class="icon">
                                    <i class="fa-solid fa-cubes-stacked"></i>
                                </div>
                                <span>Stock</span>
                            </div>
                        </a>
                        <a href="../sr/sr_complete.php" class="a6">
                            <div class="box">
                                <div class="icon">
                                    <i class="fa-solid fa-arrow-trend-up"></i>
                                </div>
                                <span>Sell</span>
                            </div>
                        </a>
                    </div>
                    <div class="foot">
                        <a href="../php/sr_logout.php">
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
                        <div class="short_box">
                            <?php
                            $sql1 = "SELECT SUM(price*quantity) as total FROM `cart` WHERE sr = $sid AND `status`= 'complete'";
                            $result1 = mysqli_query($con, $sql1);
                            $row1 = mysqli_fetch_assoc($result1);
                            $total = $row1['total'];
                            // ----------------
                            date_default_timezone_set("Asia/dhaka");
                            $todate = date("ymd");
                            // echo $todate;
                            $sql2 = "SELECT SUM(price*quantity) as toto FROM `cart` WHERE sr = $sid AND `ymd` = $todate AND `status`= 'complete' ";
                            $result2 = mysqli_query($con, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                            $tday = $row2['toto'];
                            // ----------------

                            $sql3 = "SELECT COUNT(id) as count FROM `cart` WHERE sr = $sid AND `status`= 'order'";
                            $result3 = mysqli_query($con, $sql3);
                            $row3 = mysqli_fetch_assoc($result3);
                            $pending = $row3['count'];
                            // ----------------

                            $sql4 = "SELECT COUNT(id) AS pcount FROM `product` WHERE sr = '$srnum' ";
                            $result4 = mysqli_query($con, $sql4);
                            $row4 = mysqli_fetch_assoc($result4);
                            $product = $row4['pcount'];

                            ?>
                            <div class="short">
                                <div class="text">
                                    <span>মোট বিক্রি</span>
                                    <select name="sell" id="sell">
                                        <option value="">
                                        </option>
                                        <option value="week">এই সাপ্তাহে</option>
                                        <option value="month">এই মাসে</option>
                                    </select>
                                </div>


                                <div class="number">৳<?php echo $total ?></div>
                                <div class="growth">
                                    <?php
                                    $today = date('ymd', strtotime('-0 days'));
                                    $today1 = date('ymd', strtotime('-1 days'));
                                    $today7 = date('ymd', strtotime('-6 days'));
                                    $today30 = date('ymd', strtotime('-29 days'));
                                    // ------------------
                                    $sql1 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd <= $today AND ymd >= $today7  AND sr = $sid AND `status` = 'complete' ";
                                    $result1 = mysqli_query($con, $sql1);
                                    $row7 = mysqli_fetch_assoc($result1);
                                    // ----------------
                                    $sql2 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd = $today1 AND sr = $sid  AND `status` = 'complete'";
                                    $result2 = mysqli_query($con, $sql2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    // ----------------------
                                    $sql3 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd = $today AND  sr = $sid  AND `status` = 'complete'";
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
                            <div class="short">
                                <div class="text">
                                    <span>আজকের বিক্রি</span>
                                    <select name="sell" id="sell">
                                        <option value=""></option>
                                        <option value="">গতকালের বিক্রি</option>

                                    </select>
                                </div>
                                <div class="number">৳<?php echo $tday ?></div>
                                <div class="growth">
                                    <?php
                                    $today = date('ymd', strtotime('-0 days'));
                                    $today1 = date('ymd', strtotime('-1 days'));
                                    $today7 = date('ymd', strtotime('-6 days'));
                                    $today30 = date('ymd', strtotime('-29 days'));
                                    // ------------------
                                    $sql1 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd <= $today AND ymd >= $today7  AND sr = $sid AND `status` = 'complete' ";
                                    $result1 = mysqli_query($con, $sql1);
                                    $row7 = mysqli_fetch_assoc($result1);
                                    // ----------------
                                    $sql2 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd = $today1 AND sr = $sid  AND `status` = 'complete'";
                                    $result2 = mysqli_query($con, $sql2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    // ----------------------
                                    $sql3 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd = $today AND  sr = $sid  AND `status` = 'complete'";
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
                            <div class="short">
                                <div class="text">অর্ডার পেন্ডিং</div>
                                <div class="number"><?php echo $pending ?>টি</div>
                            </div>
                            <div class="short">
                                <div class="text">প্রোডাক্ট সংখ্যা</div>
                                <div class="number"><?php echo $product ?></div>
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
                            $sql = "SELECT `ymd`, SUM(price * quantity) as total_bill FROM cart WHERE `status` = 'complete' AND `sr` = $sid AND `ymd` >= DATE_SUB(CURRENT_DATE(), INTERVAL 7 DAY) GROUP BY ymd ORDER BY `ymd` DESC";
                            $result = mysqli_query($con, $sql);

                            $dateRange = new DatePeriod(
                                new DateTime("-6 days"),
                                new DateInterval("P1D"),
                                new DateTime("now")
                            );
                            $dates = array();
                            foreach ($dateRange as $date) {
                                $dates[] = $date->format("ymd");
                            }

                            $chartData = array();
                            while ($row = $result->fetch_assoc()) {
                                $chartData[$row['ymd']] = array(
                                    'day' => $row['ymd'],
                                    'total_bill' => $row['total_bill']
                                );
                            }

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

                                // var xValues = [id, 2, 3, 4, 5, 6, 7];
                                new Chart("myChart3", {
                                    type: "line",
                                    data: {
                                        labels: [1, 2, 3, 4, 5, 6, 7],
                                        datasets: [{
                                            data: data1,
                                            borderColor: "#1c5ddf",
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
                        <div class="sr_uni">
                            <!-- <div class="sr">
                                <div class="sr_head">SR ধারা সবচেয়ে বেশি বিক্রি</div>
                                <div class="sr_box">
                                    <div class="image">
                                        <img src="../image/retailer/vegeta-2020_3840x2160_xtrafondos.com.jpg" alt="">
                                    </div>
                                    <div class="progress_bar">
                                        <div class="fill"></div>
                                    </div>
                                </div>
                                <div class="sr_box">
                                    <div class="image">
                                        <img src="../image/retailer/vegeta-2020_3840x2160_xtrafondos.com.jpg" alt="">
                                    </div>
                                    <div class="progress_bar">
                                        <div class="fill"></div>
                                    </div>
                                </div>

                            </div> -->
                            <div class="union">
                                <div class="union_head">ইউনিয়ন দ্বারা ট্রাফিক</div>

                                <div class="statistics">
                                    <?php


                                    ?>
                                    <div class="visual">
                                        <canvas id="myChart2"></canvas>
                                        <?php
                                        $sqlv = "SELECT COUNT(uni_nam) AS count, uni_nam FROM cart JOIN retailer ON cart.rid = retailer.id JOIN `union` ON retailer.union = union.id WHERE `status` = 'complete' AND sr = $sid GROUP BY uni_nam ORDER BY count DESC LIMIT 5";
                                        $resultv = mysqli_query($con, $sqlv);
                                        if (mysqli_num_rows($resultv)) {
                                            $chart_data = array();
                                            $chart_labels = array();
                                            while ($rowv = mysqli_fetch_assoc($resultv)) {
                                                $sql1 = "SELECT COUNT(id) AS count FROM cart WHERE `status` = 'complete' AND sr = $sid ";
                                                $result1 = mysqli_query($con, $sql1);
                                                $row = mysqli_fetch_assoc($result1);
                                                $uni_name = $rowv['uni_nam'];
                                                $count =  $rowv['count'];
                                                $total_cart = $row['count'];
                                                $percent = $count * 100 / $total_cart;
                                                $chart_data[] =  number_format($percent, 1);
                                                $chart_labels[] = $uni_name;
                                            }
                                        }
                                        ?>

                                        <script>
                                            var xValues = <?php echo json_encode($chart_labels); ?>;
                                            var yValues = <?php echo json_encode($chart_data); ?>;
                                            var barColors = [
                                                "#b91d47",
                                                "#00aba9",
                                                "#2b5797",
                                                "#e8c3b9",
                                                "#1e7145",
                                                "blue",
                                                "yellow"
                                            ];

                                            var labels = xValues;
                                            var data = yValues;

                                            new Chart("myChart2", {
                                                type: "doughnut",
                                                data: {
                                                    labels: labels,
                                                    datasets: [{
                                                        backgroundColor: barColors,
                                                        data: data
                                                    }]
                                                },
                                                options: {
                                                    title: {
                                                        display: false,
                                                        text: "World Wide Wine Production 2018"
                                                    },
                                                    legend: {
                                                        display: false
                                                    }
                                                }
                                            });
                                        </script>
                                    </div>

                                    <div class="texts">
                                        <?php
                                        $sqlv = "SELECT COUNT(uni_nam) AS count, uni_nam FROM cart JOIN retailer ON cart.rid = retailer.id JOIN `union` ON retailer.union = union.id WHERE `status` = 'complete' AND sr = $sid GROUP BY uni_nam ORDER BY count DESC LIMIT 5";
                                        $resultv = mysqli_query($con, $sqlv);
                                        while ($rowv = mysqli_fetch_assoc($resultv)) {
                                            $sql = "SELECT COUNT(id) AS count FROM cart WHERE `status` = 'complete' AND sr = $sid ";
                                            $result = mysqli_query($con, $sql);
                                            $row = mysqli_fetch_assoc($result);
                                            $uni_name = $rowv['uni_nam'];
                                            $count =  $rowv['count'];
                                            $total_cart = $row['count'];
                                            $percent = $count * 100 / $total_cart;
                                        ?>
                                            <div class="text_box">
                                                <div class="union">
                                                    <i class="fa-solid fa-circle uni_dot"></i>
                                                    <?php echo $uni_name ?>
                                                </div>
                                                <div class="percent">
                                                    <span><?php echo number_format($percent, 1)  ?>%</span>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="growth">
                                    <?php
                                    $today = date('ymd', strtotime('-0 days'));
                                    $today1 = date('ymd', strtotime('-1 days'));
                                    $today7 = date('ymd', strtotime('-6 days'));
                                    $today30 = date('ymd', strtotime('-29 days'));
                                    // ------------------
                                    $sql1 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd <= $today AND ymd >= $today7  AND sr = $sid AND `status` = 'complete' ";
                                    $result1 = mysqli_query($con, $sql1);
                                    $row7 = mysqli_fetch_assoc($result1);
                                    // ----------------
                                    $sql2 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd = $today1 AND sr = $sid  AND `status` = 'complete'";
                                    $result2 = mysqli_query($con, $sql2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    // ----------------------
                                    $sql3 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd = $today AND  sr = $sid  AND `status` = 'complete'";
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
                    </div>
                </div>
            </div>
        </div>
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

<?php

// $sqlb = "SELECT COUNT(`union`) AS count , `union` FROM retailer GROUP BY `union` ORDER BY count DESC";
// $resultb = mysqli_query($con, $sqlb);
// while ($rowb = mysqli_fetch_assoc($resultb)) {
//     echo $rowb['count'] . " = " . $rowb['union']."<br>";
// }
// $sqlb = "SELECT `union` FROM retailer GROUP BY `union` ORDER BY `union` DESC";
// $resultb = mysqli_query($con,$sqlb);
// while($row = mysqli_fetch_assoc($resultb)){
//     echo $row['union']."<br>";
// }

?>