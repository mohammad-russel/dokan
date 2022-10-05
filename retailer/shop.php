<?php
session_start();
if (!isset($_SESSION["rid"])) {
    header("location:login.php");
}
$rid = $_SESSION["rid"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../components/head2.php"; ?>
    <title>SR shop</title>
</head>

<body>
    <div class="container">
        <?php include "../components/header.php" ?>
   
        <div class="shopmain">

        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        var page = 0;

        function load() {
            $.ajax({
                url: "../php/load_product.php",
                type: "POST",
                data: {
                    page: page
                },
                success: function(data) {
                    $(".more").remove();
                    $(".shopmain").append(data);
                }
            })
        }
        load();
        // ---------------------------------
      
        // -----------------------------------
        $(document).on("click", ".loadmore", function() {
            page += 20;
            load();
        })
        // ------------------
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
        $(document).on("click", ".addcart", function() {
            cartload();
        })

    })
</script>

</html>