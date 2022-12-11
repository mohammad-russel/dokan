<?php
session_start();
if (!isset($_SESSION["aid"])) {
    header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Manage order</title>
    <?php include "../components/head2.php"; ?>
</head>

<body>
    <div class="container acc">
        <div class="admin">
            <div class="toggle">
                <div class="show">
                    <ion-icon name="filter-outline"></ion-icon>
                </div>
                <div class="hide">
                    <ion-icon name="close-outline"></ion-icon>
                </div>
            </div>
            <div class="slider">
                <?php include "../components/slider.php"; ?>
            </div>
            <!-- --------------------------- -->
            <div class="cb cb_order">
                <span class="tity">
                    <h1>Customizer</h1>
                </span>
                <!-- <div class="box_other">
                    <?php
                    @include "../php/config.php";
                    $sql = "SELECT * FROM ads WHERE id = 1";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <div class="now">
                        <img src="../image/ads/<?php echo $row['adss'] ?>" alt="">
                    </div>
                    <div class="new">
                        <form action="../php/update_ads.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="pic" id="pic">
                            <input type="submit" value="update">
                        </form>
                    </div>
                </div> -->
                <?php
                @include "../php/config.php";
                $sql = "SELECT * FROM ads ";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                ?>
                <div class="now qwe">
                <?php echo $row['adss'] ?>
                </div>
                <form class="bl" action="../php/update_ads.php" method="post">
                    <input type="text" name="ads" class="ads" placeholder="Write..." id="ads">
                    <input type="submit" class="up" name="update" value="Update">
                </form>
            </div>
        </div>
</body>
<?php include "../components/script.php"; ?>
<script>
    $(document).ready(function() {

        $(".list_baki").hide();
        $(".list_complete").hide();
        $(".list_cart").hide();

        $(".box_order").click(function() {
            $(".list_baki").hide();
            $(".list_complete").hide();
            $(".list_cart").hide();
            $(".list_order").show();
        })
        $(".box_baki").click(function() {
            $(".list_order").hide();
            $(".list_complete").hide();
            $(".list_cart").hide();
            $(".list_baki").show();

        })
        $(".box_complete").click(function() {
            $(".list_baki").hide();
            $(".list_order").hide();
            $(".list_cart").hide();
            $(".list_complete").show();

        })
        $(".box_cart").click(function() {
            $(".list_baki").hide();
            $(".list_order").hide();
            $(".list_complete").hide();
            $(".list_cart").show();

        })
    })
</script>

</html>