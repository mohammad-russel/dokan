<?php

@include "../../config.php";
$sql = "SELECT * FROM upozila ORDER BY id DESC";
$result = mysqli_query($con, $sql);
$output = "
<table>
<tr>
    <th>id</th>
    <th>Upozila</th>
</tr>";
while ($row = mysqli_fetch_assoc($result)) {
    $output .= "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['upozila_nam']}</td>
            </tr>";
}
$output .= "</table>";
echo $output;
