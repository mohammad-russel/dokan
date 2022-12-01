<div class="header">
    <?php

    @include "../php/config.php";
    $sql = "SELECT * FROM retailer WHERE id = $rid ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <a href="user.php?">
        <img src="../image/retailer/<?php echo $row['retailerpic'] ?>" alt="">
    </a>
    <span class="title">
        <a href="user.php"><?php echo $row['nam'] ?></a>
    </span>
</div>
<div class="box">
    <ul>
        <a href="homepage.php">Home</a>
        <a href="contact.php">Contact</a>
        <a href="shop.php">Shop</a>
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