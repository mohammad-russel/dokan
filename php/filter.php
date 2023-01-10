<?php
include "../php/config.php";
// $village = $_POST['village'];
$hat = $_POST['hat'];
$sql = "SELECT * FROM retailer WHERE  hat = $hat ORDER BY id DESC";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
        <a href="products.php?rid=<?php echo $row['id'] ?>">
            <div class="card">
                <div class="image">
                    <img src="../image/retailer/<?php echo $row['retailerpic'] ?>" alt="">
                </div>
                <div class="name"><?php echo $row['nam'] ?></div>
                <div class="shop"><?php echo $row['shopname'] ?></div>
            </div>
        </a>
    <?php } ?>
<!-- 
    <div class="loadmore more">Load More</div> -->
<?php } ?>