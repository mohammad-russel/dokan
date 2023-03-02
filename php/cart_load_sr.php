<?php
session_start();
$sid = $_SESSION['sid'];
$rid = $_POST['rid'];
include '../php/config.php';
$sql = "SELECT *,price*quantity AS total_price FROM cart WHERE rid = $rid AND sr =$sid AND status = 'cart'";
$result = mysqli_query($con, $sql);
if ($numrow = mysqli_num_rows($result)) {

    $output = "<div class='cartbox'>";
    $output .= " <div class='cart'>
    <div class='image'>
      পন্যের ছবি
    </div>
    <div class='name'>নাম</div>
    <div class='quantity'>
SR Price
    </div>
    <div class='price'>
    <div class='tpm'> মোট</div>
    
    </div>
    <div class='quantity'>
পরিমান
    </div>
    <div class='btn'>
        <div class='dw'>Update Or Delete</div>
    </div>
</div>";
    while ($row = mysqli_fetch_assoc($result)) {
        $pid = $row['pid'];


        $sql1 = "SELECT * FROM product WHERE id = $pid ";
        $result1 = mysqli_query($con, $sql1);
        if (mysqli_num_rows($result1)) {
            $row1 = mysqli_fetch_assoc($result1);
            $output .= " <div class='cart cart{$row["id"]}'>
                    <div class='image'>
                        <img src='../image/product/{$row1['pic']}' >
                    </div>
                    <div class='name'>{$row1['nam']} ({$row['price']}৳)</div>
                    <div class='quantity dis'>
                    <input type='number' name='discount' id='discount{$row['id']}' value='{$row['discount']}'>
                </div>
                    <div class='price'>
                    
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
                    $('#discount{$row['id']}').click(function() {
                        $('.update{$row['id']}').show();
                        $('.delete{$row['id']}').hide();
                    })
                    $('.update{$row['id']}').click(function() {
                        var cid ={$row['id']};
                        var qua = $('#quantity{$row['id']}').val();
                        var discount = $('#discount{$row['id']}').val();
                        $.ajax({
                            url: '../php/cart_update.php',
                            type: 'POST',
                            data: {
                                cid: cid,
                                qua: qua,
                                discount: discount
                            },
                            success: function(data) {
                                  load()
                        $('.delete{$row['id']}').show();
                        $('.update{$row['id']}').hide();
                            }
                        })
                      
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
    // $sql11 = "SELECT * FROM `union` WHERE id = $union";
    // $result11 = mysqli_query($con, $sql11);
    // $row11 = mysqli_fetch_assoc($result11);
    // $union11 = $row11['uni_nam'];
    $sql4 = "SELECT * FROM delivery WHERE uni = '$union' ";
    $result4 = mysqli_query($con, $sql4);
    $row4 = mysqli_fetch_assoc($result4);
    $day = $row4['day'];
    $output .= "<div class='info'>
                আপনার এলাকায় ডেলিভারি দেয়া হবে $day <br>
                    <span>ITEM :  $numrow </span><br>";

    include "../php/config.php";
    $sql = "SELECT SUM(price*quantity) AS total FROM cart WHERE rid = $rid AND sr = $sid AND status ='cart' ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $total =  $row['total'];
    $output .=  " <span>Total Cost : ৳ $total </span>
                </div>
                <div class='button'>
                <form action='../php/cart_status_update_sr.php' method='post'>
                <input type='hidden' name='status' id='status' value='order'>
                <input type='hidden' name='rid' id='rid' value='$rid'>
                <input type='hidden' name='sid' id='sid' value='$sid'>
                <input type='submit'class='order_btn' name='order' value='order'>
                </form>
                </div>
                </div>
                </div>";
    $output .= "</div>";
    echo  $output;
}

// <input type='number' step='any' name='discount' id='discount' value= '0' >