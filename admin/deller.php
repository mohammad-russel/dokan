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
    <title>Admin Deller</title>
    <?php include "../components/head2.php"; ?>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="back">
                <a href="staffs.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        </div>
        <!-- --------- -->
        <!-- <div class="head">
            <div class="searchbox">
                <input type="search" name="search" id="search">
                <input type="submit" class="search_submit" value="Search" id="submit">
            </div>
        </div> -->
        <div class="adminsrbox">
            <div class="create_ac">
                <div class="newsr">+</div>
                <div class="popup">
                    <div class="close">
                        <ion-icon name="close-outline"></ion-icon>
                    </div>
                    <?php
                    date_default_timezone_set('Asia/Dhaka');
                    $time = date("Y/m/d || h/i/s");
                    ?>
                    <form action="../php/deller_registation.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="time" id="time" value="<?php echo $time ?> ">
                        <label for="rname">Deller Pic</label>
                        <input type="file" name="dpic" id="dpic">
                        <input type="text" name="name" id="name" placeholder="Name" required>
                        <input type="number" name="number" id="number" placeholder="Number" required>
                        <input type="text" name="company" id="company" placeholder="Company" required>
                        <input type="text" name="password" id="password" placeholder="password" required>
                        <input type="submit" name="add" class="newretinsert" value="ADD">
                    </form>
                </div>
            </div>
            <?php
            include "../php/config.php";
            $sql = "SELECT * FROM deller";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <a href="deller_overview.php?deller=<?php echo $row['id'] ?>">
                        <div class="card">
                            <div class="image">
                                <img src="../image/deller/<?php echo $row['deller_pic'] ?>" alt="">
                            </div>
                            <div class="name"><?php echo $row['nam'] ?></div>
                            <div class="shop company"><?php echo $row['company'] ?></div>
                        </div>
                    </a>
            <?php }
            } ?>
        </div>
    </div>

</body>
<script>
    $(document).ready(function() {
        function load() {
            $(".popup").hide();
        }
        load()
        $(".newsr").click(function() {
            $(".popup").fadeIn();
        })
        $(".close").click(function() {
            $(".popup").fadeOut();
        })
    })
</script>

</html>