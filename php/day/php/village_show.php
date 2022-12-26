<?php

@include "../../config.php";
$sql = "SELECT * FROM vllage ORDER BY id DESC";
$result = mysqli_query($con, $sql);
$output = "
<table>
<tr>
    <th>id</th>
    <th>Village</th>
    <th>Union id</th>

</tr>";
while ($row = mysqli_fetch_assoc($result)) {
    $output .= "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['vill_nam']}</td>
                <td>{$row['uni']}</td>
             
            </tr>";
}
$output .= "</table>";
echo $output;
