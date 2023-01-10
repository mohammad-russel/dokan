<?php
session_start();
if (!isset($_SESSION["aid"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Retailer</title>
    <?php include "../components/head2.php"; ?>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="back">
                <a href="staffs.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        </div>
        <!-- --------- -->
        <!-- <div class="head">
            <div class="searchbox">
                <input type="search" name="search" id="search">
                <input type="submit" class="search_submit" value="Search" id="submit">
            </div>
        </div> -->
        <div class="adminsrbox">

        </div>
    </div>

</body>
<script>
    $(document).ready(function() {
        function load() {
            $(".popup").hide();
        }
        load()
        $(".newsr").click(function() {
            $(".popup").fadeIn();
        })
        $(".close").click(function() {
            $(".popup").fadeOut();
        })
        // ----------------

        $(document).on("click", ".loadmore", function() {
            page += 5;
            loadd();
        })
        var page = 0;

        function loadd() {
            $.ajax({
                url: "../php/admin_retailer_load.php",
                type: "POST",
                data: {
                    page: page
                },
                success: function(data) {
                    if (data) {
                        $(".more").remove();
                        $(".adminsrbox").append(data);
                    }
                }
            })
        }
        loadd()
    })
</script>

</html>