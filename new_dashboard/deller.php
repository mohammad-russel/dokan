<!-- <?php
        // session_start();
        // if (!isset($_SESSION["did"])) {
        //     header("location:login.php");
        // }
        // $did = $_SESSION["did"];
        ?> -->
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
        <div class="box">
            <div class="header">
                <div class="div1">
                    <div class="toggle_btn">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <div class="name">রহিম উদ্দিন</div>
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
                            <img src="../image/deller/25594175_155613491729371_7114853792124516200_n.jpg" alt="">
                            <span>My Profile</span>
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
                            <img src="../image/retailer/vegeta-2020_3840x2160_xtrafondos.com.jpg" alt="">
                        </div>
                        <div class="name">হামিদ মিয়া</div>
                        <div class="number">0124527643</div>
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
                        <div class="short_box">
                            <div class="short">
                                <div class="text">মোট বিক্রি</div>
                                <div class="number">৳24233</div>
                            </div>
                            <div class="short">
                                <div class="text">আজকের বিক্রি </div>
                                <div class="number">৳24233</div>
                            </div>
                            <div class="short">
                                <div class="text">অর্ডার পেন্ডিং</div>
                                <div class="number">5টি</div>
                            </div>
                            <div class="short">
                                <div class="text">প্রোডাক্ট সংখ্যা</div>
                                <div class="number">3</div>
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
                        </div>
                        <div class="sr_uni">
                            <div class="sr">
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

                            </div>
                            <div class="union">
                                <div class="head">ইউনিয়ন দ্বারা ট্রাফিক</div>
                                <div class="statistics">
                                    <div class="visual">
                                        <canvas id="myChart2"></canvas>
                                    </div>
                                    <div class="texts">
                                        <div class="box">
                                            <div class="union">
                                                <i class="fa-solid fa-circle"></i>ইউসুফপুর
                                            </div>
                                            <div class="percent">
                                                <span>23.4%</span>
                                            </div>
                                        </div>
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
                x: {
                    beginAtZero: true,
                    grid: {
                        display: false
                    }
                }
            },
            legend: {
                display: false
            }
        }
    });
</script>
<script>
    var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
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
                display: true,
                text: "World Wide Wine Production 2018"
            },
            legend: {
                display: false
            }
        }
    });
</script>

</html>