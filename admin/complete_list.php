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
    <title>Admin</title>
    <?php include "../components/head2.php"; ?>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="back">
                <a href="complete.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        </div>
        <!-- ------------------- -->
        <?php
        include "../php/config.php";
        $id = $_GET['id'];
        $sql = "SELECT *,total-discount AS tata FROM `order` WHERE status = 'complete' AND retailer = $id ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result)) {
        ?>
            <div class="o_l">
                <?php while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="card">
                        <div class="box">
                            <div class="item">Item : <?php echo $row['item'] ?></div>
                            <div class="total">Total : <?php echo $row['total'] ?></div>
                            <div class="discount">Discount : <?php echo $row['discount'] ?></div>
                            <div class="subtotal">Subtotal : <?php echo $row['tata'] ?></div>
                            <div class="time"> Time : <?php echo $row['time'] ?></div>
                        </div>
                        <div class="product"><?php echo $row['products'] ?></div>
                        <div class="signature">
                            <img width="100px" height="50px" src="../image/signature/<?php echo $row['signature'] ?>" alt="">
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <!-- <span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span>
        <br>
        <span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span>
        <br>
        <span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span>
        <br>
        <span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span>
        <br>
        <span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span>
        <br> -->
    </div>
    </div>

</body>
<script>
    $(document).ready(function() {
        $(".signature").click(function() {
            $(this).css({
                "position": "absolute",
                "width": "100%",
                "height": "100%",
                "right": "0",
                "top": "0",
                "background": "rgb(255, 255, 255)"
            })
        })
        $(".signature").click(function() {
            if ($(this).css({
                    "position": "absolute",
                    "width": "100%",
                    "height": "100%",
                    "right": "0",
                    "top": "0",
                    "background": "rgb(255, 255, 255)"
                })) {
                $(this).css({
                    "position": "relative",
                    "width": "30%",
                    "height": "max-content",
                    "right": "0",
                    "top": "0",
                    "background": "rgb(255, 255, 255)"
                })
            }

        })
    })
</script>

</html>