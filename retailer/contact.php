<?php
session_start();
if (!isset($_SESSION["rid"])) {
    header("location:login.php");
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../components/head2.php"; ?>
    <title>Retailer Contact</title>
</head>
<body>
    <div class="container">
        <?php include "../components/header.php" ?>
        <div class="contact_box">
            <form action="" method="post">
                <input type="text" name="name" id="name" placeholder="Name">
                <textarea name="msg" id="msg" cols="30" rows="5" placeholder="Massage..."></textarea>
                <input type="submit" name="send" value="SEND">
            </form>
        </div>
    </div>
</body>
<script>
        function cartload() {
            var id = <?php echo $rid ?>;
            $.ajax({
                url: "../php/load_cart.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function(data1) {
                    $(".count").html(data1);

                }
            })
        }
        cartload();
</script>
</html>