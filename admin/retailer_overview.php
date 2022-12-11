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
    <title> Admin Retailer overview</title>
    <?php include "../components/head2.php"; ?>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="back">
                <a href="retailer.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        </div>
        <?php
        include "../php/config.php";

        $rid = $_GET['retailer'];
        $sql = "SELECT * FROM retailer WHERE id = $rid";
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
                            <form action="../php/update_retailer.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
                                <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $row['nam'] ?>">
                                <input type="text" name="shop" id="shop" placeholder="Shop Name" value="<?php echo $row['shopname'] ?>">
                                <input type="number" name="number" id="number" placeholder="Number" value="<?php echo $row['num'] ?>">
                                <input type="text" name="area" id="area" placeholder="area" value="<?php echo $row['area'] ?>">
                                <input type="submit" name="update" class="newretinsert" value="UPDATE">
                            </form>
                        </div>
                    </div>
                    <div class="image">
                        <img style="width:100px ;" src="../image/retailer/<?php echo $row['retailerpic'] ?>" alt="">
                    </div>
                    <div class="delete">
                        <a href="../php/delete_retailer.php?id=<?php echo $row['id'] ?>">
                            <ion-icon name="trash-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <div class="info">
                    <div class="left">
                        <div class="box">
                            <h3>Baki</h3>
                            <?php
                            include "../php/config.php";
                            $sr = $row['id'];
                            $sql5 = "SELECT * FROM cart WHERE rid = $rid AND status ='baki'";
                            $result5 = mysqli_query($con, $sql5);
                            $row5 = mysqli_num_rows($result5);
                            ?>
                            <p><?php echo $row5 ?></p>
                        </div>
                        <div class="box">
                            <h3>Opener</h3>
                            <?php
                            $sr = $row['openersr'];
                            $sql2 = "SELECT * FROM sr WHERE id = $sr";
                            $query2 = mysqli_query($con, $sql2);
                            $row2 = mysqli_fetch_assoc($query2);
                            if (mysqli_num_rows($query2)) {
                                $e = "<p>  {$row2['srnum']} </p>";
                                echo $e;
                            } else {
                                echo "<p class='sd'>SR deleted</p>";
                            }
                            ?>

                        </div>
                    </div>
                    <div class="middle">
                        <div class="name"><?php echo $row['nam'] ?></div>
                        <div class="shop"><?php echo $row['shopname'] ?></div>
                        <div class="number">Number : <?php echo $row['num'] ?></div>
                        <div class="password">Password : <?php echo $row['pass'] ?></div>
                        <?php
                         $village1 = $row['village'];
                         $sql3 = "SELECT * FROM delivery WHERE id = $village1";
                         $result3 = mysqli_query($con, $sql3);
                         $row3 = mysqli_fetch_assoc($result3);
                        ?>
                        <div class="zila">Upozila : <?php echo $row3['upozila'] ?></div>
                        <div class="zila">Union : <?php echo $row3['union'] ?></div>
                        <div class="village">Village : <?php echo $row3['village'] ?></div>
                        <div class="area">area : <?php echo $row['area'] ?></div>
                    </div>
                    <div class="right">
                        <div class="box">
                            <h3>Buy Product</h3>
                            <?php
                            include "../php/config.php";
                            $sr = $row['id'];
                            $sql5 = "SELECT * FROM cart WHERE rid = $rid AND status ='complete'";
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
                            $sql5 = "SELECT * FROM cart WHERE rid = $rid AND status ='order'";
                            $result5 = mysqli_query($con, $sql5);
                            $row5 = mysqli_num_rows($result5);
                            ?>
                            <p><?php echo $row5 ?></p>
                        </div>
                    </div>
                </div>
                <!-- -------------------------- -->

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