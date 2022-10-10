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
    <?php include "../components/head2.php"; ?>
    <title>Products</title>
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
        <!-- ------- -->
        <div class="adminproductbox">
            <?php
            date_default_timezone_set('Asia/Dhaka');
            $time = date("Y/m/d || h/i/s");
            ?>
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
                    <input type="number" name="stock" id="stock" placeholder="Stock" required>
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
                            <div class="date stock">Stock : <?php echo $row['stock']; ?></div>
                            <div class="more">
                                <div class="show  show<?php echo $row['id']; ?>">
                                    <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
                                </div>
                                <div class="box pmb<?php echo $row['id']; ?>">
                                    <div class="overview"><a href="#">OverView</a></div>
                                    <div class="update"><a href="product_update.php?id=<?php echo $row['id']; ?>">Update</a></div>
                                    <div class="delete delete<?php echo $row['id']; ?>">
                                        <!-- <a href="../php/deleteproduct.php?id=<?php echo $row['id']; ?>">DELETE</a> -->
                                        <button class="deletebtn deletebtn<?php echo $row['id']; ?>" data-id='<?php echo $row['id']; ?>'>Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                // --------------------
                                function load() {
                                    $(".pmb<?php echo $row['id']; ?>").hide();
                                }
                                load()
                                $(".show<?php echo $row['id']; ?>").click(function() {
                                    $(".pmb<?php echo $row['id']; ?>").toggle();
                                })
                                // ----------ajax-----------
                                $(document).on("click", ".deletebtn<?php echo $row['id']; ?>", function() {
                                    var id = $(this).data("id");
                                    $.ajax({
                                        url: "../php/deleteproduct.php",
                                        type: "POST",
                                        data: {
                                            id: id
                                        },
                                        success: function(data) {
                                            if (data == 1) {
                                                $(".card<?php echo $row['id']; ?>").fadeOut()
                                            } else {
                                                alert("ok");
                                            }
                                        }
                                    })
                                })

                            })
                        </script>
                    <?php } ?>
                </div>

            <?php } ?>
        </div>
    </div>
</body>


</html>