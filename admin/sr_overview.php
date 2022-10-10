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
                <a href="sr.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        </div>
        <?php
        include "../php/config.php";

        $srid = $_GET['sr'];
        $sql = "SELECT * FROM sr WHERE id = $srid";
        $query = mysqli_query($con, $sql);
        if (mysqli_num_rows($query)) {
            $row = mysqli_fetch_assoc($query);
        ?>
            <div class="sr_overview">
                <div class="head">
                    <div class="edit">
                        <ion-icon class="editsr" name="create-outline"></ion-icon>
                        <div class="popup">
                            <div class="close">
                                <ion-icon name="close-outline"></ion-icon>
                            </div>
                            <form action="../php/update_sr.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
                                <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $row['nam'] ?>">
                                <input type="text" name="deller" id="deller" placeholder="Deller Name" value="<?php echo $row['deller'] ?>">
                                <input type="number" name="number" id="number" placeholder="Number" value="<?php echo $row['num'] ?>">
                                <input type="text" name="company" id="company" placeholder="Company" value="<?php echo $row['company'] ?>">
                                <input type="submit" name="update" class="newretinsert" value="UPDATE">
                            </form>
                        </div>
                    </div>
                    <div class="image">
                        <img style="width:100px ;" src="../image/sr/<?php echo $row['srpic'] ?>" alt="">
                    </div>
                    <div class="delete">
                        <a href="../php/delete_sr.php?id=<?php echo $row['id'] ?>">
                            <ion-icon name="trash-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <div class="info">
                    <div class="left">
                        <div class="box">
                            <h3>Product</h3>
                            <?php
                            include "../php/config.php";
                            $s = $row['srnum'];
                            $sql5 = "SELECT * FROM product WHERE sr = '$s'";
                            $result5 = mysqli_query($con, $sql5);
                            $row5 = mysqli_num_rows($result5);
                            ?>
                            <p><?php echo $row5 ?></p>
                        </div>
                        <div class="box">
                            <h3>RT Open</h3>
                            <?php
                            include "../php/config.php";
                            $sr = $row['id'];
                            $sql5 = "SELECT * FROM retailer WHERE openersr = $sr";
                            $result5 = mysqli_query($con, $sql5);
                            $row5 = mysqli_num_rows($result5);
                            ?>
                            <p><?php echo $row5 ?></p>
                        </div>
                    </div>
                    <div class="middle">
                        <div class="name">Name : <?php echo $row['nam'] ?></div>
                        <div class="number">Number : <?php echo $row['num'] ?></div>
                        <div class="password">Password : <?php echo $row['pass'] ?></div>
                        <div class="company">Company : <?php echo $row['company'] ?></div>
                        <div class="deller">Deller : <?php echo $row['deller'] ?></div>
                    </div>
                    <div class="right">
                        <div class="box">
                            <h3>Sell</h3>
                            <?php
                            include "../php/config.php";
                            $sr = $row['id'];
                            $sql5 = "SELECT * FROM cart WHERE sr = $sr AND status ='complete'";
                            $result5 = mysqli_query($con, $sql5);
                            $row5 = mysqli_num_rows($result5);
                            ?>
                            <p><?php echo $row5 ?></p>
                        </div>
                        <div class="box">
                            <h3>Order</h3>
                            <?php
                            include "../php/config.php";
                            $sr = $row['id'];
                            $sql5 = "SELECT * FROM cart WHERE sr = $sr AND status ='order'";
                            $result5 = mysqli_query($con, $sql5);
                            $row5 = mysqli_num_rows($result5);
                            ?>
                            <p><?php echo $row5 ?></p>
                        </div>
                    </div>
                </div>
                <!-- -------------------------- -->
                <?php
                $srnum = $row['srnum'];
                $sql1 = "SELECT * FROM product WHERE sr = '$srnum'";
                $query1 = mysqli_query($con, $sql1);
                if (mysqli_num_rows($query1)) {
                ?>
                    <div class="product">
                        <?php while ($row1 = mysqli_fetch_assoc($query1)) { ?>
                            <div class="card">
                                <div class="image">
                                    <img src="../image/product/<?php echo $row1['pic'] ?>" alt="">
                                </div>
                                <div class="price">৳ <?php echo $row1['price'] ?></div>
                                <div class="name"><?php echo $row1['nam'] ?></div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <!-- -------------------------- -->
            </div>
        <?php } ?>
    </div>

</body>
<script>
    $(document).ready(function() {
        function load() {
            $(".popup").hide();
        }
        load()
        $(".editsr").click(function() {
            $(".popup").fadeIn();
        })
        $(".close").click(function() {
            $(".popup").fadeOut();
        })
    })
</script>

</html>