<?php
session_start();
if (!isset($_SESSION["rid"])) {
    header("location:login.php");
}
$rid = $_SESSION["rid"];
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../components/head2.php"; ?>
    <title>Retailer Homepage</title>
</head>

<body>
    <div class="container">
        <div class="admin rt">
            <div class="togglee">
                <div class="show">
                    <ion-icon name="filter-outline"></ion-icon>
                </div>
                <div class="hide">
                    <ion-icon name="close-outline"></ion-icon>
                </div>
            </div>
            <div class="slider">
                <?php include "../components/slider1.php"; ?>
            </div>
            <div class="box">
                <div class="retailer-header">
                    <div class="space"></div>
                    <div class="search">
                        <ion-icon name="search-outline"></ion-icon>
                        <input type="search" name="search" id="search" placeholder="Search product">
                    </div>
                    <div class="cart">
                        <a href="cart.php">
                            <span class="count"></span>
                            <ion-icon name="cart-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <div class="ads notice">
                    <!-- <?php
                            @include "../php/config.php";
                            $sql = "SELECT * FROM ads WHERE id = 1";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_assoc($result);
                            ?>
                    <img src="../image/ads/<?php echo $row['adss'] ?>" alt=""> -->
                    <div class="lt"></div>
                    <div class="mid">
                        <h1>Happy Friday</h1>
                    </div>
                    <div class="rt"></div>
                </div>
                <div class="retailermain">

                </div>
            </div>
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
            page += 20;
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


    })
</script>
<?php include "../components/script.php"; ?>

</html>