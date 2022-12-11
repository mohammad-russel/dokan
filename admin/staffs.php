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
    <title>Admin Staffs</title>
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

            <div class="cb cb_staffs">
                <span class="tity">
                    <h1>Staffs</h1>
                </span>
                <div class="staffs_house">
                    <div class="room deller">
                        <div class="title">Deller 5</div>
                        <div class="box">
                            <?php
                            include "../php/config.php";
                            $sql = "SELECT * FROM deller limit 3";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <div class="card">
                                        <a href="deller_overview.php?deller=<?php echo $row['id'] ?>">
                                            <div class="image">
                                                <img src="../image/deller/<?php echo $row['deller_pic'] ?>" alt="">
                                            </div>
                                            <div class="name"><?php echo $row['nam'] ?></div>
                                            <div class="company"><?php echo $row['company'] ?></div>
                                        </a>
                                    </div>
                            <?php }
                            } ?>
                            <div class="card more">
                                <a href="deller.php">More</a>

                            </div>
                        </div>
                    </div>
                    <div class="room sr">
                        <div class="title">SR 5</div>
                        <div class="box">
                        <?php
                            include "../php/config.php";
                            $sql = "SELECT * FROM sr limit 3";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="card">
                                <a href="sr_overview.php?sr=<?php echo $row['id'] ?>">
                                    <div class="image">
                                        <img src="../image/sr/<?php echo $row['srpic'] ?>" alt="">
                                    </div>
                                    <div class="name"><?php echo $row['nam'] ?></div>
                                    <div class="deller"><?php echo $row['deller'] ?></div>
                                    <div class="company"><?php echo $row['company'] ?></div>
                                </a>
                            </div>
                            <?php } } ?>
                            <div class="card more">
                                <a href="sr.php">More</a>

                            </div>
                        </div>
                    </div>
                    <div class="room retailer">
                        <div class="title">Retailer 5</div>
                        <div class="box">
                        <?php
                            include "../php/config.php";
                            $sql = "SELECT * FROM retailer limit 3";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="card">
                                <a href="retailer_overview.php?retailer=<?php echo $row['id'] ?>">
                                    <div class="image">
                                        <img src="../image/retailer/<?php echo $row['retailerpic'] ?>" alt="">
                                    </div>
                                    <div class="name"><?php echo $row['nam'] ?></div>
                                    <div class="shop"><?php echo $row['shopname'] ?></div>
                                </a>
                            </div>
                            <?php } } ?>
                            <div class="card more">
                                <a href="retailer.php">More </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</body>
<?php include "../components/script.php"; ?>


</html>