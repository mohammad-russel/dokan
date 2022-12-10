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
    <?php include "../components/head2.php"; ?>
    <title>Retailer Cart</title>
    <style>

    </style>
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
                <div class="cart_room">
                    <form action="../php/cart_status_update.php" method="post">
                        <input type="hidden" name="status" id="status" value="order">
                        <input type="submit" name="order" value="order">
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
<script>
    $(document).ready(function() {
        function load_cart() {
            $.ajax({
                url: "../php/cart_load.php",
                type: "POST",
                success: function(data) {
                    $(".cart_room").html(data);
                }
            })
        }
        load_cart()



    })
</script>
<?php include "../components/script.php"; ?>

</html>