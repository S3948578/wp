<?php
$file = fopen("appointment.txt","r");
$individualList = array();
while (($row = fgetcsv($file, 0)) !== FALSE) {
    array_push($individualList, $row);
}
$listLength = count($individualList);
echo "<table>
    <tr>
        <th>Name</th>
        <th>Time</th>
        <th>Date</th>
        <th>Reasons</th>
    </tr>";
for($i = 0; $i < $listLength; $i++){
    $individualInfo = $individualList[$i];
    $date = $individualInfo[1];
    $datestr = strtotime($date);
    $date_format = date('l F jS, Y', $datestr);
    echo "<tr>
        <td>{$individualInfo[0]}</td>
        <td>{$individualInfo[2]}</td>
        <td>{$date_format}</td>
        <td>{$individualInfo[3]}</td>
    </tr>";
}
echo "</table>";
?>