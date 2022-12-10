<?php
session_start();
if (!isset($_SESSION["did"])) {
    header("location:login.php");
}
$did = ($_SESSION["did"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../components/head2.php"; ?>
    <title>Deller SR</title>
</head>
<style>

</style>
<body>
    <div class="container">
        <div class="header">
            <div class="back">
                <a href="deller_home.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        </div>
        <?php
        include "../php/config.php";
        $sql = "SELECT * FROM sr WHERE deller = $did ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result)) {
        ?>
            <div class="deller_sr">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <a href="sr_overview.php?did=<?php echo $row['id'] ?>">
                        <div class="card " style="color: #3E5467;">
                            <div class="image">
                                <img src="../image/sr/<?php echo $row['srpic'] ?>" alt="">
                            </div>
                            <div class="name"><?php echo $row['nam'] ?></div>
                            <?php
                            $sid = $row['srnum'];
                            $sql1 = "SELECT * FROM product WHERE sr = '$sid' ";
                            $result1 = mysqli_query($con, $sql1);
                            $pro = mysqli_num_rows($result1);
                            ?>
                            <div class="productlist">Product  (<span><?php echo $pro ?></span>)</div>
                        </div>
                    </a>
                <?php } ?>
                
            </div>
        <?php } ?>
    </div>
</body>


</html>