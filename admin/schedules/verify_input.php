<?php
require_once('../connectMySql.php');
$query = "SELECT * FROM schedule_list where date(schedule_from) = date('".$_POST['schedule_from']."') ";
echo $query;
$result = $conn->query($query);
while($row = $result->fetch_assoc())
{
  echo '<body onload="alerts()">
  <script>fucntion alerts(){alert("Date and time already exists");}</script>';
}
?>