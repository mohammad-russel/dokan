<?php

@include "../../config.php";
$sql = "SELECT * FROM `hat`";
$result = mysqli_query($con, $sql);
$output = "";
while ($row = mysqli_fetch_assoc($result)) {
    $output .= "<option value='{$row['id']}'>{$row['hat_nam']}</option>";
}

echo $output;
