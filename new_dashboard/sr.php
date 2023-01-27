<?php
session_start();
if (!isset($_SESSION["sid"])) {
    header("location:login.php");
}
$sid = $_SESSION["sid"];
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
                            $today = $row2['toto'];
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
                                    <div class="grow" style="color: #00ae6e;">
                                        12.4% <i class="fa-solid fa-arrow-trend-up"></i>
                                    </div>
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
                                <div class="number">৳<?php echo $today ?></div>
                                <div class="growth">
                                    <div class="grow" style="color: red;">
                                        12.4% <i class="fa-solid fa-arrow-trend-down"></i>
                                    </div>
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
                        <!-- <?php
                                @include "../php/config.php";
                                $sql = "SELECT * FROM cart ORDER BY id DESC";
                                $result = mysqli_query($con, $sql);
                                $cart = array();
                                while ($row = $result->fetch_assoc()) {
                                    $cart[$row['id']] = $row['price'];
                                }

                                $sql2 = "SELECT MAX(id) AS `top` FROM cart ";
                                $result2 = mysqli_query($con, $sql2);
                                $row2 = $result2->fetch_assoc();
                                $top = $row2['top'];
                                $last = $top - 6;
                                for ($i = $last; $i <= $top; $i++) {
                                    if (array_key_exists($i, $cart)) {

                                ?>
                                            <input type="text" name="id" id="id" value="<?php echo $i ?>">
                                            <br>
                                        <?php
                                    } else {

                                        ?>
                                            <input type="text" name="id" id="id" value="<?php echo $i ?>">
                                            <br>
                                    <?php
                                    }
                                }
                                // -------------------
                                    ?>
                                    <br>
                                    <?php
                                    for ($i = $last; $i <= $top; $i++) {
                                        if (array_key_exists($i, $cart)) {
                                            // echo "<h1> {$cart[$i]}</h1>";
                                    ?>
                                            <input type="text" name="tk" id="tk" value="<?php echo $cart[$i] ?>">
                                            <br>
                                        <?php
                                        } else {
                                            // echo "<h1> 0</h1>";
                                        ?>
                                            <input type="text" name="tk" id="tk" value="0">
                                            <br>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <input type="text" name="id" id="id" value="345"> -->

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
                            <canvas id="myChart" height="80px"></canvas>
                            <script>
                                var id = $("#id").val()

                                var xValues = [id, 2, 3, 4, 5, 6, 7];
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
                                <?php
                                $sql = "SELECT DISTINCT rid FROM cart ORDER BY rid DESC";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result)) {
                                ?>
                                
                                    <div class="statistics">
                                        <div class="visual">
                                            <canvas id="myChart2"></canvas>
                                            <script>
                                                
                                                var xValues = ["Italy", "France", "Spain", "USA", "Argentina", "sapahar", "2342"];
                                                var yValues = [23,432,34,343,234,234];
                                                var barColors = [
                                                    "#b91d47",
                                                    "#00aba9",
                                                    "#2b5797",
                                                    "#e8c3b9",
                                                    "#1e7145",
                                                    "blue",
                                                    "yellow"
                                                ];

                                                new Chart("myChart2", {
                                                    type: "doughnut",
                                                    data: {
                                                        labels: xValues,
                                                        datasets: [{
                                                            backgroundColor: barColors,
                                                            data: yValues
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
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $rid = $row['rid'];
                                                $sql1 = "SELECT `rid`, COUNT(rid) AS count FROM cart WHERE rid = $rid order by count ASC";
                                                $result1 = mysqli_query($con, $sql1);
                                                $row1 = mysqli_fetch_assoc($result1);
                                                $count = $row1['count'];

                                                $sql2 = "SELECT * FROM retailer WHERE id = $rid ";
                                                $result2 = mysqli_query($con, $sql2);
                                                $row2 = mysqli_fetch_assoc($result2);
                                                $unid = $row2['union'];

                                                $sql3 = "SELECT * FROM `union` WHERE id = $unid ";
                                                $result3 = mysqli_query($con, $sql3);
                                                $row3 = mysqli_fetch_assoc($result3);
                                                $union = $row3['uni_nam'];

                                                $sql4 = "SELECT COUNT(rid) AS total_count FROM cart ";
                                                $result4 = mysqli_query($con, $sql4);
                                                $row4 = mysqli_fetch_assoc($result4);
                                                // $union = $row4['uni_nam'];
                                                $total_count = $row4['total_count'];

                                                // echo $total_count;
                                                // echo "<br>";
                                                // echo $count;
                                                // echo "<br>";
                                                $percent = $count * 100 / $total_count;
                                                // echo number_format($percent, 1) 

                                            ?>
                                                <div class="text_box">
                                                    <div class="union">
                                                        <i class="fa-solid fa-circle"></i>
                                                        <?php echo $union ?>
                                                    </div>
                                                    <div class="percent">
                                                        <span><?php  echo number_format($percent, 1)  ?>%</span>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="growth ">
                                    <div class="grow" style="color: #00ae6e;text-align:right;font-size:12px">
                                        12.4% <i class="fa-solid fa-arrow-trend-up"></i>
                                    </div>
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