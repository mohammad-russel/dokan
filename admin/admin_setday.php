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
            <div class="cb cb_setday">

            <span class="tity"><h1>Set Days</h1></span>

                <div class="daybox">
                    <?php
                    if (isset($_SESSION['day'])) {
                        echo $_SESSION['day'];
                        unset($_SESSION['day']);
                    }
                    ?>
                    <form action="../php/day.php" method="post">
                        <input type="text" name="village" id="village" placeholder="Village" required>
                        <select name="day" id="day">
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                            <option value="sunday">Sunday</option>
                            <option value="monday">Monday</option>
                            <option value="tuesday">tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">thursday</option>
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
                                <th>No</th>
                                <th>Village</th>
                                <th>Day</th>
                                <th>DELETE</th>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($result1)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
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