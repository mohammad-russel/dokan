<?php
session_start();
$rid = $_SESSION['rid'];

include '../php/config.php';
$sql = "SELECT *,price*quantity AS total_price FROM cart WHERE rid = $rid AND status ='cart'";
$result = mysqli_query($con, $sql);
if ($numrow = mysqli_num_rows($result)) {

    $output = "<div class='cartbox'>";

    while ($row = mysqli_fetch_assoc($result)) {
        $pid = $row['pid'];
        include '../php/config.php';
        $sql1 = "SELECT * FROM product WHERE id = $pid";
        $result1 = mysqli_query($con, $sql1);
        if (mysqli_num_rows($result1)) {
            $row1 = mysqli_fetch_assoc($result1);
            $output .= " <div class='cart cart{$row["id"]}'>
                    <div class='image'>
                        <img src='../image/product/{$row1['pic']}' >
                    </div>
                    <div class='name'>{$row1['nam']} ({$row['price']}৳)</div>
                    <div class='price'>
                    <div class='tpm'> মোট</div>
                        <div class='tp'> {$row['total_price']}৳</div>
                    </div>
                    <div class='quantity'>
                        <input type='number' name='quantity' id='quantity{$row['id']}' value='{$row['quantity']}'>
                    </div>
                    <div class='btn'>
                        <div class='update update{$row["id"]} '>Update</div>
                        <div class='delete delete{$row["id"]} '><ion-icon name='trash-outline'></ion-icon></div>
                    </div>
                </div>";
            $output .= " <script>
                    function load() {
                        $('.update{$row['id']}').hide();
                    }
                    load()
                    $('#quantity{$row['id']}').click(function() {
                        $('.update{$row['id']}').show();
                        $('.delete{$row['id']}').hide();
                    })
                    $('.update{$row['id']}').click(function() {
                        var cid ={$row['id']};
                        var qua = $('#quantity{$row['id']}').val();
                        $.ajax({
                            url: '../php/cart_update.php',
                            type: 'POST',
                            data: {
                                cid: cid,
                                qua: qua
                            },
                            success: function(data) {
                               
                            }
                        })
                        load()
                        $('.delete{$row['id']}').show();
                        $('.update{$row['id']}').hide();
                    })

                    $('.delete{$row['id']}').click(function() {
                        var cid ={$row['id']};
                        $.ajax({
                            url: '../php/cart_delete.php',
                            type: 'POST',
                            data: {
                                cid: cid
                            },
                            success: function(data) {
                                $('.cart{$row['id']}').fadeOut();
                            }
                        })
                    })
                </script>";
        }
    }

    $output .= "<div class='cart info-cart'>
            <div class='order_click'>";
    $sql5 = "SELECT * FROM retailer WHERE id = $rid ";
    $result5 = mysqli_query($con, $sql5);
    $row5 = mysqli_fetch_assoc($result5);
    $union = $row5['union'];
    $sql11 = "SELECT * FROM `union` WHERE id = $union";
    $result11 = mysqli_query($con, $sql11);
    $row11 = mysqli_fetch_assoc($result11);
    $union11 = $row11['uni_nam'];
    $sql4 = "SELECT * FROM delivery WHERE uni = '$union11' ";
    $result4 = mysqli_query($con, $sql4);
    $row4 = mysqli_fetch_assoc($result4);
    $day = $row4['day'];
    $output .= "<div class='info'>
                আপনার এলাকায় ডেলিভারি দেয়া হবে $day <br>
                    <span>পরিমাণ :  {$numrow} টা </span><br>";
    $rid = $_SESSION['rid'];
    include "../php/config.php";
    $sql = "SELECT SUM(price*quantity) AS total FROM cart WHERE rid = $rid AND status ='cart'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $total =  $row['total'];
    $output .=  " <span>মোট খরচ : {$total}৳ </span>
                </div>
                <div class='button'>
                <form action='../php/cart_status_update.php' method='post'>
                <input type='hidden' name='status' id='status' value='order'>
                <input type='hidden' name='rid' id='rid' value='$rid'>
                <input type='submit'class='order_btn' name='order' value='order'>
            </form>
                </div>
            </div>
        </div>";
    $output .= "</div>";
    echo  $output;
}
