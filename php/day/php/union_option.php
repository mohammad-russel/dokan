<?php

@include "../../config.php";

$sql = "SELECT * FROM `union`";
$result = mysqli_query($con, $sql);
$output = "";
while ($row = mysqli_fetch_assoc($result)) {
    $output .= "<option value='{$row['id']}'>{$row['uni_nam']}</option>";
}

echo $output;
