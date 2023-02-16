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
    <title>Admin Stock Add</title>
    <?php include "../components/head2.php"; ?>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="back">
                <a href="../admin/admin_product.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>

        </div>

        <?php
        include "../php/config.php";
        $id = $_GET['id'];
        $sql = "SELECT * FROM product WHERE id = $id ";
        $query = mysqli_query($con, $sql);
        if (mysqli_num_rows($query)) {
            $row = mysqli_fetch_assoc($query);
        ?>
            <div class="update_product">
                <form action="../php/stockadd.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" name="id" value="<?php echo $row['id'] ?>">
                    <input type="number" name="stock" id="stock" placeholder="Stock" value="0">
                    <button class="addproduct" name="addproduct" id="addproduct">Add Stock</button>
                </form>
            <?php } ?>
            </div>

    </div>

</body>

</html>