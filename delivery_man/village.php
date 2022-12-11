<?php
session_start();
if (!isset($_SESSION["delid"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery man Village</title>
    <?php include "../components/head2.php"; ?>
</head>

<body>
    <div class="container">
    <div class="header">
            <div class="back">
                <a href="d_home.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        </div>

        <!-- __________________ -->

        <div class="delivery_days">
            <?php
            include '../php/config.php';
            $day =$_GET['day'];
            $sql = "SELECT * FROM delivery WHERE day = '$day'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <a href="retailer.php?village=<?php echo $row['id'] ?>" class="day"><?php echo $row['village'] ?></a>
            <?php
                }
            }
            ?>
        </div>
    </div>

</body>

</html>