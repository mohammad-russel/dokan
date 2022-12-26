<?php
session_start();
if (!isset($_SESSION["sid"])) {
    header("location:login.php");
}
$srid = ($_SESSION["sid"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../components/head2.php"; ?>
    <title>SR Retailer</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="back">
                <a href="sr_home.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        </div>
        <div class="sr_retailer_main_box">
            <div class="head">
                <div class="searchbox">
                    <input type="search" name="search" autocomplete="off" id="search" placeholder="Search">
                </div>
            </div>
            <div class="retailerbox">
                <div class="create_ac">
                    <div class="new"><span class="adda">+</span></div>
                    <div class="popup">
                        <div class="close">
                            <ion-icon name="close-outline"></ion-icon>
                        </div>
                        <?php
                        date_default_timezone_set('Asia/Dhaka');
                        $time = date("Y.m.d || h.m.s");
                        ?>
                        <form action="../php/retailer_registation.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="time" id="time" value="<?php echo $time ?> ">
                            <label for="rname">Retailer Pic</label>
                            <input type="file" name="rpic" id="rpic">
                            <input type="text" name="name" id="name" placeholder="Name" required>
                            <label for="rname">Shop Pic</label>
                            <input type="file" name="spic" id="spic">
                            <input type="text" name="shop" id="shop" placeholder="shop name" required>
                            <input type="hidden" name="sr" id="sr" value="<?php echo $srid ?>">
                            <input type="number" name="number" id="number" placeholder=" phone number" required>
                            <input type="text" name="password" id="password" placeholder="password" required>
                            <select name="zila" id="zila">
                                <option value=''>--SelecT Upazila--</option>
                            </select>
                            <!-- <select name="root" id="root">
                                <option value=''>--Select Zila First--</option>
                            </select> -->
                            <select name="union" id="union">
                                <option value=''>--Select Union --</option>
                            </select>
                            <select name="hat" id="hat">
                                <option value=''>--Select Hat --</option>
                            </select>
                            <select name="village" id="village">
                                <option value=''>--Select Village--</option>
                            </select>

                            <input type="text" name="area" id="area" placeholder="area" required>
                            <input type="submit" name="add" class="newretinsert" value="ADD">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        function load() {
            $(".popup").hide();
        }
        load()
        $(".new").click(function() {
            $(".popup").fadeIn();
        })
        $(".close").click(function() {
            $(".popup").fadeOut();
        })
        $.ajax({
            url: "../php/load_retailer.php",
            type: "POST",
            success: function(data) {
                if (data) {
                    $(".retailerbox").append(data);
                }
            }
        })

        $("#search").on("keyup", function() {
            var search = $(this).val();
            $.ajax({
                url: "../php/search_retailer.php",
                type: "POST",
                data: {
                    search: search
                },
                success: function(data) {

                    $(".retailerbox").html(data);
                }
            })
        })
        // ------------------

        $(document).ready(function() {
            $.ajax({
                url: "../php/day/select/zila_show.php",
                type: "post",
                success: function(data) {
                    $("#zila").html(data)
                }
            })

            // ----------------post-------------------
            // -------------zila post -------------
            $("#zila").on("change", function() {
                var zila = $("#zila").val();
                $.ajax({
                    url: "../php/day/select/zila_post.php",
                    type: "post",
                    data: {
                        zila: zila
                    },
                    success: function(data) {
                        $("#union").html(data)
                    }
                })
            })
            // -----------------root---------------
            // $("#root").on("change", function() {
            //     var root = $("#root").val();
            //     $.ajax({
            //         url: "../php/day/select/root_post.php",
            //         type: "post",
            //         data: {
            //             root: root
            //         },
            //         success: function(data) {
            //             $("#union").html(data)

            //         }
            //     })
            // })
            // -------------union post -------------
            $("#union").on("change", function() {
                var union = $("#union").val();
                $.ajax({
                    url: "../php/day/select/union_post.php",
                    type: "post",
                    data: {
                        union: union
                    },
                    success: function(data) {
                        $("#hat").html(data)

                    }
                })
            })
            // -------------hat post -------------
            $("#union").on("change", function() {
                var union = $("#union").val();
                $.ajax({
                    url: "../php/day/select/hat_post.php",
                    type: "post",
                    data: {
                        union: union
                    },
                    success: function(data) {
                        $("#village").html(data)

                    }
                })
            })
        })
    })
</script>

</html>