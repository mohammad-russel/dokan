<?php

@include "../../config.php";
$sql = "SELECT * FROM `hat` ORDER BY id DESC ";
$result = mysqli_query($con, $sql);
$output = "
<table>
<tr>
    <th>id</th>
    <th>hat</th>
    <th>Union Id</th>
</tr>";
while ($row = mysqli_fetch_assoc($result)) {
    $output .= "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['hat_nam']}</td>
                <td>{$row['uni']}</td>
            </tr>";
}
$output .= "</table>";
echo $output;
