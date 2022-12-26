<?php
@include "../../config.php";
if (isset($_POST['zila'])) {
    $zila = $_POST['zila'];
    $sql = "SELECT * FROM `union` WHERE upo = $zila ";
    $result = mysqli_query($con, $sql);
$output = "<option value='No Union'>--Select union--</option>";
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<option value='{$row['id']}'>{$row['uni_nam']}</option>";
    }
    echo $output;
} 
