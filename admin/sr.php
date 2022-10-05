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
        <!-- --------- -->
        <div class="head">
            <div class="searchbox">
                <input type="search" name="search" id="search">
                <input type="submit" class="search_submit" value="Search" id="submit">
            </div>
        </div>
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
                    <form action="../php/sr_registation.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="time" id="time" value="<?php echo $time ?> ">
                        <label for="rname">SR Pic</label>
                        <input type="file" name="rpic" id="rpic">
                        <input type="text" name="name" id="name" placeholder="Name" required>
                        <select name="deller" id="deller">
                            <?php
                            include "../php/config.php";
                            $sql2 = "SELECT * FROM Deller";
                            $result2 = mysqli_query($con, $sql2);
                            if (mysqli_num_rows($result2)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                                    <option value="<?php echo $row2['id'] ?>"><?php echo $row2['nam']."_".$row2['company'] ?></option>
                                <?php } }?>
                        </select>
             
                    <input type="number" name="number" id="number" placeholder="Number" required>
                    <input type="text" name="company" id="company" placeholder="Company" required>
                    <input type="text" name="password" id="password" placeholder="password" required>
                    <input type="submit" name="add" class="newretinsert" value="ADD">
                    </form>
                </div>
            </div>
            <?php
            include "../php/config.php";
            $sql = "SELECT * FROM sr";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <a href="sr_overview.php?sr=<?php echo $row['id'] ?>">
                        <div class="card">
                            <div class="image">
                                <img src="../image/sr/<?php echo $row['srpic'] ?>" alt="">
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