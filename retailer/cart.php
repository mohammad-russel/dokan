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
    <title>SR Homepage</title>
<style>
  
</style>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <h1>
            <a href="homepage.php">
                <img class="logoh" src="../logo/file.png" alt="">
            </a>
                </h1>
            </div>
            <nav>
                <ul>
                    <a href="homepage.php">Home</a>
                    <a href="contact.php">Contact</a>
                    <a href="shop.php">Shop</a>
                </ul>
            </nav>
            <div class="link">
                <a href="../php/retailer_logout.php">
                    <ion-icon name="log-out-outline"></ion-icon>
                </a>
                <a href="user.php">
                    <ion-icon name="person-outline"></ion-icon>
                </a>

            </div>
        </header>
        <div class="cart_room">
            <form action="../php/cart_status_update.php" method="post">
                <input type="hidden" name="status" id="status" value="order">
                <input type="submit"  name="order" value="order">
            </form>
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

</html>