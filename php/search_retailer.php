<?php

include "../php/config.php";
$search = $_POST['search'];
// $limit = 5;
// $start = $_POST['page'];
$sql = "SELECT * FROM retailer WHERE nam LIKE '%{$search}%'  ";
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

<?php } ?>