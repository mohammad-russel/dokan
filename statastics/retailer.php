<?php
session_start();
if (!isset($_SESSION["rid"])) {
    header("location:login.php");
}
$rid = $_SESSION["rid"];
date_default_timezone_set("Asia/dhaka");

?>
<?php


include "../php/config.php";
$data = $_POST['data'];
$week = "week";
$month = "month";
$year = "year";
if ($data == $week) {
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
<?php } elseif ($data == $month) { ?>
    <?php
    $sql = "SELECT `ymd`, SUM(price * quantity) as total_bill FROM cart WHERE `status` = 'complete' AND rid = $rid AND `ymd` >= DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY) GROUP BY ymd ORDER BY `ymd` DESC";
    $result = mysqli_query($con, $sql);

    // Create an array of dates for the last 7 days
    $dateRange = new DatePeriod(
        new DateTime("-30 days"),
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
                labels: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30],
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
<?php } elseif ($data == $year) { ?>
    <?php
    $sql = "SELECT `ymd`, SUM(price * quantity) as total_bill FROM cart WHERE `status` = 'complete' AND rid = $rid AND `ymd` >= DATE_SUB(CURRENT_DATE(), INTERVAL 365 DAY) GROUP BY ymd ORDER BY `ymd` DESC";
    $result = mysqli_query($con, $sql);

    // Create an array of dates for the last 7 days
    $dateRange = new DatePeriod(
        new DateTime("-365 days"),
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
                labels: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,
                    12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23,
                    24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35,
                    36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47,
                    48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59,
                    60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71,
                    72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83,
                    84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95,
                    96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110,
                    111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122,
                    123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134,
                    135, 136, 137, 138, 139, 140, 141, 142, 143, 144, 145, 146,
                    147, 148, 149, 150, 151, 152, 153, 154, 155, 156, 157, 158,
                    159, 160, 161, 162, 163, 164, 165, 166, 167, 168, 169, 170,
                    171, 172, 173, 174, 175, 176, 177, 178, 179, 180, 181, 182,
                    183, 184, 185, 186, 187, 188, 189, 190, 191, 192, 193, 194,
                    195, 196, 197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208, 209,
                    210, 211, 212, 213, 214, 215, 216, 217, 218, 219, 220, 221,
                    222, 223, 224, 225, 226, 227, 228, 229, 230, 231, 232, 233,
                    234, 235, 236, 237, 238, 239, 240, 241, 242, 243, 244, 245,
                    246, 247, 248, 249, 250, 251, 252, 253, 254, 255, 256, 257,
                    258, 259, 260, 261, 262, 263, 264, 265, 266, 267, 268, 269,
                    270, 271, 272, 273, 274, 275, 276, 277, 278, 279, 280, 281,
                    282, 283, 284, 285, 286, 287, 288, 289, 290, 291, 292, 293,
                    294, 295, 296, 297, 298, 299, 300, 301, 302, 303, 304, 305,
                    306, 307, 308, 309, 310, 311, 312, 313, 314,
                    315, 316, 317, 318, 319, 320, 321, 322, 323,
                    324, 325, 326, 327, 328, 329, 330, 331, 332,
                    333, 334, 335, 336, 337, 338, 339, 340, 341,
                    342, 343, 344, 345, 346, 347, 348, 349, 350,
                    351, 352, 353, 354, 355, 356, 357, 358, 359,
                    360, 361, 362, 363, 364, 365
                ],
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
<?php } ?>