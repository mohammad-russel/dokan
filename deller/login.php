<?php
session_start();
if (isset($_SESSION["did"])) {
    header("location:deller_home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deller</title>
    <?php include "../components/head2.php"; ?>
</head>

<body>
    <div class="container">
        <div class="form">
            <h4 class="lt">Deller Login</h4>
            <form class="login_form" action="../php/deller_login.php" method="post">
                <input type="number" name="number" id="number" placeholder="number" required>
                <input type="password" name="password" id="password" placeholder="password" required>
                <input type="submit" id="login" name="login" value="Login">
            </form>
        </div>
    </div>

</body>

</html>