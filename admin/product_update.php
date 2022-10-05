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
                <a href="../admin/product.php">
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
                <form action="../php/product_update.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="time" id="time" value="<?php echo $time ?>">
                    <input type="text" name="name" id="name" placeholder="Product Name" value="<?php echo $row['nam'] ?>">
                    <select name="category" id="category">
                        <option value="chips">Chips</option>
                        <option value="drinks">Drinks</option>
                        <option value="biscuts">Biscuts</option>
                        <option value="milks">Milks</option>
                        <option value="cleaners">Cleaners</option>
                        <option value="soaps">Soaps</option>
                    </select>
                    <input type="hidden" name="id" name="id" value="<?php echo $row['id'] ?>">
                    <input type="text" name="company" id="company" placeholder="Company Name" value="<?php echo $row['company'] ?>">
                    <input type="text" name="sr" id="sr" placeholder="SR Name" value="<?php echo $row['sr'] ?>">
                    <input type="number" name="price" id="price" placeholder="Price" value="<?php echo $row['price'] ?>">
                    <input type="number" name="stock" id="stock" placeholder="Stock" value="<?php echo $row['stock'] ?>">
                    <input type="text" name="discription" id="discription" placeholder="Discription" value="<?php echo $row['discription'] ?>">
                    <button class="addproduct" name="addproduct" id="addproduct">Update</button>
                </form>
<?php } ?>
            </div>

    </div>

</body>

</html>