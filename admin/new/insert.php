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
    <title>Admin Set Days</title>
    <?php include "../../components/head2.php"; ?>
</head>

<body>
    <div class="container">
        <div class="box upozila">
            <div class="input">
                <input type="text" name="upozila" id="upozila" placeholder="Upozila" required>
                <input type="submit" name="submit" id="upo" value="submit">
            </div>
            <div class="list upo_list">

            </div>
        </div>
   
        <div class="box union">
            <div class="input">

                <input type="text" name="union" id="union" placeholder="union" required>
                <select name="upozila_option" id="upozila_option">
                    <option value="hidden">Select Upozila</option>
                </select>
                <input type="submit" name="submit" id="uni" value="submit">

            </div>
            <div class="list uni_list">

            </div>
        </div>
        <div class="box hat">
            <div class="input">

                <input type="text" name="hat" id="hat" placeholder="hat" required>
                <select name="union_option" id="union_option">
                    <option value="hidden">Select union</option>
                </select>
                <input type="submit" name="submit" id="ha" value="submit">

            </div>
            <div class="list hat_list">

            </div>
        </div>
        <div class="box village">
            <div class="input">
                <input type="text" name="village" id="village" placeholder="village" required>
                <select name="union_option1" id="union_option1">
                    <option value="hidden">Select union</option>
                </select>
                <input type="submit" name="submit" id="vil" value="submit">

            </div>
            <div class="list vil_list">

            </div>
        </div>
    </div>
    <!-- <div class="container">
        <select name="zila" id="zila">
            <option value=''>--SelecT Zila--</option>
        </select>
        <select name="root" id="root">
            <option value=''>--আগে Zila--</option>
        </select>
        <select name="union" id="union">
            <option value=''>--আগে root --</option>
        </select>
        <select name="hat" id="hat">
            <option value=''>--আগে Union--</option>
        </select>
        <select name="village" id="village">
            <option value=''>--আগে Hat--</option>
        </select>
        <input type="text" name="area" id="area" placeholder="Area" required>

    </div> -->
</body>
<script>
  
    $(document).ready(function() {
        function load_upo() {
            $.ajax({
                url: "../../php/day/php/upozila_show.php",
                type: "post",
                success: function(data) {
                    $(".upo_list").html(data)
                }
            })
        }
        load_upo();
        // -------
        $("#upo").click(function() {
            var upozila = $("#upozila").val();
            $.ajax({
                url: "../../php/day/php/upozila.php",
                type: "post",
                data: {
                    upozila: upozila
                },
                success: function(data) {
                    $("#upozila").val("")
                    load_vil()
                  
                    load_upo();
                    load_uni()
                    load_upo_op();
                    load_hat();  
                    load_uni_op(); 
                }
            })
        })
        // ----------------union----------
        function load_uni() {
            $.ajax({
                url: "../../php/day/php/union_show.php",
                type: "post",
                success: function(data) {
                    $(".uni_list").html(data)
                }
            })
        }
        load_uni();

        function load_upo_op() {
            $.ajax({
                url: "../../php/day/php/upozila_option.php",
                type: "post",
                success: function(data) {
                    $("#upozila_option").html(data)
                }
            })
        }
        load_upo_op();
        // -------
        $("#uni").click(function() {
        
            var union = $("#union").val();
            var upozila_option = $("#upozila_option").val();
            $.ajax({
                url: "../../php/day/php/union.php",
                type: "post",
                data: {
                    union: union,
                    upozila_option: upozila_option
                },
                success: function(data) {
                    $("#union").val("")
                    load_vil()
                  
                    load_upo();
                    load_uni()
                    load_upo_op();
                    load_hat();
                    load_uni_op();

                }
            })
        })
  
       

        // ----------------hat--------
        // ------------------------
        function load_hat() {
            $.ajax({
                url: "../../php/day/php/hat_show.php",
                type: "post",
                success: function(data) {
                    $(".hat_list").html(data)
                }
            })
        }
        load_hat();

        function load_uni_op() {
            $.ajax({
                url: "../../php/day/php/union_option.php",
                type: "post",
                success: function(data) {
                    $("#union_option").html(data)
                    $("#union_option1").html(data)
                }
            })
        }
        load_uni_op();
        // -------
        $("#ha").click(function() {
            var hat = $("#hat").val();
            var union_option = $("#union_option").val();
            $.ajax({
                url: "../../php/day/php/hat.php",
                type: "post",
                data: {
                    hat: hat,
                    union_option: union_option
                },
                success: function(data) {
                    $("#hat").val("")
                    load_vil()
                
                    load_upo();
                    load_uni(); 
                    load_upo_op();
                    load_hat();
                    load_uni_op(); 
                }
            })
        })
        // -----------------village--------
        // -------------------------
        function load_vil() {
            $.ajax({
                url: "../../php/day/php/village_show.php",
                type: "post",
                success: function(data) {
                    $(".vil_list").html(data)
                }
            })
        }
        load_vil();

        // function load_hat_op() {
        //     $.ajax({
        //         url: "../../php/day/php/hat_option.php",
        //         type: "post",
        //         success: function(data) {
        //             $("#hat_option").html(data)
        //         }
        //     })
        // }
        // load_hat_op();

        $("#vil").click(function() {
            var village = $("#village").val();
            var union_option1 = $("#union_option1").val();
            $.ajax({
                url: "../../php/day/php/village.php",
                type: "post",
                data: {
                    village: village,
                    union_option1: union_option1
                },
                success: function(data) {
                    $("#village").val("")
                    load_vil()
                   
                    load_upo();
                    load_uni()
                    load_upo_op();
                    load_hat();  load_roo();
                    load_uni_op(); load_roo_op();
                }
            })
        })
        

    })
</script>
<!-- <script>
    $(document).ready(function() {
        $.ajax({
            url: "../../php/day/select/zila_show.php",
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
                url: "../../php/day/select/zila_post.php",
                type: "post",
                data: {
                    zila: zila
                },
                success: function(data) {
                    $("#union").html(data)
                }
            })
        })

        // -------------union post -------------
        $("#union").on("change", function() {
            var union = $("#union").val();
            $.ajax({
                url: "../../php/day/select/union_post.php",
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
        $("#hat").on("change", function() {

            var hat = $("#hat").val();
            $.ajax({
                url: "../../php/day/select/hat_post.php",
                type: "post",
                data: {
                    hat: hat
                },
                success: function(data) {
                    $("#village").html(data)
                }
            })
        })
    })
</script> -->

</html>