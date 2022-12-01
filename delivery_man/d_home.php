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
    <title>Delivary man Homepage</title>
    <?php include "../components/head2.php"; ?>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="back">
                <a href="../index.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
            <div class="back">
                <a href="../php/dm_logout.php">
                    <ion-icon name="log-out-outline"></ion-icon>
                </a>
            </div>
        </div>

        <!-- __________________ -->

        <div class="delivery_days">
            <?php
            include '../php/config.php';
            $sql = "SELECT DISTINCT day FROM delivery";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <a href="village.php?day=<?php echo $row['day'] ?>" class="day"><?php echo $row['day'] ?></a>
            <?php
                }
            }
            ?>
        </div>
    </div>

</body>

</html>