<?php
session_start();
if (!isset($_SESSION["did"])) {
    header("location:../login/deller.php");
}
$did = $_SESSION["did"];
// date_default_timezone_set("Asia/dhaka");

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
        $sql = "SELECT * FROM deller WHERE id = $did";
        $result = mysqli_query($con, $sql);
        $row = $result->fetch_assoc();
        $delnum = $row['delnum'];
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
                            <img src="../image/deller/<?php echo $row['deller_pic'] ?>" alt="">
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
                            <img src="../image/deller/<?php echo $row['deller_pic'] ?>" alt="">
                        </div>
                        <div class="name"><?php echo $row['nam'] ?></div>
                        <div class="number"><?php echo $row['num'] ?></div>
                    </div>
                    <div class="link_box">
                        <a href="deller.php" class="a1">
                            <div class="box">
                                <div class="icon">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                </div>
                                <span>Dashboard</span>
                            </div>
                        </a>
                        <a href="../deller/sr.php">
                            <div class="box">
                                <div class="icon">
                                    <i class="fa-solid fa-user-group"></i>
                                </div>
                                <span>SR</span>
                            </div>
                        </a>
                        <a href="deller.php">
                            <div class="box">
                                <div class="icon">
                                    <i class="fa-solid fa-map-location-dot"></i>
                                </div>
                                <span>Sell by union</span>
                            </div>
                        </a>
                        <a href="deller.php">
                            <div class="box">
                                <div class="icon">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </div>
                                <span>Product</span>
                            </div>
                        </a>
                        <a href="deller.php" class="a5">
                            <div class="box">
                                <div class="icon">
                                    <i class="fa-solid fa-cubes-stacked"></i>
                                </div>
                                <span>Stock</span>
                            </div>
                        </a>
                        <a href="deller.php" class="a6">
                            <div class="box">
                                <div class="icon">
                                    <i class="fa-solid fa-arrow-trend-up"></i>
                                </div>
                                <span>Sell</span>
                            </div>
                        </a>
                    </div>
                    <div class="foot">
                        <a href="../php/deller_logout.php">
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
                            date_default_timezone_set("Asia/dhaka");
                            $sql1 = "SELECT SUM(price*quantity) as total FROM `cart` WHERE deller = $did AND `status`= 'complete'";
                            $result1 = mysqli_query($con, $sql1);
                            $row1 = mysqli_fetch_assoc($result1);
                            $total = $row1['total'];
                            // ----------------
                            $todate = date("ymd");
                            // echo $todate;
                            $sql2 = "SELECT SUM(price*quantity) as toto FROM `cart` WHERE deller = $did AND `ymd` = $todate AND `status`= 'complete' ";
                            $result2 = mysqli_query($con, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                            $tday = $row2['toto'];
                            // ----------------

                            $sql3 = "SELECT COUNT(id) as count FROM `cart` WHERE deller = $did AND `status`= 'order'";
                            $result3 = mysqli_query($con, $sql3);
                            $row3 = mysqli_fetch_assoc($result3);
                            $pending = $row3['count'];
                            // ----------------

                            $sql4 = "SELECT COUNT(id) AS pcount FROM `product` WHERE deller = '$delnum' ";
                            $result4 = mysqli_query($con, $sql4);
                            $row4 = mysqli_fetch_assoc($result4);
                            $product = $row4['pcount'];

                            ?>
                            <div class="short">
                                <div class="text" <span>মোট ক্রয়</span>
                                    <?php
                                    $today = date('ymd', strtotime('-0 days'));
                                    $today7 = date('ymd', strtotime('-6 days'));
                                    $today30 = date('ymd', strtotime('-29 days'));
                                    $today365 = date('ymd', strtotime('-364 days'));
                                    $unlimited = date('ymd', strtotime('-998 days'));
                                    ?>
                                    <select name="mot" id="mot">
                                        <option value="<?php echo $unlimited ?>"></option>
                                        <option value="<?php echo $today7 ?>">Week</option>
                                        <option value="<?php echo $today30 ?>">Month</option>
                                        <option value="<?php echo $today365 ?>">Year</option>
                                    </select>
                                </div>
                                <div class="number">
                                    <div class="num2">
                                        <?php
                                        $sql1 = "SELECT *, SUM(price*quantity) as total FROM `cart` WHERE `status` = 'complete' AND deller = $did ";
                                        $result1 = mysqli_query($con, $sql1);
                                        if (mysqli_num_rows($result1) > 0) {
                                            $row1 = mysqli_fetch_assoc($result1);
                                        ?>
                                            <span>৳<?php echo $row1['total'] ?></span>
                                        <?php } else { ?>
                                            <span>৳ 0</span>
                                        <?php } ?>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            $("#mot").change(function() {
                                                var mot = $(this).val();
                                                var did = <?php echo $did ?>;
                                                var today = <?php echo $today ?>;
                                                $.ajax({
                                                    url: "../sell/total_sell.php",
                                                    type: "POST",
                                                    data: {
                                                        mot: mot,
                                                        did: did,
                                                        today: today
                                                    },
                                                    success: function(data) {
                                                        $(".num2").html(data);
                                                    }
                                                })
                                            })
                                        })
                                    </script>

                                </div>
                                <div class="growth">
                                    <?php
                                    $today = date('ymd', strtotime('-0 days'));
                                    $today1 = date('ymd', strtotime('-1 days'));
                                    $today7 = date('ymd', strtotime('-6 days'));
                                    $today30 = date('ymd', strtotime('-29 days'));
                                    // ------------------
                                    $sql1 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd <= $today AND ymd >= $today7  AND deller = $did AND `status` = 'complete' ";
                                    $result1 = mysqli_query($con, $sql1);
                                    $row7 = mysqli_fetch_assoc($result1);
                                    // ----------------
                                    $sql2 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd = $today1 AND  deller = $did AND `status` = 'complete'";
                                    $result2 = mysqli_query($con, $sql2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    // ----------------------
                                    $sql3 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd = $today AND  deller = $did AND `status` = 'complete'";
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
                                    <span>আজকে</span>
                                    <?php
                                    date_default_timezone_set("Asia/dhaka");
                                    $day0 = date('ymd', strtotime('-0 days'));
                                    $day1 = date('ymd', strtotime('-1 days'));
                                    $day2 = date('ymd', strtotime('-2 days'));
                                    $day3 = date('ymd', strtotime('-3 days'));
                                    $day4 = date('ymd', strtotime('-4 days'));
                                    $day5 = date('ymd', strtotime('-5 days'));
                                    $day6 = date('ymd', strtotime('-6 days'));
                                    ?>
                                    <select name="mot1" id="mot1">
                                        <option value="<?php echo $day0 ?>"></option>
                                        <option value="<?php echo $day1 ?>">গতকাল</option>
                                        <option value="<?php echo $day2 ?>">পরশু</option>
                                        <option value="<?php echo $day3 ?>">৪র্থ দিন</option>
                                        <option value="<?php echo $day4 ?>">৫ম দিন</option>
                                        <option value="<?php echo $day5 ?>">৬ঠ দিন</option>
                                        <option value="<?php echo $day6 ?>">৭ম দিন</option>
                                    </select>
                                </div>
                                <div class=" number">
                                    <div class="num1">
                                        <?php
                                        $sql11 = "SELECT *, SUM(price*quantity) as total FROM `cart` WHERE ymd = $day0 AND `status` = 'complete' AND deller = $did ";
                                        $result11 = mysqli_query($con, $sql11);
                                        if (mysqli_num_rows($result11) > 0) {
                                            $row11 = mysqli_fetch_assoc($result11);
                                        ?>
                                            <span>৳<?php echo $row11['total'] ?></span>
                                        <?php } else { ?>
                                            <span>৳ 0</span>
                                        <?php } ?>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            $("#mot1").change(function() {
                                                var mot = $(this).val();
                                                var did = <?php echo $did ?>;
                                                $.ajax({
                                                    url: "../sell/sell.php",
                                                    type: "POST",
                                                    data: {
                                                        mot: mot,
                                                        did: did
                                                    },
                                                    success: function(data) {
                                                        $(".num1").html(data);
                                                    }
                                                })
                                            })
                                        })
                                    </script>

                                </div>
                                <div class="growth">
                                    <?php
                                    $today = date('ymd', strtotime('-0 days'));
                                    $today1 = date('ymd', strtotime('-1 days'));
                                    $today7 = date('ymd', strtotime('-6 days'));
                                    $today30 = date('ymd', strtotime('-29 days'));
                                    // ------------------
                                    $sql1 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd <= $today AND ymd >= $today7  AND deller = $did AND `status` = 'complete' ";
                                    $result1 = mysqli_query($con, $sql1);
                                    $row7 = mysqli_fetch_assoc($result1);
                                    // ----------------
                                    $sql2 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd = $today1 AND  deller = $did AND `status` = 'complete'";
                                    $result2 = mysqli_query($con, $sql2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    // ----------------------
                                    $sql3 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd = $today AND  deller = $did AND `status` = 'complete'";
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
                            <div class="stack_room">
                                <?php
                                include "../php/config.php";
                                $sql = "SELECT `ymd`, SUM(price * quantity) as total_bill FROM cart WHERE `status` = 'complete' AND deller = $did AND `ymd` >= DATE_SUB(CURRENT_DATE(), INTERVAL 7 DAY) GROUP BY ymd ORDER BY `ymd` DESC";
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
                        <div class="sr_uni">
                            <div class="sr">
                                <div class="sr_head">SR ধারা সবচেয়ে বেশি বিক্রি</div>
                                <?php
                                $sql = "SELECT *, COUNT(sr) AS srcount FROM cart WHERE deller = $did GROUP BY sr ORDER BY srcount ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $sr =  $row['sr'];
                                    $sql1 = "SELECT * FROM sr WHERE id = $sr";
                                    $result1 = mysqli_query($con, $sql1);
                                    $row1 = mysqli_fetch_assoc($result1);

                                    $sql2 = "SELECT COUNT(sr) AS fullcount FROM cart WHERE deller = $did";
                                    $result2 = mysqli_query($con, $sql2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    $fc = $row2['fullcount'];
                                    $sc = $row['srcount'];
                                    $percentc = $sc * 100 / $fc;
                                    $ppp =  number_format($percentc, 1);
                                    // echo $ppp;
                                ?>
                                    <div class="sr_box">
                                        <div class="image">
                                            <img src="../image/sr/<?php echo $row1['srpic']; ?>" alt="">
                                        </div>
                                        <div class="progress_bar">
                                            <div class="fill" style="width:<?php echo $ppp ?>%"></div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                            <div class="union">
                                <div class="union_head">ইউনিয়ন দ্বারা ট্রাফিক</div>

                                <div class="statistics">

                                    <div class="visual">
                                        <canvas id="myChart2"></canvas>
                                        <?php
                                        $sqlv = "SELECT COUNT(uni_nam) AS count, uni_nam FROM cart JOIN retailer ON cart.rid = retailer.id JOIN `union` ON retailer.union = union.id WHERE `status` = 'complete' AND deller = $did  GROUP BY uni_nam ORDER BY count DESC LIMIT 5";
                                        $resultv = mysqli_query($con, $sqlv);
                                        if (mysqli_num_rows($resultv)) {
                                            $chart_data = array();
                                            $chart_labels = array();
                                            while ($rowv = mysqli_fetch_assoc($resultv)) {
                                                $sql1 = "SELECT COUNT(id) AS count FROM cart WHERE `status` = 'complete' AND deller = $did";
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
                                                "rgba(0, 122, 255, 0.53)",
                                                "rgba(41, 204, 57, 0.46)",
                                                "rgba(80, 81, 133, 0.67);",
                                                "#rgba(0, 0, 0, 0.26);",
                                                "#FF7979",

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
                                        $sqlv = "SELECT COUNT(uni_nam) AS count, uni_nam FROM cart JOIN retailer ON cart.rid = retailer.id JOIN `union` ON retailer.union = union.id WHERE `status` = 'complete' AND deller = $did GROUP BY uni_nam ORDER BY count DESC LIMIT 5";
                                        $resultv = mysqli_query($con, $sqlv);
                                        while ($rowv = mysqli_fetch_assoc($resultv)) {
                                            $sql = "SELECT COUNT(id) AS count FROM cart WHERE `status` = 'complete' AND deller = $did";
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
                                    $sql1 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd <= $today AND ymd >= $today7  AND deller = $did AND `status` = 'complete' ";
                                    $result1 = mysqli_query($con, $sql1);
                                    $row7 = mysqli_fetch_assoc($result1);
                                    // ----------------
                                    $sql2 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd = $today1 AND  deller = $did AND `status` = 'complete'";
                                    $result2 = mysqli_query($con, $sql2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    // ----------------------
                                    $sql3 = "SELECT *, SUM(price*quantity) AS aa FROM cart WHERE ymd = $today AND  deller = $did AND `status` = 'complete'";
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

        // ============================
        $("#based").change(function() {
            var data = $("#based").val();
            $.ajax({
                url: "../statastics/deller.php",
                type: "POST",
                data: {
                    data: data,
                },
                success: function(data) {
                    $(".stack_room").html(data);
                }
            })
        })
    })
</script>

</html>