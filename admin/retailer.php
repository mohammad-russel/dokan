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
            <?php
            include "../php/config.php";
            $sql = "SELECT * FROM retailer";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <a href="retailer_overview.php?retailer=<?php echo $row['id'] ?>">
                        <div class="card">
                            <div class="image">
                                <img src="../image/retailer/<?php echo $row['retailerpic'] ?>" alt="">
                            </div>
                            <div class="name"><?php echo $row['nam'] ?></div>
                            <div class="shop number"><?php echo $row['num'] ?></div>
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