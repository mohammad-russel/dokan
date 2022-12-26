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
                        <?php
                        include "../php/config.php";
                        $sql = "SELECT * FROM `union` ";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result)) {


                        ?>
                            <select name="union" id="union">
                                <option value="hidden">Union</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?php echo $row['uni_nam'] ?>"><?php echo $row['uni_nam'] ?></option>
                                <?php }
                                ?>
                            </select>
                        <?php
                        } ?>
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
                    $sql1 = "SELECT * FROM delivery";
                    $result1 = mysqli_query($con, $sql1);
                    if (mysqli_num_rows($result1)) {
                    ?>
                        <table>
                            <tr>

                                <th>Union</th>
                                <th>Day</th>
                                <th>DELETE</th>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($result1)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['uni'] ?></td>
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
    //     function load_uni_op() {
    //         $.ajax({
    //             url: "../php/day/php/union_option.php",
    //             type: "post",
    //             success: function(data) {
    //                 $("#uni_option").html(data)
    //             }
    //         })
    //     }

    //     load_uni_op();
        // --------
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