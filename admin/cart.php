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
                <a href="admin_home.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        </div>

        <!-- ---------- -->
        <?php
        include "../php/config.php";
        $sql = "SELECT DISTINCT rid FROM cart WHERE status = 'cart'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result)) {
        ?>
            <div class="order_people">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $rid = $row['rid'];
                    $sql1 = "SELECT * FROM retailer WHERE id = $rid";
                    $result1 = mysqli_query($con, $sql1);
                    $row1 = mysqli_fetch_assoc($result1)
                ?>
                    <a href="cart_list.php?id=<?php echo $rid ?>">
                        <div class="card">
                            <div class="image">
                                <img src="../image/retailer/<?php echo $row1['retailerpic'] ?>" alt="">
                            </div>
                            <div class="name">Name : <?php echo $row1['nam'] ?></div>
                            <div class="shop">Shop : <?php echo $row1['shopname'] ?></div>
                        </div>
                    </a>

                <?php } ?>
            </div>
        <?php } ?>

     
    </div>

</body>

</html>