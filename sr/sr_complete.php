<?php
session_start();
if (!isset($_SESSION["sid"])) {
    header("location:login.php");
}
$sr = $_SESSION["sid"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../components/head2.php"; ?>
    <title>SR Complete</title>
    <style>
        .dd {
            display: flex;
            flex-direction: column;
        }

        .name {
            font-size: 0.9rem;
            font-weight: 600;
            color: #3E5467;

        }

        .time {
            border-top: 1px dashed black;
            padding: 5px 0px;
            margin: 5px 0px;
        }

        .image {
            text-align: center;
        }

        .card {
            color: #3E5467;

        }

        .buttons {
            color: #3E5467;

        }

        /* ------------------------------------- */
        .cardinf {
            margin: auto;
            width: 50%;
            padding: 15px;
            border: 1px solid gray;
            border-radius: 10px;
            margin-top: 20px;
            color: gray;
        }

        /* .left {} */

        .item {
            margin: 10px 5px;
            font-weight: 700;
        }

        .ff {
            font-weight: 700;
            margin: 10px 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="back">
                <a href="sr_home.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>

        </div>
        <div class="complete">

            <div class="button_complete buttons" style="color: #3E5467;">Complete <?php echo $list ?></div>
            <div class="box_complete boxs">
                <input type="hidden" name="sr" id="sr" value="<?php echo $sr ?>">
                <div class="box">

                </div>

                <div class="cardinf">
                    <?php
                    include '../php/config.php';
                    $sql1 = "SELECT *, SUM(quantity*price) AS total FROM cart WHERE status = 'complete' AND sr = $sr ";
                    $result1 = mysqli_query($con, $sql1);
                    $row = mysqli_fetch_assoc($result1);

                    // ----------
                    $sql1 = "SELECT *, quantity*price AS total FROM cart WHERE status = 'complete' AND  sr = $sr  ";
                    $result1 = mysqli_query($con, $sql1);
                    $list4 = mysqli_num_rows($result1);
                    //   ---------
                    $sql1 = "SELECT DISTINCT discount FROM cart WHERE status = 'complete' AND  sr = $sr ";
                    $result1 = mysqli_query($con, $sql1);
                    $row2 = mysqli_fetch_assoc($result1);

                    ?>
                    <div class="left">
                        <div class="item">ITEM : <?php echo $list4 ?></div>
                        <div class="ff">FULL PRICE : ৳<?php echo $row['total'] ?></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
<script>
    $(document).ready(function() {
        var sr = $("#sr").val()
        var page = 0;

        function load() {
            $.ajax({
                url: "../php/sr_complete_load.php",
                type: "POST",
                data: {
                    sr: sr,
                    page: page
                },
                success: function(data) {
                    $(".more").remove();
                    $(".box").append(data);
                }
            })
        }
        load();
        $(document).on("click", ".loadmore", function() {
            page += 1;
            load();
        })
    })
</script>

</html>