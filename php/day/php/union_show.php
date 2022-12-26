<?php

@include "../../config.php";

$sql = "SELECT * FROM `union` ORDER BY id DESC";
$result = mysqli_query($con, $sql);
$output = "
<table>
<tr>
    <th>id</th>
    <th>Upozila</th>
    <th>upozila Id</th>
</tr>";
while ($row = mysqli_fetch_assoc($result)) {
    $output .= "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['uni_nam']}</td>
                <td>{$row['upo']}</td>
            </tr>";
}
$output .= "</table>";
echo $output;
