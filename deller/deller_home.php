<?php
session_start();
if (!isset($_SESSION["did"])) {
    header("location:login.php");
}
$did= $_SESSION["did"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../components/head2.php"; ?>
    <title>Deller Homepage</title>
</head>

<body>
    <div class="container">
        <div class="header">
        <div class="back">
                <a href="../index.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
            <div class="back">
                <a href="../php/deller_logout.php">
                    <ion-icon name="log-out-outline"></ion-icon>
                </a>
            </div>
        </div>
        <div class="srmainbox">
          
            <div class="box">
                <a href="sr.php">SR</a>
            </div>
      

        </div>
    </div>

</body>

</html>