<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<table>
  <tr>
    <th style="width:70%">Event Name</th>
    <th style="width:30%">Date and Time</th>
  </tr>


<?php
require_once('connectMySql.php');
$query = "SELECT * FROM schedule_list WHERE DATE(schedule_from) = CURDATE()"; // Updated query to compare with current date
$result = $conn->query($query);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo '
    <tr>
      <td>'.$row['title'].'</td>
      <td>'.date('F d, Y g:i A', strtotime($row['schedule_from'])).'</td>
    </tr>';
  }
} else {
  echo '<tr><td colspan="2">No schedule today</td></tr>'; // Displaying the message when no events are found
}

?>
</table>
</body>
</html>
