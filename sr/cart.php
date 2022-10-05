<?php
session_start();
if (!isset($_SESSION["sid"])) {
    header("location:login.php");
}
$sid = $_SESSION["sid"];
$rid = $_GET['rid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../components/head2.php"; ?>
    <title>SR Homepage</title>

</head>

<body>
    <input type="hidden" id="rid" value="<?php echo $rid ?>">
    <div class="container">
        <div class="header">
            <div class="back">
                <a href="retailer.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>

        </div>
        <div class="cart_room">
            <form action="../php/cart_status_update_sr.php" method="post">
                <input type="hidden" name="status" id="status" value="order">
                <input type="submit" name="order" value="order">
            </form>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        function load_cart() {
            var rid = $("#rid").val();
            $.ajax({
                url: "../php/cart_load_sr.php",
                type: "POST",
                data: {
                    rid: rid
                },
                success: function(data) {
                    $(".cart_room").html(data);
                }
            })
        }
        load_cart()



    })
</script>

</html>