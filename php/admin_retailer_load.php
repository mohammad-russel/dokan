<?php
include "../php/config.php";
$limit = 5;
$start = $_POST['page'];
$sql = "SELECT * FROM retailer ORDER BY id DESC LIMIT $start,$limit";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
        <a href="retailer_overview.php?retailer=<?php echo $row['id'] ?>">
            <div class="card">
                <div class="image">
                    <img src="../image/retailer/<?php echo $row['retailerpic'] ?>" alt="">
                </div>
                <div class="name"><?php echo $row['nam'] ?></div>
                <div class="shop number"><?php echo $row['num'] ?></div>
            </div>
        </a>
<?php } ?>
<div class="loadmore more">Load More</div>
<?php } ?>