<?php

@include "../../config.php";
$sql = "SELECT * FROM upozila";
$result = mysqli_query($con, $sql);
$output = "<option value=''>--SelecT Zila--</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $output .= "<option value='{$row['id']}'>{$row['upozila_nam']}</option>";
}

echo $output;
