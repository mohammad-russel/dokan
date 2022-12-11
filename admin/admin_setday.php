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
    <title>Admin Set Days</title>
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
            <div class="cb cb_setday">

                <span class="tity">
                    <h1>Set Days</h1>
                </span>

                <div class="daybox">
                    <?php
                    if (isset($_SESSION['day'])) {
                        echo $_SESSION['day'];
                        unset($_SESSION['day']);
                    }
                    ?>
                    <form action="../php/day.php" method="post">
                        <select name="upozila" id="upozila" required>
                            <option value="">উপজেলা</option>
                            <option value="চারঘাট উপজেলা">চারঘাট উপজেলা</option>
                            <option value="পুঠিয়া উপজেলা">পুঠিয়া উপজেলা</option>
                            <option value="বাঘা উপজেলা">বাঘা উপজেলা</option>
                        </select>
                        <select name="union" id="union" required>
                            <option value="">ইউনিয়ন</option>
                            <option value="ইউসুফপুর">ইউসুফপুর</option>
                            <option value="শলুয়া">শলুয়া</option>
                            <option value="সরদহ">সরদহ</option>
                            <option value="নিমপাড়া">নিমপাড়া</option>
                            <option value="চারঘাট">চারঘাট</option>
                            <option value="ভায়ালক্ষীপুর">ভায়ালক্ষীপুর</option>
                            <option value="ভায়ালক্ষীপুর">বাজুবাঘা </option>
                            <option value="ভায়ালক্ষীপুর">গড়গড়ি </option>
                            <option value="ভায়ালক্ষীপুর">পাকুড়িয়া </option>
                            <option value="ভায়ালক্ষীপুর">মনিগ্রাম </option>
                            <option value="ভায়ালক্ষীপুর">বাউসা </option>
                            <option value="ভায়ালক্ষীপুর">চকরাজাপুর </option>
                            <option value="ভায়ালক্ষীপুর">আড়ানী </option>
                        </select>
                        <input type="text" name="village" id="village" placeholder="গ্রামের নাম" required>
                        <select name="day" id="day" required>
                            <option value="শুক্রবার">শুক্রবার</option>
                            <option value="শনিবার">শনিবার</option>
                            <option value="রবিবার">রবিবার</option>
                            <option value="সোমবার">সোমবার</option>
                            <option value="মঙ্গলবার">মঙ্গলবার</option>
                            <option value="বুধবার">বুধবার</option>
                            <option value="বৃহস্পতিবার">বৃহস্পতিবার</option>
                        </select>
                        <input type="submit" name="add" class="add" value="ADD">
                    </form>
                    <?php
                    include "../php/config.php";
                    $sql1 = "SELECT * FROM delivery ORDER BY `union` DESC";
                    $result1 = mysqli_query($con, $sql1);
                    if (mysqli_num_rows($result1)) {
                    ?>
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Upozila</th>
                                <th>Union</th>
                                <th>Village</th>
                                <th>Day</th>
                                <th>DELETE</th>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($result1)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['upozila'] ?></td>
                                    <td><?php echo $row['union'] ?></td>
                                    <td><?php echo $row['village'] ?></td>
                                    <td><?php echo $row['day'] ?></td>
                                    <td><a href="../php/delete_day.php?id=<?php echo $row['id'] ?>">
                                            <ion-icon name="close-circle-outline"></ion-icon>
                                        </a></td>
                                </tr>
                            <?php } ?>
                        </table>
                    <?php } ?>
                </div>
            </div>
        </div>
</body>
<script>
    $(document).ready(function() {
        $(".hide").hide();
        $(".show").click(function() {
            $(".hide").fadeIn();
            $(".show").slideUp();

            $(".slider").slideDown()

        })
        $(".hide").click(function() {
            $(".hide").fadeOut();
            $(".show").slideDown();
            $(".slider").slideUp()

        })
    })
</script>

</html>