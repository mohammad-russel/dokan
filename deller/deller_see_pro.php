<?php
session_start();
if (!isset($_SESSION["did"])) {
    header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Manage order</title>
    <?php include "../components/head2.php"; ?>
</head>
<style>

</style>

<body>
    <div class="container acc">
        <div class="admin">
            <!-- ------------------ --------- -->
            <div class="cb cb_order bbb" style="width:100% ;">
                <div class="list list_complete">
                    <div class="box">
                        <div class="title">
                            <h1>SR Sells</h1>
                        </div>
                        <div class="column">
                            <?php
                            include "../php/config.php";
                            $d = $_GET['id'];
                            $sql = "SELECT *, price*quantity AS total FROM cart WHERE  `sr` = $d AND `status` = 'complete' ";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                    <div class="row">
                                        <?php
                                        $id = $row['pid'];
                                        $sql1 = " SELECT * FROM product WHERE id = $id";
                                        $result1 = mysqli_query($con, $sql1);
                                        $row1 = mysqli_fetch_assoc($result1);
                                        ?>
                                      
                                        <div class="name">
                                            <?php echo $row1['nam'] ?> <br> Price : <span><?php echo $row1['price'] ?></span>
                                        </div>
                                        <div class="quantity">
                                            Quantity <br> <span><?php echo $row['quantity'] ?></span>
                                        </div>
                                        <div class="total">
                                            Total <br> <span><?php echo $row['total'] ?>৳</span>
                                        </div>
                                        <div class="retailer">
                                            <?php
                                            $rid = $row['rid'];
                                            $sql2 = " SELECT * FROM retailer WHERE id = $rid";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = mysqli_fetch_assoc($result2);
                                            ?>
                                            Retailer <br> <span><a href="#"><?php echo $row2['nam'] ?></a></span>
                                        </div>
                                        <div class="time">
                                            Time <br> <span><?php echo $row['time'] ?></span>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<?php include "../components/script.php"; ?>


</html>