<?php
session_start();
if (isset($_SESSION["rid"])) {
    header("location:homepage.php");
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
        <div class="form">
            <h4 class="lt">Retailer Login</h4>
            <form class="login_form" action="../php/retailer_login.php" method="post">
                <input type="number" name="number" id="number" placeholder="number" required>
                <input type="password" name="password" id="password" placeholder="password" required>
                <input type="submit" id="login" name="login" value="Login">
            </form>
        </div>
    </div>

</body>

</html>