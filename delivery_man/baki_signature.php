<?php
session_start();
if (!isset($_SESSION["delid"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baki Signature</title>
    <?php include "../components/head2.php"; ?>
    <style>
        canvas {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php

    include '../php/config.php';
    $rid = $_GET['rid'];
    $sql = "SELECT * FROM retailer WHERE id = $rid ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $sql1 = "SELECT *, SUM(quantity*price) AS total FROM cart WHERE status = 'order' AND rid = $rid ";
    $result1 = mysqli_query($con, $sql1);
    $row = mysqli_fetch_assoc($result1);

    // ----------
    $sql1 = "SELECT *, quantity*price AS total FROM cart WHERE status = 'order' AND rid = $rid ";
    $result1 = mysqli_query($con, $sql1);
    $list40 = mysqli_num_rows($result1);
    //   ---------
    $sql1 = "SELECT DISTINCT discount FROM cart WHERE status = 'order' AND rid = $rid ";
    $result1 = mysqli_query($con, $sql1);
    $row2 = mysqli_fetch_assoc($result1);

    $sub_total = $row['total'] - $row2['discount'];

    ?>
    <div class="container">
        <!-- __________________ -->

        <div class="baki_pop">
            <div class="close_complete">
                <a href="https://happybd.online/delivery_man/retailer_overview.php?rid=<?php echo $rid ?>">
                    <ion-icon name="close-outline"></ion-icon>
                </a>
            </div>
            <form method="post" action="../php/signature_1.php" enctype="multipart/form-data">
                <?php
                date_default_timezone_set('Asia/Dhaka');
                $time = date("Y/m/d || h/i/s"); ?>
                <div id="signature-pad" class="sp">
                    <div>
                        <div id="note" class="note" onmouseover="my_function();"></div>
                        <canvas id="the_canvas" width="350px" height="600px"></canvas>
                    </div>
                    <div style="margin:10px;" class="input_box">
                        <input type="hidden" id="sig" name="sig" value="<?php echo "signature_" . date("his") . ".png" ?>">
                        <input type="hidden" id="signature" name="signature">
                        <!-- -------------------- -->
                        <input type="hidden" name="st" id="st" value="<?php echo $sub_total ?>">
                        <input type="hidden" name="rid" id="rid" value="<?php echo $rid ?>">
                        <input type="hidden" name="discount" id="discount" value="<?php echo $row2['discount'] ?>">
                        <input type="hidden" name="item" id="item" value="<?php echo $list40 ?>">
                        <input type="hidden" name="products" id="products" value="<?php

                                                                                    include '../php/config.php';
                                                                                    $sql1 = "SELECT *, quantity*price AS total FROM cart WHERE status = 'order' AND rid = $rid ";
                                                                                    $result1 = mysqli_query($con, $sql1);
                                                                                    if (mysqli_num_rows($result1)) {
                                                                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                                                                            $pid = $row1['pid'];
                                                                                            $sql2 = "SELECT * FROM product WHERE id = $pid ";
                                                                                            $result2 = mysqli_query($con, $sql2);
                                                                                            $row2 = mysqli_fetch_assoc($result2);
                                                                                            echo "<span>{$row2['nam']} || price: {$row1['price']} || Quantity: {$row1['quantity']} || Total:{$row1['total']} </span><br>";
                                                                                        }
                                                                                    }
                                                                                    ?>">
                        <input type="hidden" name="time" id="time" value="<?php echo $time ?>">
                        <!-- -------------------- -->
                        <button type="button" id="clear_btn" class="btn btn-danger" data-action="clear"><span class="glyphicon glyphicon-remove"></span> Clear</button>
                        <button type="submit" id="save_btn" class="btn btn-primary" data-action="save-png"><span class="glyphicon glyphicon-ok"></span> baki</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</body>

<script>
    var wrapper = document.getElementById("signature-pad");
    var clearButton = wrapper.querySelector("[data-action=clear]");
    var savePNGButton = wrapper.querySelector("[data-action=save-png]");
    var canvas = wrapper.querySelector("canvas");
    var el_note = document.getElementById("note");
    var signaturePad;
    signaturePad = new SignaturePad(canvas);
    clearButton.addEventListener("click", function(event) {
        document.getElementById("note").innerHTML = "The signature should be inside box";
        signaturePad.clear();
    });
    savePNGButton.addEventListener("click", function(event) {
        if (signaturePad.isEmpty()) {
            alert("Please provide signature first.");
            event.preventDefault();
        } else {
            var canvas = document.getElementById("the_canvas");
            var dataUrl = canvas.toDataURL();
            document.getElementById("signature").value = dataUrl;
        }
    });

    function my_function() {
        document.getElementById("note").innerHTML = "";
    }
</script>

<script>
</script>

</html>