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
                <a href="deller.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        </div>
        <?php
        include "../php/config.php";

        $did = $_GET['deller'];
        $sql = "SELECT * FROM deller WHERE id = $did";
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
                            <form action="../php/update_deller.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
                                <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $row['nam'] ?>">
                                <input type="number" name="number" id="number" placeholder="Number" value="<?php echo $row['num'] ?>">
                                <input type="text" name="company" id="company" placeholder="Company" value="<?php echo $row['company'] ?>">
                                <input type="submit" name="update" class="newretinsert" value="UPDATE">
                            </form>
                        </div>
                    </div>
                    <div class="image">
                        <img style="width:100px ;" src="../image/deller/<?php echo $row['deller_pic'] ?>" alt="">
                    </div>
                    <div class="delete">
                        <a href="../php/deller_delete.php?id=<?php echo $row['id'] ?>">
                            <ion-icon name="trash-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <div class="info">
                    <div class="left">

                        <div class="box">
                            <h3>SR</h3>
                            <?php
                        include "../php/config.php";
                        $sql = "SELECT * FROM sr WHERE deller = $did";
                        $result = mysqli_query($con, $sql);
                        $hm = mysqli_num_rows($result);
                        ?>
                        <p><?php echo $hm ?></p> 
                        </div>
                    </div>
                    <div class="middle">
                        <div class="name">Name : <?php echo $row['nam'] ?></div>
                        <div class="number">Number : <?php echo $row['num'] ?></div>
                        <div class="password">Password : <?php echo $row['pass'] ?></div>
                        <div class="company">Company : <?php echo $row['company'] ?></div>
                    </div>
                    <div class="right">
                     
                    </div>
                </div>
                <!-- -------------------------- -->
                <?php
                $dnum = $row['id'];
                $sql1 = "SELECT * FROM sr WHERE deller = $dnum";
                $query1 = mysqli_query($con, $sql1);
                if (mysqli_num_rows($query1)) {
                ?>
                    <div class="product">
                        <?php while ($row1 = mysqli_fetch_assoc($query1)) { ?>
                            <div class="card">
                                <div class="image">
                                    <a href="sr_overview.php?sr=<?php echo $row1['id'] ?>">
                                        <img src="../image/sr/<?php echo $row1['srpic'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="price"><?php echo $row1['nam'] ?></div>
                                <div class="name"><?php echo $row1['num'] ?></div>
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