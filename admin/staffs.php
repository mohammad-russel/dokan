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
    <div class="container acc">
        <div class="admin">
            <div class="toggle">
                <div class="show">
                    <ion-icon name="layers-outline"></ion-icon>
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
                <span class="tity"><h1>Orders</h1></span>
                <div class="staffs_house">
                    <div class="room deller">
                        <div class="title">Deller 5</div>
                        <div class="box">
                            <div class="card">
                                <a href="deller_overview.php?deller=3">
                                    <div class="image">
                                        <img src="../image/deller/images (9).jpeg" alt="">
                                    </div>
                                    <div class="name">Rasel khan</div>
                                    <div class="company">bombai</div>
                                </a>
                            </div>
                            <div class="card more">
                            <a href="deller.php">More & Add</a>

                            </div>
                        </div>
                    </div>
                    <div class="room sr">
                        <div class="title">SR 5</div>
                        <div class="box">
                            <div class="card">
                                <a href="deller_overview.php?deller=3">
                                    <div class="image">
                                        <img src="../image/sr/images (6).jpeg" alt="">
                                    </div>
                                    <div class="name">Mohit khan</div>
                                    <div class="deller">robin ali</div>
                                    <div class="company">pran</div>
                                </a>
                            </div>
                            <div class="card more">
                            <a href="sr.php">More & Add</a>

                            </div>
                        </div>
                    </div>
                    <div class="room retailer">
                        <div class="title">Retailer 5</div>
                        <div class="box">
                            <div class="card">
                                <a href="deller_overview.php?deller=3">
                                    <div class="image">
                                        <img src="../image/retailer/IMG20210306170213.jpg" alt="">
                                    </div>
                                    <div class="name">suhana khan</div>
                                    <div class="shop">Bhai Bhai Store</div>
                                </a>
                            </div>
                            <div class="card more">
                                <a href="retailer.php">More & Add</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
</body>
<?php include "../components/script.php"; ?>


</html>