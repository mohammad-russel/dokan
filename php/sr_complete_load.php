<?php
include '../php/config.php';
$sr = $_POST['sr'];
$limit = 1;
$start = $_POST['page'];
$sql1 = "SELECT *, quantity*price AS total FROM cart WHERE status = 'complete' AND sr= $sr ORDER BY id DESC LIMIT $start,$limit ";
$result1 = mysqli_query($con, $sql1);
if ($list = mysqli_num_rows($result1)) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $pid = $row1['pid'];
        $sql2 = "SELECT * FROM product WHERE id = $pid ";
        $result2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
?>
        <div class="card">
            <div class="image">
                <img src="../image/product/<?php echo $row2['pic'] ?>" alt="">
            </div>
            <div class="name"><?php echo $row2['nam'] ?></div>
            <div class="price">দামঃ <?php echo $row1['price'] ?></div>
            <div class="quantity">পরিমানঃ <?php echo $row1['quantity'] ?></div>
            <div class="tp">মোটঃ <?php echo $row1['total'] ?></div>
            <div class="name time">সময়<br> <?php echo $row1['time'] ?></div>

        </div>
    <?php } ?>
    <div class="loadmore more">Load More</div>
<?php } ?>