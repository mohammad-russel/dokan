<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .row {
        display: flex;
    }

    .a {
        margin: 0px 5px;
    }
</style>

<body>

    <!-- ----------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------- -->
    <!-- <?php
            @include "php/config.php";
            $sql = "SELECT * FROM cart WHERE `status` = 'complete' order by id DESC";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result)) {
            ?>
        <?php while ($row = mysqli_fetch_assoc($result)) {
                    $pid = $row['pid'];
                    $rid = $row['rid'];
                    $sr = $row['sr'];
                    $qunatity = $row['quantity'];
                    $price = $row['price'];
                    $total = $qunatity * $price;
        ?>
            <form action="testo.php" method="post">
                <input type="text" name="rid" id="rid" value="<?php echo $rid ?>">
                <input type="text" name="pid" id="pid" value="<?php echo $pid ?>">
                <input type="text" name="sr" id="sr" value="<?php echo $sr ?>">
                <input type="text" name="total" id="total" value="<?php echo $total ?>">
                <input type="submit" value="submit" id="submit">
            </form>
        <?php } ?>
    <?php } ?> -->

    <!-- -------------------------------- -->
    <?php
    @include "php/config.php";
    $sql1 = "SELECT DISTINCT rid FROM pro ORDER BY total DESC ";
    $result1 = mysqli_query($con, $sql1);

    if (mysqli_num_rows($result1)) {
    ?>
        <table>
            <tr>
                <th>product</th>
                <th>retailer</th>
                <th>sr</th>
                <th>total</th>

            </tr>
            <?php while ($row5 = mysqli_fetch_assoc($result1)) {
                $rid1 = $row5['rid'];
                $sql2 = "SELECT * FROM pro WHERE rid = $rid1 ";
                $result2 = mysqli_query($con, $sql2);
                $row6 = mysqli_fetch_assoc($result2)
            ?>


                <tr>
                    <td><?php echo $row6['pid'] ?></td>
                    <td><?php echo $row6['rid'] ?></td>
                    <td><?php echo $row6['sr'] ?></td>
                    <td><?php echo $row6['total'] ?></td>
                </tr>



            <?php  } ?>
        </table>
    <?php } ?>

    <!-- ------------------- -->

    <?php
    @include "php/config.php";
    $sql1 = "SELECT DISTINCT pid FROM pro ORDER BY total DESC ";
    $result1 = mysqli_query($con, $sql1);

    if (mysqli_num_rows($result1)) {
    ?>
        <table>
            <tr>
                <th>product</th>
                <th>retailer</th>
                <th>sr</th>
                <th>total</th>

            </tr>
            <?php while ($row5 = mysqli_fetch_assoc($result1)) {
                $pid1 = $row5['pid'];
                $sql2 = "SELECT * FROM pro WHERE pid = $pid1 ";
                $result2 = mysqli_query($con, $sql2);
                $row6 = mysqli_fetch_assoc($result2)
            ?>


                <tr>
                    <td><?php echo $row6['pid'] ?></td>
                    <td><?php echo $row6['rid'] ?></td>
                    <td><?php echo $row6['sr'] ?></td>
                    <td><?php echo $row6['total'] ?></td>
                </tr>



            <?php  } ?>
        </table>
    <?php } ?>
</body>

</html>