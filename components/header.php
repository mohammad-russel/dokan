<?php
$rid = $_SESSION["rid"];
?>
<header>
    <div class="logo">
        <h1>
            <a href="homepage.php">Dokan</a>
        </h1>
    </div>
    <nav>
        <ul>
            <a href="homepage.php">Home</a>
            <a href="contact.php">Contact</a>
            <a href="shop.php">Shop</a>
        </ul>
    </nav>
    <div class="link">
        <a href="../php/retailer_logout.php">
            <ion-icon name="log-out-outline"></ion-icon>
        </a>
        <a href="user.php">
            <ion-icon name="person-outline"></ion-icon>
        </a>
        <a href="cart.php">
            <span class="count"></span>
            <ion-icon name="cart-outline"></ion-icon>
        </a>
    </div>
</header>