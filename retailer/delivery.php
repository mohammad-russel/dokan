<?php
session_start();
if (!isset($_SESSION["rid"])) {
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
    <title>SR Homepage</title>
</head>
<body>
    <div class="container">
        <?php include "../components/header.php" ?>
    </div>
</body>

</html>