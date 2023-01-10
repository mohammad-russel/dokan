<?php
@include "../../config.php";
if (isset($_POST['union'])) {
    $z = $_POST['union'];
    $sql = "SELECT * FROM `hat` WHERE uni = $z ";
    $result = mysqli_query($con, $sql);
    $output = "<option value='No hat'>--হাট/বাজার/মোড় নির্বাচন করুন--</option>";

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<option value='{$row['id']}'>{$row['hat_nam']}</option>";
    }
    echo $output;
}
