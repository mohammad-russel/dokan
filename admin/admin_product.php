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


            <div class="cb cb_product">
                <!-- <div class="product">
                    <div class="add_box">
                        <button class="add_product">ADD NEW <span>+</span></button>
                        <div class="name">Rasel khan</div>
                        <div class="add_popup">
                            <form action="../php/insertproduct.php" method="POST" enctype="multipart/form-data">
                                <?php
                                date_default_timezone_set('Asia/Dhaka');
                                $time = date("Y/m/d || h/i/s");
                                ?>
                                <input type="hidden" id="time" name="time" value="<?php echo $time ?>">
                                <label for="name">Product Name</label>
                                <input type="text" id="name" name="name" required><br>
                                <label for="pic">Product Image</label>
                                <input type="file" id="pic" name="pic" required><br>
                                <label for="comapany">Company :</label>
                                <select id="company" name="company">
                                    <option value="pran">pran</option>
                                </select><br>
                                <label for="sr">SR :</label>
                                <select id="sr" name="sr">
                                    <option value="rasel">SR_Rasel_pran</option>
                                </select><br>
                                <label for="company">Company Name</label>
                                <input type="text" id="company" name="company" required><br>
                                <label for="price">Product Price</label>
                                <input type="number" id="price" name="price" required><br>
                                <label for="discription">Product Discription</label>
                                <input type="text" id="discription" name="discription" required><br>
                                <button class="addproduct" name="addproduct" id="addproduct">ADD</button>
                            </form>
                        </div>
                    </div>
                    <div class="list"></div>
                </div> -->
                <div class="adminproductbox">
                    <?php
                    date_default_timezone_set('Asia/Dhaka');
                    $time = date("Y/m/d || h/i/s");
                    ?>
                    <span class="tity">
                        <h1>Add & See Products</h1>
                    </span>

                    <div class="insert">
                        <form action="../php/insertproduct.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="time" id="time" value="<?php echo $time ?>">
                            <input type="file" name="pic" id="pic" required>
                            <input type="text" name="name" id="name" placeholder="Product Name" required>
                            <select name="category" id="category">
                                <option value="">Category</option>
                                <?php
                                include "../php/config.php";
                                $sql2 = "SELECT * FROM category";
                                $result2 = mysqli_query($con, $sql2);
                                if (mysqli_num_rows($result2)) {
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                ?>
                                        <option value="<?php echo $row2['cat'] ?>"><?php echo $row2['cat'] ?></option>
                                <?php }
                                } ?>
                            </select>
                            <input type="text" name="company" id="company" placeholder="Company Name" required>
                            <select name="sr" id="sr">
                                <option value="">Select SR</option>
                                <?php
                                include "../php/config.php";
                                $sql2 = "SELECT * FROM sr";
                                $result2 = mysqli_query($con, $sql2);
                                if (mysqli_num_rows($result2)) {
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                ?>
                                        <option value="<?php echo $row2['srnum'] ?>"><?php echo $row2['srnum'] ?></option>
                                <?php }
                                } ?>
                            </select>
                            <input type="number" name="price" id="price" placeholder="Price" required>
                            <!-- <input type="number" name="stock" id="stock" placeholder="Stock" required> -->
                            <input type="text" name="discription" id="discription" placeholder="Discription" required>
                            <button class="addproduct" name="addproduct" id="addproduct">ADD</button>
                        </form>

                    </div>
                    <?php
                    include "../php/config.php";

                    $sql = "SELECT * FROM product";
                    $query = mysqli_query($con, $sql);
                    if (mysqli_num_rows($query)) {
                    ?>
                        <div class="list">
                            <?php
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <div class="card card<?php echo $row['id']; ?>">
                                    <div class="id">ID : <?php echo $row['id']; ?></div>
                                    <div class="image"><img src="../image/product/<?php echo $row['pic']; ?>" alt=""></div>
                                    <div class="name">Name : <?php echo $row['nam']; ?></div>
                                    <div class="price">Price : $<?php echo $row['price']; ?></div>
                                    <div class="sr"> SR : <?php echo $row['sr']; ?></div>
                                    <div class="company">Company : <?php echo $row['company']; ?></div>
                                    <div class="category">Category : <?php echo $row['category']; ?></div>
                                    <!-- <div class="date stock">Stock : <?php echo $row['stock']; ?></div> -->
                                    <div class="more">
                                        <div class="show-more  show<?php echo $row['id']; ?>">
                                            <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
                                        </div>
                                        <div class="pro-popup popup<?php echo $row['id']; ?>">
                                            <div class="box-more">
                                                <div class="close-box">
                                                    <ion-icon name="close-outline"></ion-icon>
                                                </div>
                                                <div class="update">
                                                    <a href="product_update.php?id=<?php echo $row['id']; ?>">Update</a>
                                                </div>
                                                <div class="overview">
                                                    <a href="product_overview.php?id=<?php echo $row['id']; ?>">Overview</a>
                                                </div>
                                                <div class="delete">
                                                    <a href="../php/deleteproduct.php?id=<?php echo $row['id']; ?>">Delete</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        // --------------------
                                        $(".pro-popup").hide()
                                        $(".show<?php echo $row['id']; ?>").click(function() {
                                            $(".popup<?php echo $row['id']; ?>").show()

                                        })
                                        $(".close-box").click(function() {
                                            $(this).closest(".pro-popup").hide()
                                        })
                                    })
                                </script>
                            <?php } ?>
                        </div>

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