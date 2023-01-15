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
    <style>
        .filter{
            border-bottom: 1px solid #e8e8e8;
            padding-bottom: 10px;
        }
        #zilaf,
        #unionf,
        #hatf,
        #villf {
            outline: none;
            width: 50%;
            background: linear-gradient(312.9deg,
                    rgba(255, 255, 255, 0.3) 4.49%,
                    rgba(233, 240, 247, 0.3) 95.45%),
                #e9f0f7;
            box-shadow: -3px -3px 9px rgb(255 255 255 / 90%),
                3px 3px 9px rgb(138 155 189 / 40%);
            max-width: 350px;
            padding: 3px;
            color: #3E5467;
            margin: 12px 6px;
            border: 1px solid #ffffff80;
            height: 30px;
            border-radius: 0.7rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="back">
                <a href="sr_home.php">
                    <ion-icon style="color: #3E5467;background: linear-gradient(315.13deg, rgba(194, 217, 237, 0.3) 5.21%, rgba(255, 255, 255, 0.3) 62.26%), #E9F0F7;
box-shadow: 4px 4px 12px rgba(138, 155, 189, 0.3), -5px -5px 15px rgba(255, 255, 255, 0.9); "  name="arrow-back-outline"></ion-icon>
                </a>
            </div>
        </div>
        <div class="sr_retailer_main_box">
            <div class="head">
                <div class="searchbox">
                    <input type="search" name="search" autocomplete="off" id="search" placeholder="Search">
                </div>
                <div class="filter">
                    <select name="zilaf" id="zilaf">

                    </select><br>
                    <select name="unionf" id="unionf">

                    </select><br>
                    <select name="hatf" id="hatf">

                    </select><br>
                    <!-- <select name="villf" id="villf">

                    </select> -->
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
                            <input type="text" name="name" id="name" placeholder="নাম" required>
                            <label for="rname">Shop Pic</label>
                            <input type="file" name="spic" id="spic">
                            <input type="text" name="shop" id="shop" placeholder="দোকানের নাম" required>
                            <input type="hidden" name="sr" id="sr" value="<?php echo $srid ?>">
                            <input type="number" name="number" id="number" placeholder="ফোন নাম্বার" required>
                            <input type="text" name="password" id="password" placeholder="পাসওয়ার্ড" required>
                            <select name="zila" id="zila">
                                <option value=''>--SelecT Upazila--</option>
                            </select>
                            <!-- <select name="root" id="root">
                                <option value=''>--Select Zila First--</option>
                            </select> -->
                            <select name="union" id="union">
                                <option value=''>--ইউনিয়ন নির্বাচন করুন--</option>
                            </select>
                            <select name="hat" id="hat">
                                <option value=''>--হাট/বাজার/মোড় নির্বাচন করুন --</option>
                            </select>
                            <select name="village" id="village">
                                <option value=''>--গ্রাম নির্বাচন করুন--</option>
                            </select>

                            <input type="text" name="area" id="area" placeholder="এলাকা/পরিচিতি" required>
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
        var page = 0;

        function loadd() {
            $.ajax({
                url: "../php/load_retailer.php",
                type: "POST",
                data: {
                    page: page
                },
                success: function(data) {
                    if (data) {
                        $(".more").remove();
                        $(".retailerbox").append(data);
                    }
                }
            })
        }
        loadd()
        $("#search").on("keyup", function() {
            var search = $(this).val();
            $.ajax({
                url: "../php/search_retailer.php",
                type: "POST",
                data: {
                    search: search,
                    page: page
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
                    $("#zilaf").html(data)
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
            $("#zilaf").on("change", function() {
                var zila = $("#zilaf").val();
                $.ajax({
                    url: "../php/day/select/zila_post.php",
                    type: "post",
                    data: {
                        zila: zila
                    },
                    success: function(data) {

                        $("#unionf").html(data)
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
            $(" #unionf").on("change", function() {
                var union = $(" #unionf").val();
                $.ajax({
                    url: "../php/day/select/union_post.php",
                    type: "post",
                    data: {
                        union: union
                    },
                    success: function(data) {
                        $("#hatf").html(data)


                    }
                })
            })
            // -------------hat post -------------
            $("#unionf").on("change", function() {
                var union = $("#unionf").val();
                $.ajax({
                    url: "../php/day/select/hat_post.php",
                    type: "post",
                    data: {
                        union: union
                    },
                    success: function(data) {
                        $("#villf").html(data)


                    }
                })
            })
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
        // -----------------
        $(document).on("click", ".loadmore", function() {
            page += 5;
            loadd();
        })
        // --------------------Filter-----
        $("#hatf").on("change", function() {
            var hat = $('#hatf').val();
            // var village = $('#villf').val();
            $.ajax({
                url: "../php/filter.php",
                type: "post",
                data: {
                    hat: hat,
                    // village: village
                },
                success: function(data) {
                    $(".retailerbox").html(data)
                }
            })
        })
        // ----------

    })
</script>

</html>