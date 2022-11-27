
<div class="header">
    <?php

@include "../php/config.php";
$sql = "SELECT * FROM retailer WHERE id = $rid ";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
    ?>
    <a href="../index.php"><img src="../image/retailer/<?php echo $row['retailerpic'] ?>" alt=""></a>
    <span class="title"><a href="#"><?php echo $row['nam'] ?></a></span>
</div>
<div class="box">
    <ul>
        <a href="admin_home.php">Home</a>
        <a href="manage_order.php">Contact</a>
        <a href="staffs.php">Shop</a>
    </ul>
</div>
<div class="footer">
    <span class="logout">
        <a href="../php/retailer_logout.php">
            <ion-icon name="log-out-outline"></ion-icon>
            <span class="title">Logout</span>
        </a>

    </span>
</div>