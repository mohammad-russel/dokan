<?php
@include "../../config.php";
if (isset($_POST['union'])) {
    $z = $_POST['union'];
    $sql = "SELECT * FROM `vllage` WHERE uni = $z ";
    $result = mysqli_query($con, $sql);
    $output = "<option value=''>--SelecT Village--</option>";

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<option value='{$row['id']}'>{$row['vill_nam']}</option>";
    }
    echo $output;
}
